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

use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\CompetitionType;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Result;
use SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CompetitionTypeRepository;
use SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CoupleRepository;
use SchwarzWeissReutlingen\CoupleManager\Domain\Repository\ResultRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

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
    protected $resultRepository;
    protected $competitionTypeRepository;

    /**
     * Tca constructor.
     */
    public function __construct()
    {
        $this->objectManager             = GeneralUtility::makeInstance(ObjectManager::class);
        $this->coupleRepository          = $this->objectManager->get(CoupleRepository::class);
        $this->resultRepository          = $this->objectManager->get(ResultRepository::class);
        $this->competitionTypeRepository = $this->objectManager->get(CompetitionTypeRepository::class);
    }

    /**
     * @param array $parameters
     * @param Tca   $parentObject
     */
    public function getResultTitle(&$parameters, $parentObject)
    {
        /** @var Result $result */
        $result = $this->resultRepository->findByUid($parameters['row']['uid']);
        if ($result) {
            /** @var Competition $competition */
            $competition     = $result->getCompetition()->current();
            $competitionName = '[N/A]';
            if ($competition) {
                $competitionName = $competition->getTitle();
            }

            /** @var Couple $couple */
            $couple     = $result->getCouple()->current();
            $coupleName = '[N/A]';
            if ($couple) {
                $coupleName = $couple->getCoupleName();
            }
            $parameters['title'] = sprintf('%s - %s - %s', $result->getDate()->format('d.m.Y'), $coupleName, $competitionName);
        }
    }

    /**
     * @param array $parameters
     * @param Tca   $parentObject
     */
    public function getCompetitionTypeTitle(&$parameters, $parentObject)
    {
        /** @var CompetitionType $type */
        $type = $this->competitionTypeRepository->findByUid($parameters['row']['uid']);
        if ($type) {
            $parameters['title'] = sprintf('%s (%s)', $type->getName(), $type->getOrganization());
        }
    }

    /**
     * @param array $parameters
     * @param Tca   $parentObject
     */
    public function getCoupleName(&$parameters, $parentObject)
    {
        /** @var Couple $couple */
        $couple = $this->coupleRepository->findByUid($parameters['row']['uid']);
        if ($couple) {
            $parameters['title'] = $couple->getCoupleName();
        }
    }

    /**
     * @param array $config
     *
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
     * @param array $config
     *
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
     * @param array $config
     *
     * @return array
     */
    public function getStartingGroupItems($config)
    {
        $config['items'] = [
            [LocalizationUtility::translate('please_choose', 'couple_manager'), 0],
            [LocalizationUtility::translate('kin', 'couple_manager'), 'kin'],
            [LocalizationUtility::translate('kin1', 'couple_manager'), 'kin1'],
            [LocalizationUtility::translate('kin2', 'couple_manager'), 'kin2'],
            [LocalizationUtility::translate('jun1', 'couple_manager'), 'jun1'],
            [LocalizationUtility::translate('jun2', 'couple_manager'), 'jun2'],
            [LocalizationUtility::translate('jug', 'couple_manager'), 'jug'],
            [LocalizationUtility::translate('hgr', 'couple_manager'), 'hgr'],
            [LocalizationUtility::translate('hgr2', 'couple_manager'), 'hgr2'],
            [LocalizationUtility::translate('sen1', 'couple_manager'), 'sen1'],
            [LocalizationUtility::translate('sen2', 'couple_manager'), 'sen2'],
            [LocalizationUtility::translate('sen3', 'couple_manager'), 'sen3'],
            [LocalizationUtility::translate('sen4', 'couple_manager'), 'sen4'],
            [LocalizationUtility::translate('sen5', 'couple_manager'), 'sen5'],
        ];

        return $config;
    }
}