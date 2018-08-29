<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}


Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Products',
	'RATHGEBER Produkte'
	);

// Kategorieübersicht	
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Categories',
	'RATHGEBER Kategorieübersicht'
	);	

	
// Filter	
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Filter',
	'RATHGEBER Produktfilter'
	);	

// Filter	
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Menu',
	'RATHGEBER Megamenu'
	);	

// Filter	
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'MenuImage',
	'RATHGEBER Megamenubild'
	);	
	
// Filter	
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Applications',
	'RATHGEBER Anwendungen'
	);	
	
	
// smart-TEC Special Menu aka SmartMenu	
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'SmartMenu',
	'smart-TEC Anwendungenmenü'
	);	
	
$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);

// flexform products
$pluginName='products'; // siehe Tx_Extbase_Utility_Extension::registerPlugin
$pluginSignature = strtolower($extensionName) . '_'.$pluginName;
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_products.xml');

// flexform categories
$pluginName='categories'; // siehe Tx_Extbase_Utility_Extension::registerPlugin
$pluginSignature = strtolower($extensionName) . '_'.$pluginName;
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_categories.xml');

// flexform applications
$pluginName='applications'; // siehe Tx_Extbase_Utility_Extension::registerPlugin
$pluginSignature = strtolower($extensionName) . '_'.$pluginName;
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_applications.xml');

// flexform filter
$pluginName='filter'; // siehe Tx_Extbase_Utility_Extension::registerPlugin
$pluginSignature = strtolower($extensionName) . '_'.$pluginName;
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_filter.xml');

// flexform megamenu
$pluginName='menu'; // siehe Tx_Extbase_Utility_Extension::registerPlugin
$pluginSignature = strtolower($extensionName) . '_'.$pluginName;
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_menu.xml');

// flexform megamenu
$pluginName='menuimage'; // siehe Tx_Extbase_Utility_Extension::registerPlugin
$pluginSignature = strtolower($extensionName) . '_'.$pluginName;
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_menuimage.xml');

$TCA['tx_rathgeberproducts_domain_model_product'] = array(
	'ctrl' => array(		
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.title',
		'label' => 'name',
		'dividers2tabs' => true,		
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_products.gif',
	),
);

$TCA['tx_rathgeberproducts_domain_model_application'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_application.title',
		'label' => 'name',
		'dividers2tabs' => true,		
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
			
		),
		'searchFields' => '',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_application.gif',
	),
);

$TCA['tx_rathgeberproducts_domain_model_category'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_category.title',
		'label' => 'name',
		'dividers2tabs' => true,		
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_category.gif',
	),
);


$TCA['tx_rathgeberproducts_domain_model_attribute'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.title',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_attribute.gif',
	),
);
/*********************************************************************************************************************************/

$TCA['tx_rathgeberproducts_domain_model_forms'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_forms.title',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);

$TCA['tx_rathgeberproducts_domain_model_colour'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_colour.title',
		'label' => 'name',
		'dividers2tabs' => true,		
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);

$TCA['tx_rathgeberproducts_domain_model_material'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_material.title',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);

$TCA['tx_rathgeberproducts_domain_model_printing'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_printing.title',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);

$TCA['tx_rathgeberproducts_domain_model_size'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_size.title',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);

$TCA['tx_rathgeberproducts_domain_model_strength'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_strength.title',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);

$TCA['tx_rathgeberproducts_domain_model_fixation'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.fixation',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);

$TCA['tx_rathgeberproducts_domain_model_temperature'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.temperature',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);

$TCA['tx_rathgeberproducts_domain_model_delivery'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.delivery',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);

$TCA['tx_rathgeberproducts_domain_model_resistance'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.resistance',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);

$TCA['tx_rathgeberproducts_domain_model_pcolour'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.pcolour',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);


$TCA['tx_rathgeberproducts_domain_model_surfacerefinement'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.surfacerefinement',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);


$TCA['tx_rathgeberproducts_domain_model_certification'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.certification',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);


$TCA['tx_rathgeberproducts_domain_model_identification'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.identification',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);


$TCA['tx_rathgeberproducts_domain_model_productname'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.productname',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);


/*********************************************************************************************************************************/


$TCA['tx_rathgeberproducts_domain_model_frequency'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.frequency',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);


$TCA['tx_rathgeberproducts_domain_model_dimension'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.dimension',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);


$TCA['tx_rathgeberproducts_domain_model_imprint'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.imprint',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);

$TCA['tx_rathgeberproducts_domain_model_metal'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.metal',
		'label' => 'name',
		'dividers2tabs' => true,
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',		
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array(		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif',
	),
);


?>