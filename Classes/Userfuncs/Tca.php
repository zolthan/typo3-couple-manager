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
use SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CompetitionRepository;
use SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CompetitionTypeRepository;
use SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CoupleRepository;
use SchwarzWeissReutlingen\CoupleManager\Domain\Repository\ResultRepository;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Tca renderer
 */
class Tca
{
    /** @var CoupleRepository */
    protected $coupleRepository;
    /** @var LocalizationUtility */
    protected $localize;
    /** @var ResultRepository */
    protected $resultRepository;
    /** @var CompetitionRepository */
    protected $competitionRepository;
    /** @var CompetitionTypeRepository */
    protected $competitionTypeRepository;

    /**
     * Tca constructor.
     */
    public function __construct()
    {
        $this->coupleRepository = GeneralUtility::makeInstance(CoupleRepository::class);
        $this->resultRepository = GeneralUtility::makeInstance(ResultRepository::class);
        $this->competitionRepository = GeneralUtility::makeInstance(CompetitionRepository::class);
        $this->competitionTypeRepository = GeneralUtility::makeInstance(CompetitionTypeRepository::class);
    }

    /**
     * @param Repository $repository
     * @param int $uid
     *
     * @return object
     */
    protected function getObjectByUid($repository, $uid)
    {
        $query = $repository->createQuery();
        $query->getQuerySettings()->setIgnoreEnableFields(true)->setRespectStoragePage(false);
        $query->matching($query->equals('uid', $uid));
        return $query->execute()->getFirst();
    }

    /**
     * @param array $parameters
     * @param Tca $parentObject
     */
    public function getResultTitle(&$parameters, $parentObject)
    {
        /** @var Result $result */
        $result = $this->getObjectByUid($this->resultRepository, $parameters['row']['uid']);
        if ($result) {
            /** @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage $storage */
            $storage = $result->getCompetition();
            if ($storage) {
                /** @var Competition $competition */
                $competition = $storage->current();
                $competitionName = '[N/A]';
                if ($competition) {
                    $competitionName = $competition->getTitle();
                }
            }
            /** @var Couple $couple */
            $couple = $result->getCouple()->current();
            $coupleName = '[No/Av]';
            if ($couple) {
                $coupleName = $couple->getCoupleName();
            }
            $parameters['title'] = sprintf('%s - %s - %s', $result->getDate()?->format('d.m.Y'), $coupleName, $competitionName);
        }
    }

    /**
     * @param array $parameters
     * @param Tca $parentObject
     */
    public function getCompetitionIdentifier(&$parameters, $parentObject)
    {
        /** @var CompetitionType $type */
        $type = $this->getObjectByUid($this->competitionRepository, $parameters['row']['uid']);
        if ($type) {
            $parameters['title'] = $type->getIdentifier();
        }
    }

    /**
     * @param array $parameters
     * @param Tca $parentObject
     */
    public function getCompetitionTypeTitle(&$parameters, $parentObject)
    {
        /** @var CompetitionType $type */
        $type = $this->getObjectByUid($this->competitionTypeRepository, $parameters['row']['uid']);
        if ($type) {
            $parameters['title'] = $type->getOptionLabel();
        }
    }

    /**
     * @param array $parameters
     * @param Tca $parentObject
     */
    public function getCoupleName(&$parameters, $parentObject)
    {
        /** @var Couple $couple */
        $couple = $this->getObjectByUid($this->coupleRepository, $parameters['row']['uid']);
        if ($couple) {
            $parameters['title'] = $couple->getCoupleName();
        }
    }

    /**
     * Competition types of the record's folder, most recently used in a result first
     *
     * @param array $config
     *
     * @return array
     */
    public function getCompetitionTypeOptionList($config)
    {
        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        $lastUsed = $connectionPool->getQueryBuilderForTable('tx_couplemanager_domain_model_result');
        $lastUsed->getRestrictions()->removeAll()->add(GeneralUtility::makeInstance(DeletedRestriction::class));
        $lastUsed->select('competition_type')
            ->addSelectLiteral('MAX(' . $lastUsed->quoteIdentifier('date') . ') AS ' . $lastUsed->quoteIdentifier('last_used'))
            ->from('tx_couplemanager_domain_model_result')
            ->groupBy('competition_type');
        $lastUsedByType = array_column($lastUsed->executeQuery()->fetchAllAssociative(), 'last_used', 'competition_type');

        $types = $connectionPool->getQueryBuilderForTable('tx_couplemanager_domain_model_competitiontype');
        $types->getRestrictions()->removeAll()->add(GeneralUtility::makeInstance(DeletedRestriction::class));
        $rows = $types->select('uid', 'name', 'organization')
            ->from('tx_couplemanager_domain_model_competitiontype')
            ->where($types->expr()->eq('pid', $types->createNamedParameter((int)$config['row']['pid'], Connection::PARAM_INT)))
            ->orderBy('organization')
            ->addOrderBy('name')
            ->executeQuery()
            ->fetchAllAssociative();
        usort($rows, static fn(array $a, array $b): int => strcmp((string)($lastUsedByType[$b['uid']] ?? ''), (string)($lastUsedByType[$a['uid']] ?? '')));

        $config['items'] = [['label' => '', 'value' => '']];
        foreach ($rows as $row) {
            $config['items'][] = [
                'label' => sprintf('%s (%s)', $row['name'], $row['organization']),
                'value' => $row['uid'],
                'icon' => 'tcarecords-tx_couplemanager_domain_model_competitiontype-default',
            ];
        }
        return $config;
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
            ['A/S', 'a/s'],
            ['A', 'a'],
            ['B/A', 'b/a'],
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
            [LocalizationUtility::translate('adult', 'couple_manager'), 'adult'],
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
