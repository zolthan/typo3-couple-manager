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
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $orderArray = [
            'date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
        ];
        $this->resultRepository->setDefaultOrderings($orderArray);

        $query = $this->resultRepository->createQuery();
        $query
            ->matching(
                $query->equals('couple.hide_results', 0)
            )
            ->setLimit(10);

        $results = $query
            ->execute();
        $this->view->assign('results', $results);
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
