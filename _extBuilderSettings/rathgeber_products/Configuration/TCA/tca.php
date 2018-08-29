<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

// Tx_Extbase_Utility_Debugger::var_dump ($GLOBALS['T3_VAR']['ext']['dynaflex'],"requeast");
$TCA['tx_rathgeberproducts_domain_model_product'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_product']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, flexdata'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_product']['feInterface'],
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, type, variante, name, headline, titletag, metatitle, metadescription, metakeywords, appdescription, realurl, description,
		--div--;LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.slideshowvideo,  --palette--;;2, thumbsheadline, --palette--;;3;;2-2-2, --palette--;;4,
		--div--;LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.relations, categories, keywords,
		--div--;LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.techspec, material, forms, printing, size, strength, colour, fixation, temperature, delivery, resistance, pcolour, frequency, surfacerefinement, certification, identification, productname, dimension, imprint, metal, flexdata,
		--div--;LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.technologies, technologies,
		--div--;LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.verarbeitung, verarbeitung,
		--div--;LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.downloads,  --palette--;;5,
		--div--;LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.specials,  catchphraseslong
		')),
		//--div--;LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.relations, categories, attributes,
	'palettes' => array(
		'1' => array('showitem' => ''),
		'2' => Array(
			'showitem' => 'images,imagecaption,thumbnails',
			"canNotCollapse" => 1
		),
		'3' => Array(
			'showitem' => 'video,videocaption',
			"canNotCollapse" => 1
		),
		'4' => Array(
			'showitem' => 'catpreview,short',
			"canNotCollapse" => 1
		),
		'5' => Array(
			'showitem' => 'uploadedpdf,uploadedpdfname',
			"canNotCollapse" => 1
		)
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_product',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_product.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_product.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.description',
			'defaultExtras' => 'richtext[*]',
			'config' => array(
				'type' => 'text',
				// 'eval' => 'required',
				'rows' => '5',
				'cols' => 48,
				'wizards' => array(
					'_PADDING' => 4,
					'RTE' => array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php'
					)
				)
			)
		),
        'realurl' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.realurl',
            'config' => array(
                'type' => 'input',
                'size' => '100',
                'max' => '100',
                'eval' => 'trim',
            )
        ),
		'appdescription' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.appdescription',
			'config' => array(
				'type' => 'text',
				'cols' => '50',
				'rows' => '3',
			)
		),
		'categories' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_category.title',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_category',
				'MM' => 'tx_rathgeberproducts_product_category_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),
		'keywords' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.keywords',
			'config' => array(
				'type' => 'text',
				'cols' => '50',
				'rows' => '3',
			)
		),
		'attributes' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.title',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_attribute',
				'MM' => 'tx_rathgeberproducts_product_attribute_mm',
				'MM_opposite_field' => 'products',
				// 'MM_opposite_field' => 'attributes',
				// 'MM_opposite_field' => 'categories',
			)
		),
		'type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.type',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array(
						'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product',
						'0'
					),
					array(
						'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_application',
						'1'
					),
					array(
						'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_variante',
						'2'
					),
				),
				'size' => 1,
				'maxitems' => 1,
				// 'eval' => 'required'
			)
		),
		'headline' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.headline',
			'config' => array(
				'type' => 'input',
				'size' => '60',
				'max' => '60',
				'eval' => 'trim',
			)
		),

        'titletag' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.titletag',
            'config' => array(
                'type' => 'input',
                'size' => '60',
                'max' => '60',
                'eval' => 'trim',
            )
        ),
		
		'metatitle' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.metatitle',
			'config' => array(
				'type' => 'input',
				'size' => '60',
				'max' => '60',
				'eval' => 'trim',
			)
		),

        'metadescription' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.metadescription',
            'config' => array(
                'type' => 'input',
                'size' => '220',
                'max' => '220',
                'eval' => 'trim',
            )
        ),

        'metakeywords' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.metakeywords',
            'config' => array(
                'type' => 'input',
                'size' => '100',
                'max' => '100',
                'eval' => 'trim',
            )
        ),

		'technologies' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_category.description',
			'defaultExtras' => 'richtext[*]',
			'config' => array(
				'type' => 'text',
				// 'eval' => 'required',
				'rows' => '5',
				'cols' => 48,
				'wizards' => array(
					'_PADDING' => 4,
					'RTE' => array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php'
					)
				)
			)
		),
		'images' => Array(
			'exclude' => 1,
			'l10n_mode' => $l10n_mode_image,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.images',
			'config' => Array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => '10000',
				'uploadfolder' => 'uploads/slideshow/pics',
				'show_thumbs' => '1',
				'size' => 3,
				'autoSizeMax' => 15,
				'maxitems' => '99',
				'minitems' => '0'
			)
		),
		'imagecaption' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.imagecaption',
			'l10n_mode' => $l10n_mode,
			'config' => Array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '3'
			)
		),
		'thumbsheadline' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.thumbsheadline',
			'config' => array(
				'type' => 'input',
				'size' => '200',
				'max' => '200',
				'eval' => 'trim',
			)
		),
		'variante' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.variante',
			'config' => array(
				'type' => 'select',
				'items' => array( array(
						'',
						'0'
					), ),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_product',
				'foreign_table_where' => ' AND tx_rathgeberproducts_domain_model_product.type = 0',
				'size' => 1,
				'maxitems' => 1,
				'eval' => 'trim',
			)
		),
		'video' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.video',
			'l10n_mode' => $l10n_mode,
			'config' => Array(
				'type' => 'text',
				'cols' => '20',
				'rows' => '3'
			)
		),
		'videocaption' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.videocaption',
			'l10n_mode' => $l10n_mode,
			'config' => Array(
				'type' => 'text',
				'cols' => '80',
				'rows' => '3'
			)
		),
		'thumbnails' => Array(
			'exclude' => 1,
			'l10n_mode' => $l10n_mode_image,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.thumbnails',
			'config' => Array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => '10000',
				'uploadfolder' => 'uploads/slideshow/pics',
				'show_thumbs' => '1',
				'size' => 3,
				'autoSizeMax' => 15,
				'maxitems' => '99',
				'minitems' => '0'
			)
		),
		'catpreview' => Array(
			'exclude' => 1,
			'l10n_mode' => $l10n_mode_image,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.catpreview',
			'config' => Array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => '10000',
				'uploadfolder' => 'uploads/products/pics',
				'show_thumbs' => '1',
				'size' => 3,
				'autoSizeMax' => 15,
				'maxitems' => '1',
				'minitems' => '0'
			)
		),
		'short' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.short',
			'config' => array(
				'type' => 'input',
				'size' => '100',
				'max' => '100',
				'eval' => 'trim',
			)
		),
		'verarbeitung' => array(
			'exclude' => 1,
			'label' => 'Beschreibung',
			'defaultExtras' => 'richtext[*]',
			'config' => array(
				'type' => 'text',
				// 'eval' => 'required',
				'rows' => '5',
				'cols' => 48,
				'wizards' => array(
					'_PADDING' => 4,
					'RTE' => array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php'
					)
				)
			)
		),
		'uploadedpdf' => Array(
			'exclude' => 1,
			'l10n_mode' => $l10n_mode_image,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.uploadedpdf',
			'config' => Array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => '10000',
				'uploadfolder' => 'uploads/products/pdfs',
				'show_thumbs' => '1',
				'size' => 3,
				'autoSizeMax' => 15,
				'maxitems' => '99',
				'minitems' => '0'
			)
		),
		'uploadedpdfname' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.uploadedpdfname',
			'l10n_mode' => $l10n_mode,
			'config' => Array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '3'
			)
		),
		'catchphraseslong' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.catchphraseslong',
			'config' => array(
				'type' => 'text',
				// 'eval' => 'required',
				'rows' => '8',
				'cols' => '40',
			)
		),
		/*************************************************************************************************************************/
		'material' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.material',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_material',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_material.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_material_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),
		'forms' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.forms',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_forms',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_forms.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_forms_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),
		'printing' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.printing',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_printing',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_printing.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_printing_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),
		'size' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.size',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_size',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_size.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_size_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),
		'strength' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.strength',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_strength',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_strength.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_strength_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),
		'colour' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.colour',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_colour',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_colour.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_colour_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),
		'fixation' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.fixation',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_fixation',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_fixation.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_fixation_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),
		'temperature' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.temperature',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_temperature',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_temperature.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_temperature_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),
		'delivery' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.delivery',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_delivery',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_delivery.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_delivery_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),		
		'resistance' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.resistance',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_resistance',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_resistance.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_resistance_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),	
		'pcolour' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.pcolour',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_pcolour',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_pcolour.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_pcolour_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),		
		/*************************************************************************************************************************/
		
		'frequency' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.frequency',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_frequency',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_frequency.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_frequency_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),
		
		'surfacerefinement' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.surfacerefinement',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_surfacerefinement',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_surfacerefinement.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_surfacerefinement_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),

		'certification' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.certification',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_certification',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_certification.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_certification_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),

		'identification' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.identification',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_identification',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_identification.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_identification_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),
		
		'productname' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.productname',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_productname',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_productname.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_productname_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),

		'dimension' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.dimension',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_dimension',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_dimension.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_dimension_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),		
	
		'imprint' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.imprint',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_imprint',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_imprint.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_imprint_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),		
							
		'metal' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.metal',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_metal',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_metal.pid = ###PAGE_TSCONFIG_ID###',
				'MM' => 'tx_rathgeberproducts_product_metal_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),		
		/*************************************************************************************************************************/
		'flexdata' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.attribsel',
			'config' => array(
				'type' => 'flex',
				'ds' => array (
					'default' => '<T3DataStructure>' .
							'	<meta>' .
							'		<langDisable>1</langDisable>' .
							'	</meta>
									<ROOT>' .
							'		<type>array</type>' .
							'		<el>' .
							'		' .
							'		</el>' .
							'	</ROOT>'.
							'</T3DataStructure>'
				),

			),
		),
	
	)
);

