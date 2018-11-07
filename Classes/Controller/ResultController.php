<?php

namespace SchwarzWeissReutlingen\CoupleManager\Controller;

/***
 *
 * This file is part of the "Couple Manager" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Sebastian Wilhelm <wilhelm79@web.de>, Schwarz-Weiß Reutlingen e.V.
 *
 ***/

/**
 * ResultController
 */
class ResultController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * coupleRepository
     *
     * @var \SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CoupleRepository
     * @inject
     */
    protected $coupleRepository = null;

    /**
     * resultRepository
     *
     * @var \SchwarzWeissReutlingen\CoupleManager\Domain\Repository\ResultRepository
     * @inject
     */
    protected $resultRepository = null;


    /**
     * @return \TYPO3\CMS\Extbase\Persistence\QueryInterface
     */
    protected function getListQuery()
    {
        $orderArray = [
            'date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
        ];
        $this->resultRepository->setDefaultOrderings($orderArray);

        $query = $this->resultRepository->createQuery();

        $limit = (int)$this->settings['list']['limit'];
        if ($limit > 0) {
            $query->setLimit($limit);
        }
        return $query;
    }

    /**
     * @return array
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    protected function getCommonConstraints()
    {
        $query = $this->getListQuery();

        $constraints = [
            $query->equals('couple.hide_results', 0),
            $query->lessThanOrEqual('date', strftime('%Y-%m-%d')),
            $query->greaterThan('position', 0),
        ];

        $timeLow = $this->settings['list']['timeRestrictionLow'];
        if (!empty($timeLow)) {
            $constraints[] = $query->greaterThanOrEqual('date', strftime('%Y-%m-%d', strtotime($timeLow)));
        }

        $timeHigh = $this->settings['list']['timeRestrictionHigh'];
        if (!empty($timeHigh)) {
            $constraints[] = $query->lessThanOrEqual('date', strftime('%Y-%m-%d', strtotime($timeHigh)));
        }
        return $constraints;
    }

    /**
     * action list
     *
     * @return void
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function listAction()
    {
        $query = $this->getListQuery();
        $constraints = $this->getCommonConstraints();
        $results = $query
            ->matching($query->logicalAnd($constraints))
            ->execute();

        $this->view->assign('results', $results);
    }

    /**
     * Get the ConnectionPool object
     *
     * @return \TYPO3\CMS\Core\Database\ConnectionPool
     */
    protected function getConnectionPool(): \TYPO3\CMS\Core\Database\ConnectionPool{
        return \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class);
    }

    /**
     * action listSuccess
     *
     * @return void
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function listSuccessAction()
    {
        $query = $this->getListQuery();
        $constraints = $this->getCommonConstraints();

        /*
         * Group by Meisterschaften, Aufstiegen, 1-3 Plätze
         * und Erfolge where Platzierung/Teilnehmer < 0,25
         */
        $orConstraints = $query->logicalOr([
            $query->lessThanOrEqual('position', 3),
            $query->equals('promotion', 1),
//            $query->lessThanOrEqual('position/participant_count', 0.25),
        ]);
        $constraints [] = $orConstraints;

        $queryResult  = $query
            ->matching($query->logicalAnd($constraints))
            ->execute();

        // create a new logger for the database queries to log
        $logger = new \Doctrine\DBAL\Logging\EchoSQLLogger();
        // get the Docrine Connection configuration object
        $connectionConfiguration = $this->getConnectionPool()->getConnectionForTable('tx_couplemanager_domain_model_result')->getConfiguration();
        // backup the current logger
        $loggerBackup = $connectionConfiguration->getSQLLogger();
        // set our logger as the active logger object of the Doctrine connection
        $connectionConfiguration->setSQLLogger($logger);
        // we need to fetch our results here, to enable doctrine to fetch the results
        $entities = $queryResult->toArray();
        // restore the old logger
        $connectionConfiguration->setSQLLogger($loggerBackup);

        $this->view->assign('results', $entities);
    }

    /**
     * action show
     *
     * @param \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Result $result
     * @return void
     */
    public function showAction(\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Result $result)
    {
        $this->view->assign('result', $result);
    }
}
