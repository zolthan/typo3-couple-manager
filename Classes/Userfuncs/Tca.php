<?php

namespace SchwarzWeissReutlingen\CoupleManager\Userfuncs;

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

use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple;
use SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CoupleRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * Tca renderer
 */
class Tca
{
    /** @var ObjectManager */
    protected $objectManager;
    /** @var CoupleRepository */
    protected $coupleRepository;

    public function __construct()
    {
        $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->coupleRepository = $this->objectManager->get(CoupleRepository::class);
    }


    public function getCoupleName(&$parameters, $parentObject)
    {
        /** @var Couple $couple */
        $couple = $this->coupleRepository->findByUid($parameters['row']['uid']);
        $parameters['title'] = $couple->getCoupleName();
    }
}