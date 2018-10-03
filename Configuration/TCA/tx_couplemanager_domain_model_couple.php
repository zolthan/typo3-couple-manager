<?php
$modelFields = 'active_couple,image,man_last_name,man_first_name,woman_last_name,woman_first_name,starting_group,starting_class_latin,starting_class_standard,description';

return [
    'ctrl' => [
        'title' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_couple',
        'label' => 'man_last_name',
        'label_userFunc' => \SchwarzWeissReutlingen\CoupleManager\Userfuncs\Tca::class . '->getCoupleName',
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
        'iconfile' => 'EXT:couple_manager/Resources/Public/Icons/tx_couplemanager_domain_model_couple.svg'
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
        'man_last_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_couple.man_last_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'man_first_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_couple.man_first_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'woman_last_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_couple.woman_last_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'woman_first_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_couple.woman_first_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
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
        'starting_class_latin' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_couple.starting_class_latin',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'itemsProcFunc' => \SchwarzWeissReutlingen\CoupleManager\Userfuncs\Tca::class . '->getStartingClassItems',
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'starting_class_standard' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_couple.starting_class_standard',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'itemsProcFunc' => \SchwarzWeissReutlingen\CoupleManager\Userfuncs\Tca::class . '->getStartingClassItems',
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_couple.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'enableRichtext' => true,
            ],
        ],
        'active_couple' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_couple.active_couple',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
                'default' => 1,
            ]
        ],
        'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couplemanager_domain_model_couple.image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'image',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            'foreign_types' => [
                                '0' => [
                                    'showitem' => '
                            --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                                ],
                                \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                                    'showitem' => '
                            --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                                ],
                                \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                    'showitem' => '
                            --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                                ],
                            ],
                        ],
                    ],
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],

        'result' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
