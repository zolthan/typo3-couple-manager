<?php

defined('TYPO3') or die();

call_user_func(
    function () {
        $pluginSignature = \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'CoupleManager',
            'Couple',
            'Couple'
        );
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
            $pluginSignature,
            'FILE:EXT:couple_manager/Configuration/FlexForms/flexform_couple.xml'
        );
    }
);
