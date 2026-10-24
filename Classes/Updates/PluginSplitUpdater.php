<?php

declare(strict_types=1);

namespace SchwarzWeissReutlingen\CoupleManager\Updates;

use TYPO3\CMS\Core\Configuration\FlexForm\FlexFormTools;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Localization\LanguageServiceFactory;
use TYPO3\CMS\Core\Service\FlexFormService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;

/**
 * Splits the former single "Couple" plugin (switchableControllerActions) into one plugin per mode.
 */
#[UpgradeWizard('coupleManagerPluginSplit')]
final class PluginSplitUpdater implements UpgradeWizardInterface
{
    /** @var array<string, array{0: string, 1: bool}> */
    private const TARGETS = [
        'Couple->list' => ['couplemanager_couplelist', true],
        'Couple->detail' => ['couplemanager_couple', false],
        'Competition->list' => ['couplemanager_competitionlist', false],
        'Result->list' => ['couplemanager_resultlist', true],
        'Result->listSuccess' => ['couplemanager_resultlistsuccess', true],
        'Result->listFuture' => ['couplemanager_resultlistfuture', true],
    ];

    public function __construct(
        private readonly FlexFormService $flexFormService,
        private readonly FlexFormTools $flexFormTools,
    ) {
    }

    public function getTitle(): string
    {
        return 'Couple Manager: split plugin into one plugin per mode';
    }

    public function getDescription(): string
    {
        return 'Converts content elements of the former single plugin (list_type "couplemanager_couple" with switchableControllerActions) to the dedicated plugin content types.';
    }

    public function getPrerequisites(): array
    {
        return [DatabaseUpdatedPrerequisite::class];
    }

    public function updateNecessary(): bool
    {
        return $this->getRecords() !== [];
    }

    public function executeUpdate(): bool
    {
        $GLOBALS['LANG'] ??= GeneralUtility::makeInstance(LanguageServiceFactory::class)->create('default');

        foreach ($this->getRecords() as $record) {
            $flexForm = $this->flexFormService->convertFlexFormContentToArray((string)$record['pi_flexform']);
            [$cType, $hasFlexForm] = self::TARGETS[$flexForm['switchableControllerActions'] ?? ''] ?? ['couplemanager_couple', false];

            $newFlexForm = '';
            if ($hasFlexForm) {
                $record['CType'] = $cType;
                $record['list_type'] = '';
                $newFlexForm = $this->flexFormTools->cleanFlexFormXML('tt_content', 'pi_flexform', $record);
            }

            $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tt_content');
            $queryBuilder->update('tt_content')
                ->set('CType', $cType)
                ->set('list_type', '')
                ->set('pi_flexform', $newFlexForm)
                ->where($queryBuilder->expr()->eq('uid', $queryBuilder->createNamedParameter($record['uid'], Connection::PARAM_INT)))
                ->executeStatement();
        }

        return true;
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function getRecords(): array
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tt_content');
        $queryBuilder->getRestrictions()->removeAll();

        return $queryBuilder
            ->select('*')
            ->from('tt_content')
            ->where(
                $queryBuilder->expr()->eq('CType', $queryBuilder->createNamedParameter('list')),
                $queryBuilder->expr()->eq('list_type', $queryBuilder->createNamedParameter('couplemanager_couple'))
            )
            ->executeQuery()
            ->fetchAllAssociative();
    }
}
