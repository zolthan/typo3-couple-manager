<?php
$modelFields = 'name,city,country,website';

return [
    'ctrl' => [
        'title' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_organizer',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'name,city',
        'iconfile' => 'EXT:couple_manager/Resources/Public/Icons/tx_couplemanager_domain_model_organizer.svg'
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden,' . $modelFields,
    ],
    'types' => [
        '1' => ['showitem' => 'hidden,' . $modelFields],
    ],
    'columns' => [
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_organizer.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_organizer.city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'country' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_organizer.country',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'static_countries',
                'foreign_table_where' => 'ORDER BY static_countries.cn_short_en',
                'itemsProcFunc' => SJBR\StaticInfoTables\Hook\Backend\Form\FormDataProvider\TcaSelectItemsProcessor::class . '->translateCountriesSelector',
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1
            ],
        ],
        'website' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_organizer.website',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
    ],
];
