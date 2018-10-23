<?php

namespace SchwarzWeissReutlingen\CoupleManager\Controller;

/**
 * MenuController
 */
class MenuController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * coupleRepository
     *
     * @var \SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CoupleRepository
     * @inject
     */
    protected $coupleRepository = null;

    /**
     * action show
     *
     * @return void
     */
    public function showAction()
    {
        $orderArray = [
            'image' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
            'man_last_name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        ];
//        if ($this->settings['list']['activeCouplesFirst']) {
        $orderArray = ['active_couple' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING] + $orderArray;
//        }
        $this->coupleRepository->setDefaultOrderings($orderArray);
        $couples = $this->coupleRepository->findAll();
        $this->view->assign('couples', $couples);

    }
}
