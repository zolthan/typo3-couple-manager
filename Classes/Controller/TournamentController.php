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
 * TournamentController
 */
class TournamentController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * tournamentRepository
     *
     * @var \SchwarzWeissReutlingen\CoupleManager\Domain\Repository\TournamentRepository
     * @inject
     */
    protected $tournamentRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $tournaments = $this->tournamentRepository->findAll();
        $this->view->assign('tournaments', $tournaments);
    }

    /**
     * action show
     *
     * @param \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Tournament $tournament
     * @return void
     */
    public function showAction(\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Tournament $tournament)
    {
        $this->view->assign('tournament', $tournament);
    }
}
