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
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Lang\LanguageService;

/**
 * Tca renderer
 */
class Tca
{
    /** @var ObjectManager */
    protected $objectManager;
    /** @var CoupleRepository */
    protected $coupleRepository;
    /** @var LocalizationUtility */
    protected $localize;

    /**
     * Tca constructor.
     */
    public function __construct()
    {
        $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->coupleRepository = $this->objectManager->get(CoupleRepository::class);
    }


    /**
     * @param $parameters
     * @param $parentObject
     */
    public function getCoupleName(&$parameters, $parentObject)
    {
        /** @var Couple $couple */
        $couple = $this->coupleRepository->findByUid($parameters['row']['uid']);
        $parameters['title'] = $couple->getCoupleName();
    }

    /**
     * @return array
     */
    public function getDisciplineItems($config)
    {
        $config['items'] = [
            [LocalizationUtility::translate('please_choose', 'couple_manager'), 0],
            [LocalizationUtility::translate('standard', 'couple_manager'), 'standard'],
            [LocalizationUtility::translate('latin', 'couple_manager'), 'latin'],
            [LocalizationUtility::translate('10dance', 'couple_manager'), '10dance'],
        ];
        return $config;
    }

    /**
     * @return array
     */
    public function getStartingClassItems($config)
    {
        $config['items'] = [
            [LocalizationUtility::translate('please_choose', 'couple_manager'), 0],
            ['S', 's'],
            ['A', 'a'],
            ['B', 'b'],
            ['C', 'c'],
            ['D', 'd'],
        ];
        return $config;
    }

    /**
     * @return array
     */
    public function getStartingGroupItems($config)
    {


        $config['items'] = [
            [LocalizationUtility::translate('please_choose', 'couple_manager'), 0],
            [LocalizationUtility::translate('kinder', 'couple_manager'), 'kin'],
            [LocalizationUtility::translate('kinder1', 'couple_manager'), 'kin1'],
            [LocalizationUtility::translate('kinder2', 'couple_manager'), 'kin2'],
            [LocalizationUtility::translate('junioren1', 'couple_manager'), 'jun1'],
            [LocalizationUtility::translate('junioren2', 'couple_manager'), 'jun2'],
            [LocalizationUtility::translate('jugend', 'couple_manager'), 'jug'],
            [LocalizationUtility::translate('hauptgruppe', 'couple_manager'), 'hgr'],
            [LocalizationUtility::translate('hauptgruppe2', 'couple_manager'), 'hgr2'],
            [LocalizationUtility::translate('senioren1', 'couple_manager'), 'sen1'],
            [LocalizationUtility::translate('senioren2', 'couple_manager'), 'sen2'],
            [LocalizationUtility::translate('senioren3', 'couple_manager'), 'sen3'],
            [LocalizationUtility::translate('senioren4', 'couple_manager'), 'sen4'],
            [LocalizationUtility::translate('senioren5', 'couple_manager'), 'sen5'],
        ];
        return $config;
    }
}