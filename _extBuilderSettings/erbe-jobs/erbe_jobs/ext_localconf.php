<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Seventhsense.' . $_EXTKEY,
    'Jobs',
    array(
        'Job' => 'list, detail',
    ),
    // non-cacheable actions
    array(
        'Job' => 'list',
    )
);

if (TYPO3_MODE === 'BE') {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['extbase']['commandControllers'][$_EXTKEY] =
        \Seventhsense\ErbeJobs\Command\ImportCommandController::class;
}
