<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Seventhsense.' . $_EXTKEY,
	'Jobs',
	'Erbe Jobs'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Erbe Jobs (Persis)');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_erbejobs_domain_model_job', 'EXT:erbe_jobs/Resources/Private/Language/locallang_csh_tx_erbejobs_domain_model_job.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_erbejobs_domain_model_job');

/**
 * Flexform
 */
$pluginSignature = str_replace('_','',$_EXTKEY) . '_jobs';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	$pluginSignature,
	'FILE:EXT:erbe_jobs/Configuration/FlexForms/flexform_jobs.xml'
);