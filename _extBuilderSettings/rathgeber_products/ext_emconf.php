<?php

########################################################################
# Extension Manager/Repository config file for ext "rathgeber_products".
#
# Auto generated 19-03-2013 08:37
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'RATHGEBER Products',
	'description' => 'Product Management',
	'category' => 'plugin',
	'author' => 'Marc Becker | 7thSENSE',
	'author_email' => 'marc.becker@7thsense.de',
	'shy' => '',
	'dependencies' => 'fluid,extbase',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '0.0.1',
	'constraints' => array(
		'depends' => array(
			'fluid' => '1.4.1-0.0.0',
			'extbase' => '1.4.3-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:82:{s:9:"ChangeLog";s:4:"45c4";s:12:"ext_icon.gif";s:4:"5da8";s:17:"ext_localconf.php";s:4:"0bde";s:22:"ext_tables - Kopie.sql";s:4:"d1a3";s:14:"ext_tables.php";s:4:"efcf";s:14:"ext_tables.sql";s:4:"1f6d";s:24:"Classes/dynaflexRath.php";s:4:"186b";s:44:"Classes/Controller/ApplicationController.php";s:4:"a01b";s:42:"Classes/Controller/AttributeController.php";s:4:"7b51";s:41:"Classes/Controller/CategoryController.php";s:4:"5b60";s:39:"Classes/Controller/FilterController.php";s:4:"fe8b";s:37:"Classes/Controller/MenuController.php";s:4:"5ca9";s:42:"Classes/Controller/MenuImageController.php";s:4:"140c";s:40:"Classes/Controller/ProductController.php";s:4:"e81b";s:42:"Classes/Controller/SmartMenuController.php";s:4:"47f6";s:36:"Classes/Domain/Model/Application.php";s:4:"6e72";s:34:"Classes/Domain/Model/Attribute.php";s:4:"667a";s:33:"Classes/Domain/Model/Category.php";s:4:"506a";s:31:"Classes/Domain/Model/Colour.php";s:4:"7d9e";s:33:"Classes/Domain/Model/Delivery.php";s:4:"0f5a";s:34:"Classes/Domain/Model/Dimension.php";s:4:"f9d0";s:31:"Classes/Domain/Model/Filter.php";s:4:"8851";s:33:"Classes/Domain/Model/Fixation.php";s:4:"8ca9";s:30:"Classes/Domain/Model/Forms.php";s:4:"f88c";s:34:"Classes/Domain/Model/Frequency.php";s:4:"c705";s:32:"Classes/Domain/Model/Imprint.php";s:4:"1b07";s:33:"Classes/Domain/Model/Material.php";s:4:"475f";s:30:"Classes/Domain/Model/Metal.php";s:4:"dad7";s:32:"Classes/Domain/Model/Pcolour.php";s:4:"019f";s:33:"Classes/Domain/Model/Printing.php";s:4:"2f24";s:32:"Classes/Domain/Model/Product.php";s:4:"e25e";s:35:"Classes/Domain/Model/Resistance.php";s:4:"4030";s:29:"Classes/Domain/Model/Size.php";s:4:"b262";s:33:"Classes/Domain/Model/Strength.php";s:4:"65c7";s:36:"Classes/Domain/Model/Temperature.php";s:4:"4b1b";s:51:"Classes/Domain/Repository/ApplicationRepository.php";s:4:"5ac9";s:49:"Classes/Domain/Repository/AttributeRepository.php";s:4:"4a63";s:48:"Classes/Domain/Repository/CategoryRepository.php";s:4:"4354";s:46:"Classes/Domain/Repository/ColourRepository.php";s:4:"0835";s:48:"Classes/Domain/Repository/DeliveryRepository.php";s:4:"33e0";s:49:"Classes/Domain/Repository/DimensionRepository.php";s:4:"915b";s:48:"Classes/Domain/Repository/FixationRepository.php";s:4:"dede";s:45:"Classes/Domain/Repository/FormsRepository.php";s:4:"40dd";s:49:"Classes/Domain/Repository/FrequencyRepository.php";s:4:"faa4";s:47:"Classes/Domain/Repository/ImprintRepository.php";s:4:"66d1";s:48:"Classes/Domain/Repository/MaterialRepository.php";s:4:"3184";s:45:"Classes/Domain/Repository/MetalRepository.php";s:4:"ca46";s:47:"Classes/Domain/Repository/PcolourRepository.php";s:4:"50d6";s:48:"Classes/Domain/Repository/PrintingRepository.php";s:4:"22ff";s:47:"Classes/Domain/Repository/ProductRepository.php";s:4:"00f4";s:50:"Classes/Domain/Repository/ResistanceRepository.php";s:4:"a4f1";s:44:"Classes/Domain/Repository/SizeRepository.php";s:4:"3324";s:48:"Classes/Domain/Repository/StrengthRepository.php";s:4:"8eac";s:51:"Classes/Domain/Repository/TemperatureRepository.php";s:4:"346a";s:49:"Configuration/FlexForms/flexform_applications.xml";s:4:"995e";s:47:"Configuration/FlexForms/flexform_categories.xml";s:4:"54dc";s:43:"Configuration/FlexForms/flexform_filter.xml";s:4:"8d7f";s:41:"Configuration/FlexForms/flexform_menu.xml";s:4:"b657";s:46:"Configuration/FlexForms/flexform_menuimage.xml";s:4:"d3e1";s:45:"Configuration/FlexForms/flexform_products.xml";s:4:"e678";s:25:"Configuration/TCA/tca.php";s:4:"0d0f";s:38:"Configuration/TypoScript/constants.txt";s:4:"d41d";s:34:"Configuration/TypoScript/setup.txt";s:4:"d41d";s:40:"Resources/Private/Language/locallang.xml";s:4:"1bf5";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"cbaa";s:46:"Resources/Private/Language/locallang_fluid.xml";s:4:"7952";s:37:"Resources/Private/Language/testo3.xml";s:4:"d41d";s:51:"Resources/Private/Templates/Application/Single.html";s:4:"bcf4";s:46:"Resources/Private/Templates/Category/List.html";s:4:"8b96";s:44:"Resources/Private/Templates/Filter/List.html";s:4:"b140";s:44:"Resources/Private/Templates/Filter/Show.html";s:4:"6d95";s:42:"Resources/Private/Templates/Menu/Show.html";s:4:"e7a4";s:47:"Resources/Private/Templates/MenuImage/Show.html";s:4:"c0f6";s:47:"Resources/Private/Templates/Product/Single.html";s:4:"25e8";s:47:"Resources/Private/Templates/SmartMenu/Show.html";s:4:"d981";s:64:"Resources/Public/Icons/icon_tx_rathgeberproducts_application.gif";s:4:"019d";s:62:"Resources/Public/Icons/icon_tx_rathgeberproducts_attribute.gif";s:4:"7234";s:61:"Resources/Public/Icons/icon_tx_rathgeberproducts_category.gif";s:4:"fc60";s:56:"Resources/Public/Icons/icon_tx_rathgeberproducts_div.gif";s:4:"065c";s:61:"Resources/Public/Icons/icon_tx_rathgeberproducts_products.gif";s:4:"e303";s:70:"Resources/Public/Scripts/class.tx_rathgeberproducts_flexAttributes.php";s:4:"8814";s:37:"Resources/Public/Scripts/slideshow.js";s:4:"580e";}',
	'suggests' => array(
	),
);

?>