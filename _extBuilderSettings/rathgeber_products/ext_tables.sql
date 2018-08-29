#
# Table structure for table 'tx_rathgeberproducts_domain_model_product'
#
CREATE TABLE tx_rathgeberproducts_domain_model_product (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,	
	
	name varchar(50) DEFAULT '' NOT NULL,
	type tinyint(4) DEFAULT '0' NOT NULL,
	categories int(11) DEFAULT '0' NOT NULL,
	attributes int(11) DEFAULT '0' NOT NULL,
	description text  NOT NULL,
	appdescription text NOT NULL,
	keywords text NOT NULL,
	technologies text  NOT NULL,
	headline varchar(60) DEFAULT '' NOT NULL,
	titletag varchar(120) DEFAULT '' NOT NULL,
	metatitle varchar(60) DEFAULT '' NOT NULL,
	metadescription varchar(220) DEFAULT '' NOT NULL,
	metakeywords varchar(100) DEFAULT '' NOT NULL,
	realurl varchar(100) DEFAULT '' NOT NULL,
	images text NOT NULL,
	imagecaption text NOT NULL,
	imagealttext text NOT NULL,
	imagetitletext text NOT NULL,
	thumbnails text NOT NULL,
  	thumbsheadline varchar(200) DEFAULT '' NOT NULL,
  	
	video text NOT NULL,
  	videocaption text NOT NULL,
  	
  	variante int(11) DEFAULT '0' NOT NULL,
  	catpreview text NOT NULL,
  	short varchar(100) DEFAULT '' NOT NULL,
  	verarbeitung text  NOT NULL,
  	
  	uploadedpdf text NOT NULL,
	uploadedpdfname text NOT NULL,
	
	flexdata text NOT NULL,
	
	catchphraseslong text NOT NULL,
	
	forms int(11) DEFAULT '0' NOT NULL,
	material int(11) DEFAULT '0' NOT NULL,
	colour int(11) DEFAULT '0' NOT NULL,
	size int(11) DEFAULT '0' NOT NULL,
	strength int(11) DEFAULT '0' NOT NULL,
	printing int(11) DEFAULT '0' NOT NULL,
	fixation int(11) DEFAULT '0' NOT NULL,
	temperature int(11) DEFAULT '0' NOT NULL,
	delivery int(11) DEFAULT '0' NOT NULL,
	resistance int(11) DEFAULT '0' NOT NULL,
	pcolour int(11) DEFAULT '0' NOT NULL,
	frequency int(11) DEFAULT '0' NOT NULL,
	surfacerefinement int(11) DEFAULT '0' NOT NULL,
	certification int(11) DEFAULT '0' NOT NULL,
	identification int(11) DEFAULT '0' NOT NULL,
	productname int(11) DEFAULT '0' NOT NULL,
	dimension int(11) DEFAULT '0' NOT NULL,
	imprint int(11) DEFAULT '0' NOT NULL,
	metal int(11) DEFAULT '0' NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;

#
# Table structure for table 'tx_rathgeberproducts_domain_model_category'
#
CREATE TABLE tx_rathgeberproducts_domain_model_category (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,	

	name varchar(50) DEFAULT '' NOT NULL,
	titletag varchar(60) DEFAULT '' NOT NULL,
	metatitle varchar(60) DEFAULT '' NOT NULL,
	metadescription varchar(220) DEFAULT '' NOT NULL,
	metakeywords varchar(100) DEFAULT '' NOT NULL,
	description text  NOT NULL,
	image varchar(50) DEFAULT '' NOT NULL,
	short varchar(100) DEFAULT '' NOT NULL,
	cattype tinyint(4) DEFAULT '0' NOT NULL,
	startpage tinyint(4) DEFAULT '1' NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Attribute'
#
CREATE TABLE tx_rathgeberproducts_domain_model_attribute (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,	
	
	rateable tinyint(1) DEFAULT '0' NOT NULL,
	filterable tinyint(1) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;

#
# Table structure for table 'tx_rathgeberproducts_domain_model_application'
#
CREATE TABLE tx_rathgeberproducts_domain_model_application (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,	
	
	name varchar(50) DEFAULT '' NOT NULL,
	products int(11) DEFAULT '0' NOT NULL,
	titletag varchar(60) DEFAULT '' NOT NULL,
	metatitle varchar(60) DEFAULT '' NOT NULL,
	metadescription varchar(220) DEFAULT '' NOT NULL,
	metakeywords varchar(100) DEFAULT '' NOT NULL,
	description text  NOT NULL,
	images text NOT NULL,
	imagecaption text NOT NULL,
	catpreview text NOT NULL,
	short varchar(100) DEFAULT '' NOT NULL,
	categories int(11) DEFAULT '0' NOT NULL,
	thumbsheadline varchar(200) DEFAULT '' NOT NULL,
	appsheadline varchar(80) DEFAULT '' NOT NULL,
	thumbnails text NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;




#
# Table structure for table 'Tx_RathgeberProducts_Product_Category_MM'
#
CREATE TABLE tx_rathgeberproducts_product_category_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Application_Category_MM'
#
CREATE TABLE tx_rathgeberproducts_application_category_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Product_Attribute_MM'
#
CREATE TABLE tx_rathgeberproducts_product_attribute_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	tablenames varchar(30) DEFAULT '' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Application_Product_MM'
#
CREATE TABLE tx_rathgeberproducts_application_product_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;


#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Forms'
#
CREATE TABLE tx_rathgeberproducts_domain_model_forms (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,
	filterable tinyint(1) DEFAULT '0' NOT NULL,	

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Colour'
#
CREATE TABLE tx_rathgeberproducts_domain_model_colour (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,	

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Printing'
#
CREATE TABLE tx_rathgeberproducts_domain_model_printing (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,	

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Material'
#
CREATE TABLE tx_rathgeberproducts_domain_model_material (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,	

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	
	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Size'
#
CREATE TABLE tx_rathgeberproducts_domain_model_size (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,	

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
		
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Strength'
#
CREATE TABLE tx_rathgeberproducts_domain_model_strength (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,	

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
		
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Fixation'
#
CREATE TABLE tx_rathgeberproducts_domain_model_fixation (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,
	
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
		
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Temperature'
#
CREATE TABLE tx_rathgeberproducts_domain_model_temperature (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,	

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
		
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Delivery'
#
CREATE TABLE tx_rathgeberproducts_domain_model_delivery (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,	

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
		
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Resistance'
#
CREATE TABLE tx_rathgeberproducts_domain_model_resistance (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,	

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
		
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Pcolour'
#
CREATE TABLE tx_rathgeberproducts_domain_model_pcolour (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,	

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
		
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;


#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Frequency'
#
CREATE TABLE tx_rathgeberproducts_domain_model_frequency (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,
	
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
		
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;


#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_SurfaceRefinement'
#
CREATE TABLE tx_rathgeberproducts_domain_model_surfacerefinement (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,
	
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
		
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;


#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Certification'
#
CREATE TABLE tx_rathgeberproducts_domain_model_certification (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,
	
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
		
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;


#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Identification'
#
CREATE TABLE tx_rathgeberproducts_domain_model_identification (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,
	
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
		
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;


#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Productname'
#
CREATE TABLE tx_rathgeberproducts_domain_model_productname (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,
	
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
		
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;


#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Dimension'
#
CREATE TABLE tx_rathgeberproducts_domain_model_dimension (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,
	
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
		
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;



#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Imprint'
#
CREATE TABLE tx_rathgeberproducts_domain_model_imprint (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,
	
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
		
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;


#
# Table structure for table 'Tx_RathgeberProducts_Domain_Model_Metal'
#
CREATE TABLE tx_rathgeberproducts_domain_model_metal (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	name varchar(50) DEFAULT '' NOT NULL,	
	filterable tinyint(1) DEFAULT '0' NOT NULL,
	
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
		
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Product_Colour_MM'
#
CREATE TABLE tx_rathgeberproducts_product_colour_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;


#
# Table structure for table 'Tx_RathgeberProducts_Product_Forms_MM'
#
CREATE TABLE tx_rathgeberproducts_product_forms_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;


#
# Table structure for table 'Tx_RathgeberProducts_Product_Printing_MM'
#
CREATE TABLE tx_rathgeberproducts_product_printing_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;


#
# Table structure for table 'Tx_RathgeberProducts_Product_Material_MM'
#
CREATE TABLE tx_rathgeberproducts_product_material_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;


#
# Table structure for table 'Tx_RathgeberProducts_Product_Size_MM'
#
CREATE TABLE tx_rathgeberproducts_product_size_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;


#
# Table structure for table 'Tx_RathgeberProducts_Product_Strength_MM'
#
CREATE TABLE tx_rathgeberproducts_product_strength_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Product_Fixation_MM'
#
CREATE TABLE tx_rathgeberproducts_product_fixation_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Product_Temperature_MM'
#
CREATE TABLE tx_rathgeberproducts_product_temperature_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Product_Delivery_MM'
#
CREATE TABLE tx_rathgeberproducts_product_delivery_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Product_Resistance_MM'
#
CREATE TABLE tx_rathgeberproducts_product_resistance_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Product_Pcolour_MM'
#
CREATE TABLE tx_rathgeberproducts_product_pcolour_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Product_Frequency_MM'
#
CREATE TABLE tx_rathgeberproducts_product_frequency_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Product_SurfaceRefinement_MM'
#
CREATE TABLE tx_rathgeberproducts_product_surfacerefinement_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;


#
# Table structure for table 'Tx_RathgeberProducts_Product_Certification_MM'
#
CREATE TABLE tx_rathgeberproducts_product_certification_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;


#
# Table structure for table 'Tx_RathgeberProducts_Product_Identification_MM'
#
CREATE TABLE tx_rathgeberproducts_product_identification_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Product_Productname_MM'
#
CREATE TABLE tx_rathgeberproducts_product_productname_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Product_Dimension_MM'
#
CREATE TABLE tx_rathgeberproducts_product_dimension_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Product_Imprint_MM'
#
CREATE TABLE tx_rathgeberproducts_product_imprint_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;

#
# Table structure for table 'Tx_RathgeberProducts_Product_Metal_MM'
#
CREATE TABLE tx_rathgeberproducts_product_metal_mm (
	uid int(11) NOT NULL auto_increment,
	pid int(11)  DEFAULT '0' NOT NULL,
	uid_local int(11) DEFAULT '0'  NOT NULL,
	uid_foreign int(11) DEFAULT '0' NOT NULL,
  	sorting int(11) DEFAULT '0' NOT NULL,
	sorting_foreign int(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
) ENGINE=InnoDB;