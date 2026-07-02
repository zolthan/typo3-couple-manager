<?php

namespace SchwarzWeissReutlingen\CoupleManager\Controller;

use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple;
use SchwarzWeissReutlingen\CoupleManager\PageTitle\CouplePageTitleProvider;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

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
 * CoupleController
 */
class CoupleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * coupleRepository
     *
     * @var \SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CoupleRepository
     * @inject
     */
    protected $coupleRepository;

    /**
     * resultRepository
     *
     * @var \SchwarzWeissReutlingen\CoupleManager\Domain\Repository\ResultRepository
     * @inject
     */
    protected $resultRepository;

    /**
     * @param ViewInterface $view
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
     */
    public function listAction()
    {
        $orderArray = [
            'image' => QueryInterface::ORDER_DESCENDING,
            'man_last_name' => QueryInterface::ORDER_ASCENDING,
        ];
        if ($this->settings['list']['activeCouplesFirst']) {
            $orderArray = ['active_couple' => QueryInterface::ORDER_DESCENDING] + $orderArray;
        }
        $this->coupleRepository->setDefaultOrderings($orderArray);
        $couples = $this->coupleRepository->findAll();
        $this->view->assign('couples', $couples);
    }

    /**
     * action list
     */
    public function listSimpleAction()
    {
        $this->listAction();
    }

    /**
     * action show
     *
     * @param Couple $couple
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function detailAction(Couple $couple)
    {
        CouplePageTitleProvider::setTitle($couple->getCoupleName());
        $this->view->assign('couple', $couple);

        $orderArray = [
            'discipline' => QueryInterface::ORDER_ASCENDING,
            'date' => QueryInterface::ORDER_DESCENDING,
            'starting_class' => QueryInterface::ORDER_ASCENDING,
        ];

//        $query
//            ->matching(
//                $query->equals('couple', $couple->getUid())
//            )
//            ->matching(
//                $query->lessThanOrEqual('date', strftime('%Y-%m-%d'))
//            )
//            ->matching(
//                $query->greaterThan('position', 0)
//            );

        $results = [];
        if (!$couple->isHideResults()) {
            $this->resultRepository->setDefaultOrderings($orderArray);

            $query = $this->resultRepository->createQuery();
            $constraints = [
                $query->equals('couple', $couple->getUid()),
                $query->lessThanOrEqual('date', strftime('%Y-%m-%d')),
                $query->greaterThan('position', 0),
            ];
            $results = $query
                ->matching($query->logicalAnd($constraints))
                ->execute()
                ->toArray();

            // Reorder discipline groups by most recently active.
            // DB order within each group (date DESC) is preserved; only group sequence changes.
            if ($results) {
                $byDiscipline = [];
                foreach ($results as $result) {
                    $byDiscipline[$result->getDiscipline()][] = $result;
                }
                usort($byDiscipline, static function (array $a, array $b): int {
                    $dateA = $a[0]->getDate();
                    $dateB = $b[0]->getDate();
                    $tsA = $dateA instanceof \DateTime ? $dateA->getTimestamp() : 0;
                    $tsB = $dateB instanceof \DateTime ? $dateB->getTimestamp() : 0;
                    return $tsB <=> $tsA;
                });
                $results = array_merge(...array_values($byDiscipline));
            }
        }

        $this->view->assign('results', $results);

        $futureTournaments = [];
        if ($couple->isShowFuture()) {
            $futureOrderArray = [
                'discipline' => QueryInterface::ORDER_ASCENDING,
                'date' => QueryInterface::ORDER_ASCENDING,
            ];
            $this->resultRepository->setDefaultOrderings($futureOrderArray);
            $futureQuery = $this->resultRepository->createQuery();
            $futureConstraints = [
                $futureQuery->equals('couple', $couple->getUid()),
                $futureQuery->greaterThanOrEqual('date', strftime('%Y-%m-%d', strtotime('-2 Weeks'))),
                $futureQuery->lessThanOrEqual('position', 0),
            ];
            $futureTournaments = $futureQuery
                ->matching($futureQuery->logicalAnd($futureConstraints))
                ->execute()
                ->toArray();
        }
        $this->view->assign('futureTournaments', $futureTournaments);
    }
}
