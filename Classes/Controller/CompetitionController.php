<?php

namespace SchwarzWeissReutlingen\CoupleManager\Controller;

use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;

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
     * @param ViewInterface $view
     * @return void
     */
    public function initializeView(ViewInterface $view)
    {
        parent::initializeView($view);
        $view->assign('page', $GLOBALS['TSFE']->page);
        $view->assign('user', $GLOBALS['TSFE']->fe_user->user);
        $view->assign('contentObjectUid', $this->configurationManager->getContentObject()->data['uid']);
        $view->assign('cookies', $_COOKIE);
        $view->assign('session', $_SESSION);
    }

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
     * @param Competition $competition
     * @return void
     */
    public function showAction(Competition $competition)
    {
        $this->view->assign('competition', $competition);
    }
}
