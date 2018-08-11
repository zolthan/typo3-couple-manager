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
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $couples = $this->coupleRepository->findAll();
        $this->view->assign('couples', $couples);
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
    }
}
