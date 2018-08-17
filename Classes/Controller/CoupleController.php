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

//    /**
//     * Checks if we have settings from BE-Editor.
//     * We always forward to these settings due to the fact, that it
//     * has to be possible to call two plugins on one page.
//     */
//    protected function initializeAction()
//    {
//        $controller = FALSE;
//        $action = FALSE;
//        var_dump($this->settings, $this->request->getArguments());
//        die(sprintf('%s || %s', __METHOD__, __LINE__));
//
//        // search for specified settings in flexform and take these, if set.
//        if (is_array($this->settings)
//            && isset($this->settings)
//            && isset($this->settings)
//        ) {
//            $controller = $this->settings;
//            $action = $this->settings;
//        }
//
//        if ($controller && $action && $this->actionMethodName != $action . "Action") {
//            $tmpArgs = $this->request->getArguments();
//            unset($tmpArgs);
//            unset($tmpArgs);
//            $this->forward($action, $controller, $this->extensionName, $tmpArgs);
//        }
//    }

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
    }
}
