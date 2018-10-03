<?php
$modelFields = 'couple,promotion,date,competition,competition_type,discipline,starting_group,starting_class,position,participant_count';

return [
    'ctrl' => [
        'title' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_result',
        'label' => 'date',
        'label_userFunc' => \SchwarzWeissReutlingen\CoupleManager\Userfuncs\Tca::class . '->getResultTitle',
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
        'searchFields' => $modelFields,
        'iconfile' => 'EXT:couple_manager/Resources/Public/Icons/tx_couplemanager_domain_model_result.svg'
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
        'couple' => [
            'exclude' => false,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_result.couple',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'itemsProcFunc' => \SchwarzWeissReutlingen\CoupleManager\Userfuncs\Tca::class . '->getCoupleOptionList',
                'items' => [
                    ['LLL:EXT:couple_manager/Resources/Private/Language/locallang_be.xlf:pleaseChoose', 0],
                ],
                'minitems' => 1,
                'maxitems' => 1,
                'appearance' => [
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                ],
            ],
        ],
        'promotion' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_result.promotion',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 0,
            ]
        ],
        'competition' => [
            'exclude' => false,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_result.competition',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_couplemanager_domain_model_competition',
                'foreign_field' => 'result',
                'foreign_table_where' => 'ORDER BY tx_couplemanager_domain_model_competition.title ASC, tx_couplemanager_domain_model_competition.date_start DESC',
                'items' => [
                    ['LLL:EXT:couple_manager/Resources/Private/Language/locallang_be.xlf:pleaseChoose', 0],
                ],
                'minitems' => 1,
                'maxitems' => 1,
                'appearance' => [
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                ],
            ],
        ],
        'competition_type' => [
            'exclude' => false,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_result.competition_type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_couplemanager_domain_model_competitiontype',
                'foreign_field' => 'result',
                'foreign_table_where' => 'ORDER BY tx_couplemanager_domain_model_competitiontype.organization ASC, tx_couplemanager_domain_model_competitiontype.name ASC',
                'items' => [
                    ['LLL:EXT:couple_manager/Resources/Private/Language/locallang_be.xlf:pleaseChoose', 0],
                ],
                'minitems' => 1,
                'maxitems' => 1,
                'appearance' => [
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                ],
            ],
        ],
        'date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_result.date',
            'config' => [
                'dbType' => 'date',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => '0000-00-00'
            ],
        ],
        'starting_group' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_couple.starting_group',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'itemsProcFunc' => \SchwarzWeissReutlingen\CoupleManager\Userfuncs\Tca::class . '->getStartingGroupItems',
                'size' => 1,
                'minitems' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'starting_class' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_result.starting_class',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'itemsProcFunc' => \SchwarzWeissReutlingen\CoupleManager\Userfuncs\Tca::class . '->getStartingClassItems',
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'discipline' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_result.discipline',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'itemsProcFunc' => \SchwarzWeissReutlingen\CoupleManager\Userfuncs\Tca::class . '->getDisciplineItems',
                'size' => 1,
                'minitems' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'position' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_result.position',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'participant_count' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_result.participant_count',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
    ],
];
