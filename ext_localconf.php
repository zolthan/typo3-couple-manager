<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'SchwarzWeissReutlingen.CoupleManager',
            'Couple',
            [
                'Couple' => 'list, show'
            ],
            // non-cacheable actions
            [
                'Couple' => '',
                'Competition' => '',
                'Result' => ''
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    couple {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('couple_manager') . 'Resources/Public/Icons/user_plugin_couple.svg
                        title = LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couple_manager_domain_model_couple
                        description = LLL:EXT:couple_manager/Resources/Private/Language/locallang_db.xlf:tx_couple_manager_domain_model_couple.description
                        tt_content_defValues {
                            CType = list
                            list_type = couplemanager_couple
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);