$TCA['tx_rathgeberproducts_domain_model_category'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_category']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden',
	),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_category']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_category',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_category.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_category.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
        'startpage' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_category.startpage',
            'config' => array(
                'type' => 'check',
                'default' => '1'
            )
        ),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_category.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		
		'metatitle' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_category.metatitle',
			'config' => array(
				'type' => 'input',
				'size' => '60',
				'max' => '60',
				'eval' => 'trim',
			)
		),
        'titletag' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_category.titletag',
            'config' => array(
                'type' => 'input',
                'size' => '60',
                'max' => '60',
                'eval' => 'trim',
            )
        ),

        'metadescription' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_category.metadescription',
            'config' => array(
                'type' => 'input',
                'size' => '220',
                'max' => '220',
                'eval' => 'trim',
            )
        ),

        'metakeywords' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_category.metakeywords',
            'config' => array(
                'type' => 'input',
                'size' => '100',
                'max' => '100',
                'eval' => 'trim',
            )
        ),
		
		'image' => Array(
			'exclude' => 1,
			'l10n_mode' => $l10n_mode_image,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_category.image',
			'config' => Array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => '10000',
				'uploadfolder' => 'uploads/products/pics',
				'show_thumbs' => '1',
				'size' => 3,
				'autoSizeMax' => 15,
				'maxitems' => '99',
				'minitems' => '0'
			)
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_category.description',
			'defaultExtras' => 'richtext[*]',
			'config' => array(
				'type' => 'text',
				// 'eval' => 'required',
				'rows' => '5',
				'cols' => 48,
				'wizards' => array(
					'_PADDING' => 4,
					'RTE' => array(
						'notNewRecords' => 1,
						'RTEonly' => 1,
						'type' => 'script',
						'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
						'icon' => 'wizard_rte2.gif',
						'script' => 'wizard_rte.php'
					)
				)
			)
		),
		'short' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_category.short',
			'config' => array(
				'type' => 'input',
				'size' => '100',
				'max' => '100',
				'eval' => 'trim',
			)
		),
		'cattype' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_category.cattype',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array(
                        'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product',
                        '0'
                    ),
                    array(
                        'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_application',
                        '1'
                    ),
                    array(
                        'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_productnfc',
                        '2'
                    ),
                    array(
                        'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_applicationnfc',
                        '3'
                    ),
				),
				'size' => 1,
				'maxitems' => 1,
				// 'eval' => 'required'
			)
		),
	),
	// 'types' => array('0' => array('showitem' => 'hidden;;1;;1-1-1, cattype, name, short, description, image')),
	// 'types' => array('0' => array('showitem' => 'hidden;;1;;1-1-1, cattype, name, short, description')),
		'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, startpage, cattype, name, titletag, metatitle, metadescription, metakeywords, image, description')),
	'palettes' => array('1' => array('showitem' => ''))
);

