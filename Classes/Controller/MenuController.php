<?php

namespace SchwarzWeissReutlingen\CoupleManager\Controller;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * MenuController
 */
class MenuController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * coupleRepository
     *
     * @var \SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CoupleRepository
     */
    protected $coupleRepository;

    public function __construct(\SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CoupleRepository $coupleRepository)
    {
        $this->coupleRepository = $coupleRepository;
    }

    /**
     * action show
     */
    public function showAction()
    {
        $orderArray = [
            'image' => QueryInterface::ORDER_DESCENDING,
            'man_last_name' => QueryInterface::ORDER_ASCENDING,
        ];
        $orderArray = ['active_couple' => QueryInterface::ORDER_DESCENDING] + $orderArray;
        $this->coupleRepository->setDefaultOrderings($orderArray);
        $couples = $this->coupleRepository->findAll();
        $this->view->assign('couples', $couples);
    }
}
