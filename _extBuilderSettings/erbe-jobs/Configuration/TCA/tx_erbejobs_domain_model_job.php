<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:erbe_jobs/Resources/Private/Language/locallang_db.xlf:tx_erbejobs_domain_model_job',
		'label' => 'job_id',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => '',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('erbe_jobs') . 'Resources/Public/Icons/tx_erbejobs_domain_model_job.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, job_id, ini, area_of_expertise, site, headline, tasks, profile, benefits, closing_text, link, pub_date, ',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1,
		             --div--;LLL:EXT:erbe_jobs/Resources/Private/Language/locallang_db.xlf:tx_erbejobs_domain_model_job.persis,
					title, job_id, ini, area_of_expertise, site, headline, tasks, profile, benefits, closing_text, link, pub_date,
					--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime
		'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_erbejobs_domain_model_job',
				'foreign_table_where' => 'AND tx_erbejobs_domain_model_job.pid=###CURRENT_PID### AND tx_erbejobs_domain_model_job.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:erbe_jobs/Resources/Private/Language/locallang_db.xlf:tx_erbejobs_domain_model_job.title',
			'config' => array(
				'type' => 'input',
				'size' => 40,
				'eval' => 'trim,required'
			),
		),
		'job_id' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:erbe_jobs/Resources/Private/Language/locallang_db.xlf:tx_erbejobs_domain_model_job.jobId',
			'config' => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required'
			),
		),
		'ini' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:erbe_jobs/Resources/Private/Language/locallang_db.xlf:tx_erbejobs_domain_model_job.ini',
			'config' => array(
				'type' => 'input',
				'size' => 5,
				'eval' => 'trim'
			),
		),
		'area_of_expertise' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:erbe_jobs/Resources/Private/Language/locallang_db.xlf:tx_erbejobs_domain_model_job.areaOfExpertise',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'site' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:erbe_jobs/Resources/Private/Language/locallang_db.xlf:tx_erbejobs_domain_model_job.site',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'trim'
			),
		),
		'headline' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:erbe_jobs/Resources/Private/Language/locallang_db.xlf:tx_erbejobs_domain_model_job.headline',
			'config' => array(
				'type' => 'input',
				'size' => 50,
				'eval' => 'trim'
			),
		),
		'tasks' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:erbe_jobs/Resources/Private/Language/locallang_db.xlf:tx_erbejobs_domain_model_job.tasks',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim',
			),
			'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
		),
		'profile' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:erbe_jobs/Resources/Private/Language/locallang_db.xlf:tx_erbejobs_domain_model_job.profile',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim',
			),
			'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
		),
		'benefits' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:erbe_jobs/Resources/Private/Language/locallang_db.xlf:tx_erbejobs_domain_model_job.benefits',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim',
			),
			'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
		),
		'closing_text' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:erbe_jobs/Resources/Private/Language/locallang_db.xlf:tx_erbejobs_domain_model_job.closingText',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim',
			),
			'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
		),
		'link' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:erbe_jobs/Resources/Private/Language/locallang_db.xlf:tx_erbejobs_domain_model_job.link',
			'config' => array(
				'type' => 'input',
				'size' => 60,
				'eval' => 'trim'
			),
		),
		'pub_date' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:erbe_jobs/Resources/Private/Language/locallang_db.xlf:tx_erbejobs_domain_model_job.pubDate',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'scope_of_training' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:erbe_jobs/Resources/Private/Language/locallang_db.xlf:tx_erbejobs_domain_model_job.scope_of_training',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim',
			),
			'defaultExtras' => 'richtext:rte_transform[mode=ts_css]'
		),
	),
);