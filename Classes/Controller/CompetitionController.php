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
 * CompetitionController
 */
class CompetitionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * competitionRepository
     *
     * @var \SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CompetitionRepository
     * @inject
     */
    protected $competitionRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $competitions = $this->competitionRepository->findAll();
        $this->view->assign('competitions', $competitions);
    }

    /**
     * action show
     *
     * @param \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition $competition
     * @return void
     */
    public function showAction(\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition $competition)
    {
        $this->view->assign('competition', $competition);
    }
}
