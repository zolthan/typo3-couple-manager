<?php

defined('TYPO3') or die();

$GLOBALS['TCA']['pages']['columns']['module']['config']['items'][] = [
    'label' => 'LLL:EXT:couple_manager/Resources/Private/Language/locallang_be.xlf:couples-folder',
    'value' => 'couple_manager',
    'icon' => 'apps-pagetree-folder-contains-couples',
];
