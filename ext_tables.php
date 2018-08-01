<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'SchwarzWeissReutlingen.CoupleManager',
            'Couple',
            'Couple'
        );

        $pluginSignature = str_replace('_', '', 'couple_manager') . '_couple';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:couple_manager/Configuration/FlexForms/flexform_couple.xml');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('couple_manager', 'Configuration/TypoScript', 'Couple Manager');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_couplemanager_domain_model_couple', 'EXT:couple_manager/Resources/Private/Language/locallang_csh_tx_couplemanager_domain_model_couple.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_couplemanager_domain_model_couple');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_couplemanager_domain_model_tournament', 'EXT:couple_manager/Resources/Private/Language/locallang_csh_tx_couplemanager_domain_model_tournament.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_couplemanager_domain_model_tournament');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_couplemanager_domain_model_result', 'EXT:couple_manager/Resources/Private/Language/locallang_csh_tx_couplemanager_domain_model_result.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_couplemanager_domain_model_result');

    }
);
