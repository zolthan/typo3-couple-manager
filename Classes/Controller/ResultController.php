<?php

namespace SchwarzWeissReutlingen\CoupleManager\Controller;

use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Result;

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
        $constraints [] = $query->equals('promotion', 1);
        $query->matching($query->logicalAnd($constraints));
        $queryResult = $query->execute();
        $entities = $queryResult->toArray();
        $this->view->assign('promotions', $entities);

        array_pop($constraints);
        $constraints [] = $query->lessThanOrEqual('position', 3);
        $orderArray = [
            'position' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
        ];
        $query
            ->setOrderings($orderArray)
            ->matching($query->logicalAnd($constraints));
        $queryResult = $query->execute();
        $entities = $queryResult->toArray();
        $this->view->assign('top3', $entities);

        array_pop($constraints);
        $constraints [] = $query->greaterThan('position', 3);
        $orderArray = [
            'date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
            'position' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        ];
        $query
            ->setOrderings($orderArray)
            ->matching($query->logicalAnd($constraints));
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
    }

    /**
     * action show
     *
     * @param Result $result
     * @return void
     */
    public function showAction(Result $result)
    {
        $this->view->assign('result', $result);
    }
}
