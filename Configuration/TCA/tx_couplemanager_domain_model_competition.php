<?php
$modelFields = 'title,organizer,date_start,date_end,size_dance_floor,city,country,address,phone,info';

return [
    'ctrl' => [
        'title' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_competition',
        'label' => 'title',
        'sortby' => 'date_start DESC, title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => $modelFields,
        'iconfile' => 'EXT:couple_manager/Resources/Public/Icons/tx_couplemanager_domain_model_competition.svg'
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden,' . $modelFields,
    ],
    'types' => [
        '0' => ['showitem' => 'hidden,' . $modelFields],
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
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_competition.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'

            ],
        ],
        'organizer' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_competition.organizer',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_couplemanager_domain_model_organizer',
                'foreign_table_where' => 'ORDER BY tx_couplemanager_domain_model_organizer.name',
                'MM' => 'tx_couplemanager_domain_model_organizer_competition',
                'enableMultiSelectFilterTextfield' => true,
                'fieldControl' => [
                    'addRecord' => [
                        'disabled' => false,
                        'options' => [
//                            'title' => 'Edit a selected record!',
                        ],
                    ],
                    'editPopup' => [
                        'disabled' => false,
                        'options' => [
//                            'title' => 'Edit a selected record!',
                        ],
                    ],
                ],
            ],
        ],
        'date_start' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_competition.date_start',
            'config' => [
                'dbType' => 'date',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => '0000-00-00'
            ],
        ],
        'date_end' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_competition.date_end',
            'config' => [
                'dbType' => 'date',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => '0000-00-00'
            ],
        ],
        'size_dance_floor' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_competition.size_dance_floor',
            'config' => [
                'type' => 'input',
                'size' => 7,
                'max' => 15,
                'eval' => 'trim'
            ],
        ],
        'city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_competition.city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'country' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_competition.country',
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
        'address' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_competition.address',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
                'eval' => 'trim'
            ]
        ],
        'phone' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_competition.phone',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'info' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_competition.info',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
                'eval' => 'trim'
            ]
        ],

        'result' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
