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
            'image' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
            'man_last_name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        ];
        if ($this->settings['list']['activeCouplesFirst']) {
            $orderArray = ['active_couple' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING] + $orderArray;
        }
        $this->coupleRepository->setDefaultOrderings($orderArray);
//        $couples = $this->coupleRepository->createQuery();
//        \TYPO3\CMS\Core\Utility\DebugUtility::debug($couples, sprintf('%s|%s' . PHP_EOL, __METHOD__, __LINE__));
        $couples = $this->coupleRepository->findAll();
        $this->view->assign('couples', $couples);
    }

    /**
     * action list
     *
     * @return void
     */
    public function listSimpleAction()
    {
        $this->listAction();
    }

    /**
     * action show
     *
     * @param \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple $couple
     * @return void
     */
    public function detailAction(\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple $couple)
    {
        $this->view->assign('couple', $couple);

        $orderArray = [
            'discipline' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
            'date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
            'starting_class' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        ];
        $this->resultRepository->setDefaultOrderings($orderArray);
        $results = $this->resultRepository->findByCouple($couple->getUid());

        $this->view->assign('results', $results);
    }
}