$TCA['tx_rathgeberproducts_domain_model_attribute'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_attribute']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_attribute',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_attribute.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_attribute.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),

		'rateable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.rateable',
			'config' => array('type' => 'check', )
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),
	),
	'types' => array('0' => array('showitem' => 'hidden;;1;;1-1-1, name, rateable')),
	'palettes' => array('1' => array('showitem' => ''))
);

$TCA['tx_rathgeberproducts_domain_model_application'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_application']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_application']['feInterface'],
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, headline, titletag, metatitle, metadescription, metakeywords, description, thumbsheadline, appsheadline,
		--div--;LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.slideshow,  --palette--;;2, --palette--;;3;;2-2-2,  
		--div--;LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.relations, categories, --palette--;;4;;2-2-2 
		')),
	'palettes' => array(
		'1' => array('showitem' => ''),
		'2' => Array(
			'showitem' => 'images,imagecaption',
			"canNotCollapse" => 1
		),
		'3' => Array(
			'showitem' => 'catpreview,short',
			"canNotCollapse" => 1
		),
		'4' => Array(
			'showitem' => 'products,thumbnails',
			"canNotCollapse" => 1
		),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_application',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_application.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_application.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),

		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
        'titletag' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.titletag',
            'config' => array(
                'type' => 'input',
                'size' => '60',
                'max' => '60',
                'eval' => 'trim',
            )
        ),

        'metatitle' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.metatitle',
            'config' => array(
                'type' => 'input',
                'size' => '60',
                'max' => '60',
                'eval' => 'trim',
            )
        ),

        'metadescription' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.metadescription',
            'config' => array(
                'type' => 'input',
                'size' => '220',
                'max' => '220',
                'eval' => 'trim',
            )
        ),

        'metakeywords' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.metakeywords',
            'config' => array(
                'type' => 'input',
                'size' => '100',
                'max' => '100',
                'eval' => 'trim',
            )
        ),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.description',
            'defaultExtras' => 'richtext[*]',
			'config' => array(
				'type' => 'text',
				'cols' => '50',
				'rows' => '3',
                'wizards' => array(
                    '_PADDING' => 4,
                    'RTE' => array(
                        'notNewRecords' => 1,
                        'RTEonly' => 1,
                        'type' => 'script',
                        'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
                        'icon' => 'wizard_rte2.gif',
                        'script' => 'wizard_rte.php'
                    )
                )

			)
		),
		'images' => Array(
			'exclude' => 1,
			'l10n_mode' => $l10n_mode_image,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.images',
			'config' => Array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => '10000',
				'uploadfolder' => 'uploads/slideshow/pics',
				'show_thumbs' => '1',
				'size' => 3,
				'autoSizeMax' => 15,
				'maxitems' => '99',
				'minitems' => '0'
			)
		),
		'imagecaption' => Array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.imagecaption',
			'l10n_mode' => $l10n_mode,
			'config' => Array(
				'type' => 'text',
				'cols' => '30',
				'rows' => '3'
			)
		),

		'products' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.title',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 1,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_product',
				'MM' => 'tx_rathgeberproducts_application_product_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'products',
			)
		),

		'catpreview' => Array(
			'exclude' => 1,
			'l10n_mode' => $l10n_mode_image,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.catpreview',
			'config' => Array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => '10000',
				'uploadfolder' => 'uploads/products/pics',
				'show_thumbs' => '1',
				'size' => 3,
				'autoSizeMax' => 15,
				'maxitems' => '1',
				'minitems' => '0'
			)
		),
		'short' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.short',
			'config' => array(
				'type' => 'input',
				'size' => '100',
				'max' => '100',
				'eval' => 'trim',
			)
		),
		'categories' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_category.title',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'maxitems' => 99,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_table' => 'tx_rathgeberproducts_domain_model_category',
				'MM' => 'tx_rathgeberproducts_application_category_mm',
				// 'MM_opposite_field' => 'categories',
				'MM_opposite_field' => 'application',
			)
		),
		'thumbsheadline' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.thumbsheadline',
			'config' => array(
				'type' => 'input',
				'size' => '200',
				'max' => '200',
				'eval' => 'trim',
			)
		),
		'appsheadline' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.appsheadline',
			'config' => array(
				'type' => 'input',
				'size' => '80',
				'max' => '80',
				'eval' => 'trim',
			)
		),
		'thumbnails' => Array(
			'exclude' => 1,
			'l10n_mode' => $l10n_mode_image,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_product.thumbnails',
			'config' => Array(
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size' => '10000',
				'uploadfolder' => 'uploads/slideshow/pics',
				'show_thumbs' => '1',
				'size' => 3,
				'autoSizeMax' => 15,
				'maxitems' => '99',
				'minitems' => '0'
			)
		),
	)
);

