<?php
/**
 * Created by PhpStorm.
 * User: SeventhBesucher_2
 * Date: 11.11.2016
 * Time: 15:51
 */

namespace Seventhsense\ErbeJobs\Command;



use TYPO3\CMS\Core\Resource\Exception\FileOperationErrorException;
use TYPO3\CMS\Core\Localization\Exception\InvalidXmlFileException;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ImportCommandController extends \TYPO3\CMS\Extbase\Mvc\Controller\CommandController
{

    const STATUS_FAILED = 0;
    const STATUS_SUCCESSFUL = 1;
    /**
     * JobRepository
     *
     * @var \Seventhsense\ErbeJobs\Domain\Repository\JobRepository
     * @inject
     */
    protected $jobRepository;

    /**
     * Persistence Manager
     *
     *@var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     *@inject
     */
    protected $persistenceManager;

    /**
     * fileObject
     *
     * @var
     */
    protected $storage;

    protected $deleteJobs = "DELETE FROM `tx_erbejobs_domain_model_job`;";
    protected $deleteJobsUniqueAlias = "DELETE FROM `tx_realurl_uniqalias` WHERE tablename = 'tx_erbejobs_domain_model_job';";
    protected $deleteJobsUrlCache = "DELETE FROM `tx_realurl_urldata` WHERE original_url LIKE '%&id=268&tx_erbejobs_jobs%';";

    /**
     * Returns all fiels in the xml file directory
     *
     * @param $xmlFileDirectory thé file directory
     *
     * @return
     */
    private function getLatestFile($xmlFileDirectory) {
        $file = null;
        foreach(glob($xmlFileDirectory.'/*.xml') as $tmpfile) {

            if (null != $file) {
                if (filemtime($tmpfile) > filemtime($file)) {
                    $file = $tmpfile;
                }
            }
            else {
                $file = $tmpfile;
            }
        }
        return $file;
    }

    /**
     * Extracts the xml data from the file as array of \Seventhsense\ErbeJobs\Domain\Model\Job
     * Sets the storage page id to $storgaePid
     * @param $file the file
     * @param $storagePid the storage page id
     *
     * @return array the content
     * @throws InvalidXmlFileException if xml does not contain mandatory information
     */
    private function extractXmlData($file, $storagePid) {
        libxml_use_internal_errors(true);
        $xml = simplexml_load_file($file);
        if ($xml === false) {
            $exceptionMessage = "";
            foreach(libxml_get_errors() as $error) {
                $exceptionMessage .= $error->message . '<br/>';
            }
            throw new InvalidXmlFileException("Exception on parsing XML data: <br/>" . $exceptionMessage);
        }
        $itemList = $xml[0]->xpath("/rss/channel/item");
        echo "found '" .sizeof($itemList) . "' items". chr(10);
        if (!$itemList) {
            throw new InvalidXmlFileException("Xml file malformed: no items in /rss/channel/item found");
        }
        $entityList = array();

        $i = 1;
        foreach ($itemList as $item) {
            $entity = new \Seventhsense\ErbeJobs\Domain\Model\Job();
            $entity->setPid($storagePid);
            $entity->setTitle($this->trim($this->getContent($item->{"title"})), true, "title", $i);
            $entity->setJobId($this->trim($this->getContent($item->{"id"})), true, "id", $i);
            $entity->setIni($this->trim($this->getContent($item->{"ini"})));
            $entity->setAreaOfExpertise($this->trim($this->getContent($item->{"aufgabengebiet"})));
            $entity->setSite($this->trim($this->getContent($item->{"werk"})));
            $entity->setHeadline($this->trim($this->getContent($item->{"headline"})));
            $entity->setTasks($this->trim($this->getContent($item->{"aufgaben"})));
            $entity->setProfile($this->trim($this->getContent($item->{"profil"})));
            $entity->setBenefits($this->trim($this->getContent($item->{"wirbieten"})));
            $entity->setClosingText($this->trim($this->getContent($item->{"interesse"})));
            $entity->setLink($this->trim($this->getContent($item->{"link"})));
            $entity->setPubDate($this->trim($this->getContent($item->{"pubDate"})));
            $entity->setScopeOfTraining($this->trim($this->getContent($item->{"ausbildungsinhalte"})));
            echo "ausbildungsinhalte: " . $this->getContent($item->{"ausbildungsinhalte"}) . chr(10);
            array_push($entityList, $entity);
            $i++;
        }
        return $entityList;
    }

    private function trim($string) {
        $string = html_entity_decode($string);
        $string = trim($string, " \t\n\r\0\x0B\xC2\xA0"); //trim standard whitespace chars and &nbsp; => \xC2 \xA0
        return $string;
    }

    /**
     * Returns the string content of an SimpleXmlElement
     * @param            $simpleXmlElement
     * @param bool|false $required
     * @param null       $field the files name
     * @param null       $position the position of the job in the xml job list
     *
     * @return string
     * @throws InvalidXmlFileException
     */
    private function getContent($simpleXmlElement, $required = false, $field = null, $position = null) {
        if (null != $simpleXmlElement) {
            return $simpleXmlElement->__toString();
        }
        else if ($required && $position) {
            throw new InvalidXmlFileException("Required '" . $field . "' is not set for Job at position '" . $position . "'");
        }
    }

    /**
     * Truncates table tx_erbejobs_domain_model_job and writes all entities to the repository afterwards
     * @param $entityList the entities
     *
     * @throws InvalidQueryException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException
     */
    private function writeToRepository($entityList) {
        foreach ($entityList as $entity) {
            $this->jobRepository->add($entity);
        }
    }

    /**
     * Imports persis rss xml files to db
     *
     * @throws FileOperationErrorException
     * @throws InvalidXmlFileException
     */
    public function importPersisDataCommand() {
        echo 'executing importpersisdata...'.chr(10);


        $curlRes = curl_init("https://de.erbe-med.com/de-de/unternehmen/karriere/stellenangebote/");

        $curlcall = curl_exec($curlRes);
        curl_close($curlRes);

        //set initial status to failed
        $status = self::STATUS_FAILED;

        $conf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['erbe_jobs']);
        $pathToXmlFiles = $conf['pathToXmlFiles'];

        $recipients = explode(',', $conf['importNotificationEmails']);
        $storagePid = $conf['storagePid'];





        $importedDataSets = 0;
        $exception = null;
        try {
            $storageRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Resource\\StorageRepository'); // create instance to storage repository
            $this->storage = $storageRepository->findByUid(1);    // get file storage with uid 1 (this should by default point to your fileadmin/ directory)
            $xmlFileDirectory = PATH_site . $this->storage->getConfiguration()['basePath'] . $pathToXmlFiles;
            echo 'looking for xml files in "' . realpath($xmlFileDirectory) . '"' . chr(10);

            //get newest file in import folder
            $file = $this->getLatestFile($xmlFileDirectory);

            //get newest file already imported successfully
            $latestImportedFile = $this->getLatestFile($xmlFileDirectory . '/success/');

            //if there has been no previous import or the data to import has changed, do import
            if (null != $file) {

                if (null == $latestImportedFile || sha1_file($file) != sha1_file($latestImportedFile)) {
                    $entityList = array();

                    echo 'extracting data from file "' . $file . '"' . chr(10);
                    $entityList = array_merge($entityList, $this->extractXmlData($file, $storagePid));

                    if (sizeof($entityList) > 0) {
                        if (!$GLOBALS['TYPO3_DB']->sql_query($this->deleteJobs)) {
                            throw new InvalidQueryException("Unable to delete all jobs in table tx_erbejobs_domain_model_job");
                        }
                        if (!$GLOBALS['TYPO3_DB']->sql_query($this->deleteJobsUrlCache)) {
                            throw new InvalidQueryException("Unable to delete job detail page mappings from real url cache");
                        }
                        if (!$GLOBALS['TYPO3_DB']->sql_query($this->deleteJobsUniqueAlias)) {
                            throw new InvalidQueryException("Unable to delete jobs from realurl unique alias");
                        }

                        echo "attempting to write '" . sizeof($entityList) . "' items to database" . chr(10);
                        $this->writeToRepository($entityList);
                    }

                    echo 'moving file "' . $file . '" to success folder' . chr(10);
                    $this->moveFileToSuccessFolder($file, $xmlFileDirectory);

                    //call the webpage to init all job offers for real url
                    $curlRes = curl_init("https://de.erbe-med.com/de-de/unternehmen/karriere/stellenangebote/");
                    curl_setopt($curlRes, CURLOPT_RETURNTRANSFER, true);
                    $curlcall = curl_exec($curlRes);

                    if (false === $curlcall) {
                        throw new \Exception("Call to https://de.erbe-med.com/de-de/unternehmen/karriere/stellenangebote/ failed. Job offers are not made aware to realURL.");
                    }
                    curl_close($curlRes);
                } else {
                    echo 'moving file "' . $file . '" to unchanged folder' . chr(10);
                    $this->moveFileToUnchangedFolder($file, $xmlFileDirectory);
                }
            }

//            sleep(10);
//            $scheduler = GeneralUtility::makeInstance(\TYPO3\CMS\Scheduler\Scheduler::class);
//            /** @var $scheduler \TYPO3\CMS\Scheduler\Scheduler::class **/
//            $createCrawlerQueue = $scheduler->fetchTask(10);
//            if ($createCrawlerQueue->isExecutionRunning()) {
//                $createCrawlerQueue->stop();
//                $createCrawlerQueue->save();
//            }
//            $createCrawlerQueue->execute();
//            while ($createCrawlerQueue->isExecutionRunning()) {
//                sleep(2);
//            }
            // does not work within the same task. must be executed afterwards
//            sleep(30);
//            $executeCrawlerQueue = $scheduler->fetchTask(11);
//
//            if ($executeCrawlerQueue->isExecutionRunning()) {
//                $executeCrawlerQueue->stop();
//                $executeCrawlerQueue->save();
//            }
//            $executeCrawlerQueue->execute();
//            while ($executeCrawlerQueue->isExecutionRunning()) {
//                sleep(2);
//            }

            $status = self::STATUS_SUCCESSFUL;
        }
        catch (\Exception $e) {
                        echo $e->getMessage() . chr(10);
            echo $e->getTraceAsString() . chr(10);
            $exception = $e;

            //send exception notification - no success email
            $this->_sendStatusEmail($status, $exception, $recipients);

            //try to move file to error folder but do not handle exceptions as
            //either the file has already been moved or an exception is already being thrown and handled elsewhere
            try {
                if (file_exists($file)) {
                    $this->moveFileToErrorFolder($file, $xmlFileDirectory);
                }
            }
            catch (\Exception $e1) {
                //do nothing
            }
            throw $e;
        }
        echo 'Import done!'.chr(10);

    }

    /**
     * Moves the file $file to the error subdir in $xmlFileDirectory
     * @param $file the file
     * @param $xmlFileDirectory the xml file directory
     *
     * @throws FileOperationErrorException if moving $file to subdir fails
     */
    private function moveFileToErrorFolder($file, $xmlFileDirectory) {
        //try to move the file by copy and delete
        if (copy($file, $xmlFileDirectory . '/error/' . date("Y-m-d_H:i:s") . "_" . basename($file))) {
            unlink($file);
        }
        else {
            throw new FileOperationErrorException('moving file ' . $file . '  to ' . $xmlFileDirectory . '/error failed');

        }
    }

    /**
     * Moves the file $file to the success subdir in $xmlFileDirectory
     * @param $file the file
     * @param $xmlFileDirectory the xml file directory
     *
     * @throws FileOperationErrorException if moving $file to subdir fails
     */
    private function moveFileToSuccessFolder($file, $xmlFileDirectory) {
        //try to move the file by copy and delete
        if (copy($file, $xmlFileDirectory . '/success/' . date("Y-m-d_H:i:s") . "_" . basename($file))) {
            unlink($file);
        }
        else {
            throw new FileOperationErrorException('moving file ' . $file . '  to ' . $xmlFileDirectory . '/success failed');
        }
    }

    /**
     * Moves the file $file to the success subdir in $xmlFileDirectory
     * @param $file the file
     * @param $xmlFileDirectory the xml file directory
     *
     * @throws FileOperationErrorException if moving $file to subdir fails
     */
    private function moveFileToUnchangedFolder($file, $xmlFileDirectory) {
        //try to move the file by copy and delete
        if (copy($file, $xmlFileDirectory . '/unchanged/' . date("Y-m-d_H:i:s") . "_" . basename($file))) {
            unlink($file);
        }
        else {
            throw new FileOperationErrorException('moving file ' . $file . '  to ' . $xmlFileDirectory . '/unchanged failed');
        }
    }

    /**
     * Sends a success / failed e-mail to defined recipients. status 0 = failed, status 1 = successful
     * @param $status int
     * @param $exception \Exception
     * @param $recipients array
     */
    protected function _sendStatusEmail($status, $exception, $recipients)
    {
        $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
        $body .= '<html xmlns="http://www.w3.org/1999/xhtml">';
        $body .= '<body>';
        $body .= '<h2>Erbe-Med.com: Persis Import Report</h2>';
        $body .= '<small>' . date('Y-m-d H:i O') . '</small><br />';
        $body .= '<span>Import successful: ' . ($status ? 'yes' : 'no') . '</span>';


        $body .= '<p>Exception message: ' . $exception->getMessage() . '</p>';
        $body .= '<p>Exception stack trace: ' . $exception->getTraceAsString() . '</p>';


        $body .= '</body>';
        $body .= '</html>';

        echo "Sending report emails ...\n";

        echo print_r($recipients);
        foreach ($recipients as $recipient) {
            $recipient = trim($recipient);
            echo " > Sending to " . $recipient . " ...\n";

            /** @var \TYPO3\CMS\Core\Mail\MailMessage $mail */
            $mail = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
            $mail->setSubject('Erbe-Med.com: Persis Import Failed ' . date('Y-m-d H:i O'));
            $mail->setFrom(array('info@erbe-med.com' => 'Erbe Medizintechnik'));
            $mail->setTo(array($recipient));
            $mail->setBody($body, 'text/html', 'utf-8');
            $mail->send();
        }
        echo "\n";
    }

}