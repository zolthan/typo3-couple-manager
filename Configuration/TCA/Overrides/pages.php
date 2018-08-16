<?php
defined('TYPO3_MODE') or die();

// Override news icon
$GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = [
    0 => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_be.xlf:couples-folder',
    1 => 'couple_manager',
    2 => 'apps-pagetree-folder-contains-couples',
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'news',
    'Configuration/TSconfig/Page/couples_only.txt',
    'EXT:couple_manager :: Restrict pages to couple_manager records'
);
