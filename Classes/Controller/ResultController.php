<?php

namespace SchwarzWeissReutlingen\CoupleManager\Controller;

use Psr\Http\Message\ResponseInterface;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Result;
use TYPO3Fluid\Fluid\View\ViewInterface;
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
 * ResultController
 */
class ResultController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * coupleRepository
     *
     * @var \SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CoupleRepository
     */
    protected $coupleRepository;

    /**
     * resultRepository
     *
     * @var \SchwarzWeissReutlingen\CoupleManager\Domain\Repository\ResultRepository
     */
    protected $resultRepository;

    public function __construct(\SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CoupleRepository $coupleRepository, \SchwarzWeissReutlingen\CoupleManager\Domain\Repository\ResultRepository $resultRepository)
    {
        $this->coupleRepository = $coupleRepository;
        $this->resultRepository = $resultRepository;
    }

    /**
     * @param ViewInterface $view
     */
    public function initializeView(ViewInterface $view)
    {
        $view->assign('page', $GLOBALS['TSFE']->page);
        $view->assign('user', $GLOBALS['TSFE']->fe_user->user);
        $view->assign('contentObjectUid', $this->configurationManager->getContentObject()->data['uid']);
        $view->assign('cookies', $_COOKIE);
        $view->assign('session', $_SESSION ?? []);
    }

    /**
     * @return QueryInterface
     */
    protected function getListQuery()
    {
        $orderArray = [
            'date' => QueryInterface::ORDER_DESCENDING,
            'uid' => QueryInterface::ORDER_DESCENDING,
        ];
        $this->resultRepository->setDefaultOrderings($orderArray);

        $query = $this->resultRepository->createQuery();

        $limit = (int)($this->settings['list']['limit'] ?? 0);
        if ($limit > 0) {
            $query->setLimit($limit);
        }
        return $query;
    }

    /**
     * @param bool $future
     * @return array
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    protected function getCommonConstraints($future = false)
    {
        $query = $this->getListQuery();

        $constraints = [
            $query->equals('couple.hide_results', 0),
        ];

        if ($future) {
            $constraints[] = $query->greaterThanOrEqual('date', date('Y-m-d', strtotime('-2 Weeks')));
            $constraints[] = $query->lessThanOrEqual('position', 0);
        } else {
            $constraints[] = $query->lessThanOrEqual('date', date('Y-m-d'));
            $constraints[] = $query->greaterThan('position', 0);
        }
        $timeLow = $this->settings['list']['timeRestrictionLow'] ?? null;
        if (!empty($timeLow)) {
            $constraints[] = $query->greaterThanOrEqual('date', date('Y-m-d', strtotime($timeLow)));
        }

        $timeHigh = $this->settings['list']['timeRestrictionHigh'] ?? null;
        if (!empty($timeHigh)) {
            $constraints[] = $query->lessThanOrEqual('date', date('Y-m-d', strtotime($timeHigh)));
        }

        $timeRolling = $this->settings['list']['timeRestrictionRolling'] ?? null;
        if (!empty($timeRolling)) {
            $rollingDate = date('Y-m-d', strtotime('-' . abs($timeRolling) . ' days'));
            $constraints[] = $query->greaterThanOrEqual('date', $rollingDate);
        }

        return $constraints;
    }

    /**
     * action list
     *
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function listAction(): ResponseInterface
    {
        $query = $this->getListQuery();
        $constraints = $this->getCommonConstraints();
        $results = $query
            ->matching($query->logicalAnd(...$constraints))
            ->execute();

        $this->view->assign('results', $results);

        return $this->htmlResponse();
    }

    /**
     * action listSuccess
     *
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function listSuccessAction(): ResponseInterface
    {
        $query = $this->getListQuery();
        $constraints = $this->getCommonConstraints();

        /*
         * Group by Meisterschaften, Aufstiegen, 1-3 Plätze
         * und Erfolge where Platzierung/Teilnehmer < 0,25
         */
        $championshipArray = [
            'Landesmeisterschaft',
            'Gebietsmeisterschaft',
            'Deutsche Meisterschaft',
            'Weltmeisterschaft',
        ];
        $constraints [] = $query->in('competitionType.name', $championshipArray);
        $constraints [] = $query->lessThanOrEqual('position', 1);
        $query->matching($query->logicalAnd(...$constraints));
        $queryResult = $query->execute();
        $entities = $queryResult->toArray();
        // reset constraints
        array_pop($constraints);
        array_pop($constraints);
        $this->view->assign('championchips', $entities);

        $constraints [] = $query->equals('promotion', 1);
        $query->matching($query->logicalAnd(...$constraints));
        $queryResult = $query->execute();
        $entities = $queryResult->toArray();
        // reset constraints
        array_pop($constraints);
        $this->view->assign('promotions', $entities);

        $constraints [] = $query->lessThanOrEqual('position', 3);
        $orderArray = [
            'position' => QueryInterface::ORDER_ASCENDING,
            'date' => QueryInterface::ORDER_DESCENDING,
        ];
        $query
            ->setOrderings($orderArray)
            ->matching($query->logicalAnd(...$constraints));
        $queryResult = $query->execute();
        $entities = $queryResult->toArray();
        // reset constraints
        array_pop($constraints);
        $this->view->assign('top3', $entities);

        $constraints [] = $query->greaterThan('position', 3);
        $orderArray = [
            'date' => QueryInterface::ORDER_DESCENDING,
            'position' => QueryInterface::ORDER_ASCENDING,
        ];
        $query
            ->setOrderings($orderArray)
            ->matching($query->logicalAnd(...$constraints));
        $queryResult = $query->execute();
        $entities = $queryResult->toArray();
        $filteredEntities = [];
        foreach ($entities as $entity) {
            /** @var Result $entity */
            $quotient = $entity->getPosition() / $entity->getParticipantCount();
            if ($quotient < 0.25) {
                $filteredEntities[] = $entity;
            }
        }

        $this->view->assign('goodOnes', $filteredEntities);

        return $this->htmlResponse();
    }

    /**
     * action listFuture
     *
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function listFutureAction(): ResponseInterface
    {
        $query = $this->getListQuery();
        $constraints = $this->getCommonConstraints(true);
        $constraints [] = $query->equals('couple.show_future', 1);

        $orderArray = [
            'discipline' => QueryInterface::ORDER_ASCENDING,
            'date' => QueryInterface::ORDER_ASCENDING,
            'couple.man_last_name' => QueryInterface::ORDER_ASCENDING,
        ];
        $query
            ->setOrderings($orderArray)
            ->matching($query->logicalAnd(...$constraints));
        $queryResult = $query->execute();
        $entities = $queryResult->toArray();
        $this->view->assign('competitions', $entities);

        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param Result $result
     */
    public function showAction(Result $result): ResponseInterface
    {
        $this->view->assign('result', $result);

        return $this->htmlResponse();
    }
}
