<?php
namespace Seventhsense\ErbeJobs\Controller;
/**
 * Created by PhpStorm.
 * User: wiebke.helmrich
 * Date: 27.10.2016
 * Time: 15:56
 */


class JobController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * PropertyRepository
     *
     * @var \Seventhsense\ErbeJobs\Domain\Repository\JobRepository
     * @inject
     */
    protected $jobRepository;

    public function listAction()
    {
        $allJobs = $this->jobRepository->findAll();

        $traineeJobs = array();
        $unsolicitedApplications = array();
        $jobs = array();

        /** @var Job $job */
        foreach($allJobs as $job) {
            $area = $job->getAreaOfExpertise();
            if ($area === 'Ausbildung') {
                array_push($traineeJobs, $job);
            }
            else if ($job->getIni() == '1') {
                array_push($unsolicitedApplications, $job);
            }
            else {
                array_push($jobs, $job);
            }
        }
        $this->view->assign('jobs', $jobs);
        $this->view->assign('unsolicitedApplications', $unsolicitedApplications);
        $this->view->assign('traineeJobs', $traineeJobs);
    }

    public function showAction(\Seventhsense\ErbeJobs\Domain\Model\Job $job)
    {
        $this->view->assign('job', $job);
    }
}