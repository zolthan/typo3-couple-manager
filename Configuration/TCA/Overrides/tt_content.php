<?php

defined('TYPO3') or die();

call_user_func(
    function () {
        $plugins = [
            'Couple' => ['flexforms_tab.mode.couple_detail', null],
            'CoupleList' => ['flexforms_tab.mode.couple_list', 'flexform_couple_list.xml'],
            'CompetitionList' => ['flexforms_tab.mode.competition_list', null],
            'ResultList' => ['flexforms_tab.mode.result_list', 'flexform_result.xml'],
            'ResultListSuccess' => ['flexforms_tab.mode.result_list_success', 'flexform_result.xml'],
            'ResultListFuture' => ['flexforms_tab.mode.result_list_future', 'flexform_result.xml'],
        ];
        foreach ($plugins as $pluginName => [$label, $flexForm]) {
            $pluginSignature = \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
                'CoupleManager',
                $pluginName,
                'LLL:EXT:couple_manager/Resources/Private/Language/locallang_be.xlf:' . $label,
                'ext-couple_manager-wizard-icon',
                'plugins'
            );
            if ($flexForm !== null) {
                \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
                    '*',
                    'FILE:EXT:couple_manager/Configuration/FlexForms/' . $flexForm,
                    $pluginSignature
                );
                \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
                    'tt_content',
                    '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.plugin, pi_flexform',
                    $pluginSignature,
                    'after:palette:headers'
                );
            }
        }
    }
);