/*********************************************************************************************************************************/

$TCA['tx_rathgeberproducts_domain_model_forms'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_forms']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_forms',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_forms.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_forms.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_forms.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),		
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);

$TCA['tx_rathgeberproducts_domain_model_colour'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_colour']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_colour',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_colour.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_colour.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_colour.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),			
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);

$TCA['tx_rathgeberproducts_domain_model_material'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_material']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_material',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_material.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_material.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_material.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),			
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);

$TCA['tx_rathgeberproducts_domain_model_printing'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_printing']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_printing',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_printing.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_printing.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_printing.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),			
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);

$TCA['tx_rathgeberproducts_domain_model_size'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_size']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_size',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_size.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_size.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_size.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),			
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);

$TCA['tx_rathgeberproducts_domain_model_strength'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_strength']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_strength',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_strength.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_strength.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_strength.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),		
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);


$TCA['tx_rathgeberproducts_domain_model_fixation'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_fixation']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_fixation',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_fixation.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_fixation.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_fixation.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),		
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);

$TCA['tx_rathgeberproducts_domain_model_temperature'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_temperature']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_temperature',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_temperature.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_temperature.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_temperature.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),		
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);

$TCA['tx_rathgeberproducts_domain_model_delivery'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_delivery']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_delivery',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_delivery.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_delivery.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_delivery.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),		
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);


