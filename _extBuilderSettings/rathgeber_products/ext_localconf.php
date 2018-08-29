<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin
	($_EXTKEY, 'Products', array(
		#'Product' => 'list',
		'Product' => 'single,mobil',
		'Category' => 'list',
		'Attribute' => 'list',
	)
);

Tx_Extbase_Utility_Extension::configurePlugin
	($_EXTKEY, 'Categories', array(
		'Category' => 'list, mobil'
	)
);

Tx_Extbase_Utility_Extension::configurePlugin
	($_EXTKEY, 'Filter', array(
		'Filter' => 'show, list'
	));
	
Tx_Extbase_Utility_Extension::configurePlugin
	($_EXTKEY, 'Applications', array(
		'Application' => 'single, mobil'
	)
);

Tx_Extbase_Utility_Extension::configurePlugin
	($_EXTKEY, 'Menu', array(
		'Menu' => 'show, mobil'
	)
);

Tx_Extbase_Utility_Extension::configurePlugin
	($_EXTKEY, 'MenuImage', array(
		'MenuImage' => 'show'
	)
);

Tx_Extbase_Utility_Extension::configurePlugin
	($_EXTKEY, 'SmartMenu', array(
		'SmartMenu' => 'show'
	)
);

$GLOBALS['T3_VAR']['ext']['dynaflex']['tx_rathgeberproducts_domain_model_product'][] = 'EXT:rathgeber_products/Resources/Public/Scripts/class.tx_rathgeberproducts_flexAttributes.php:tx_rathgeberproducts_flexAttributes';

// die ("wuaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaah");
?>