$TCA['tx_rathgeberproducts_domain_model_resistance'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_resistance']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_resistance',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_resistance.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_resistance.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_resistance.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),		
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);


$TCA['tx_rathgeberproducts_domain_model_pcolour'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_pcolour']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_pcolour',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_pcolour.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_pcolour.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_pcolour.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),		
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);

$TCA['tx_rathgeberproducts_domain_model_surfacerefinement'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_surfacerefinement']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_surfacerefinement',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_surfacerefinement.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_surfacerefinement.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_surfacerefinement.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),		
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);


$TCA['tx_rathgeberproducts_domain_model_certification'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_certification']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_certification',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_certification.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_certification.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_certification.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),		
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);


$TCA['tx_rathgeberproducts_domain_model_identification'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_identification']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_identification',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_identification.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_identification.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_identification.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),		
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);


$TCA['tx_rathgeberproducts_domain_model_productname'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_productname']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_productname',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_productname.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_productname.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_productname.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),		
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);

/*********************************************************************************************************************************/
/* smart-TEC-Attrib */
/*********************************************************************************************************************************/

$TCA['tx_rathgeberproducts_domain_model_frequency'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_frequency']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_frequency',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_frequency.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_frequency.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_frequency.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),		
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);


$TCA['tx_rathgeberproducts_domain_model_dimension'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_dimension']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_dimension',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_dimension.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_dimension.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_dimension.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),		
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);


$TCA['tx_rathgeberproducts_domain_model_imprint'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_imprint']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_imprint',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_imprint.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_imprint.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_imprint.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),		
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);


$TCA['tx_rathgeberproducts_domain_model_metal'] = array(
	'ctrl' => $TCA['tx_rathgeberproducts_domain_model_metal']['ctrl'],
	'interface' => array('showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden'),
	'feInterface' => $TCA['tx_rathgeberproducts_domain_model_attribute']['feInterface'],
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_rathgeberproducts_domain_model_metal',
				'foreign_table_where' => 'AND tx_rathgeberproducts_domain_model_metal.pid=###CURRENT_PID### AND tx_rathgeberproducts_domain_model_metal.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_metal.name',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'max' => '50',
				'eval' => 'trim',
			)
		),
		'filterable' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:rathgeber_products/Resources/Private/Language/locallang_db.xml:tx_rathgeberproducts_domain_model_attribute.filterable',
			'config' => array('type' => 'check', )
		),		
	),
	'types' => array('0' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, filterable')),
	'palettes' => array('1' => array('showitem' => ''))
);


?>