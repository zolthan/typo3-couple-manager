#
# Table structure for table 'tx_couplemanager_domain_model_couple'
#
CREATE TABLE tx_couplemanager_domain_model_couple (

  uid                     INT(11)                          NOT NULL AUTO_INCREMENT,
  pid                     INT(11) DEFAULT '0'              NOT NULL,

  result                  INT(11) UNSIGNED DEFAULT '0'     NOT NULL,

  man_last_name           VARCHAR(255) DEFAULT ''          NOT NULL,
  man_first_name          VARCHAR(255) DEFAULT ''          NOT NULL,
  woman_last_name         VARCHAR(255) DEFAULT ''          NOT NULL,
  woman_first_name        VARCHAR(255) DEFAULT ''          NOT NULL,
  starting_group          VARCHAR(5) DEFAULT '0'           NOT NULL,
  starting_class_latin    VARCHAR(2) DEFAULT '0'           NOT NULL,
  starting_class_standard VARCHAR(2) DEFAULT '0'           NOT NULL,
  description             TEXT,
  image                   INT(11) UNSIGNED                 NOT NULL DEFAULT '0',
  active_couple           SMALLINT(5) UNSIGNED DEFAULT '0' NOT NULL,

  tstamp                  INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  crdate                  INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  cruser_id               INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  deleted                 SMALLINT(5) UNSIGNED DEFAULT '0' NOT NULL,
  hidden                  SMALLINT(5) UNSIGNED DEFAULT '0' NOT NULL,
  starttime               INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  endtime                 INT(11) UNSIGNED DEFAULT '0'     NOT NULL,

  t3ver_oid               INT(11) DEFAULT '0'              NOT NULL,
  t3ver_id                INT(11) DEFAULT '0'              NOT NULL,
  t3ver_wsid              INT(11) DEFAULT '0'              NOT NULL,
  t3ver_label             VARCHAR(255) DEFAULT ''          NOT NULL,
  t3ver_state             SMALLINT(6) DEFAULT '0'          NOT NULL,
  t3ver_stage             INT(11) DEFAULT '0'              NOT NULL,
  t3ver_count             INT(11) DEFAULT '0'              NOT NULL,
  t3ver_tstamp            INT(11) DEFAULT '0'              NOT NULL,
  t3ver_move_id           INT(11) DEFAULT '0'              NOT NULL,

  sys_language_uid        INT(11) DEFAULT '0'              NOT NULL,
  l10n_parent             INT(11) DEFAULT '0'              NOT NULL,
  l10n_diffsource         MEDIUMBLOB,
  l10n_state              TEXT,

  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid, t3ver_wsid),
  KEY language (l10n_parent, sys_language_uid)

);

#
# Table structure for table 'tx_couplemanager_domain_model_competition'
#
CREATE TABLE tx_couplemanager_domain_model_competition (

  uid              INT(11)                          NOT NULL AUTO_INCREMENT,
  pid              INT(11) DEFAULT '0'              NOT NULL,

  result           INT(11) UNSIGNED DEFAULT '0'     NOT NULL,

  title            VARCHAR(255) DEFAULT ''          NOT NULL,
  date_start       DATE                                      DEFAULT '0000-00-00',
  date_end         DATE                                      DEFAULT '0000-00-00',
  country          INT(11) DEFAULT '0'              NOT NULL,
  city             VARCHAR(255) DEFAULT ''          NOT NULL,
  address          TEXT,
  organizer        VARCHAR(255) DEFAULT ''          NOT NULL,
  size_dance_floor VARCHAR(255) DEFAULT ''          NOT NULL,

  tstamp           INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  crdate           INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  cruser_id        INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  deleted          SMALLINT(5) UNSIGNED DEFAULT '0' NOT NULL,
  hidden           SMALLINT(5) UNSIGNED DEFAULT '0' NOT NULL,
  starttime        INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  endtime          INT(11) UNSIGNED DEFAULT '0'     NOT NULL,

  t3ver_oid        INT(11) DEFAULT '0'              NOT NULL,
  t3ver_id         INT(11) DEFAULT '0'              NOT NULL,
  t3ver_wsid       INT(11) DEFAULT '0'              NOT NULL,
  t3ver_label      VARCHAR(255) DEFAULT ''          NOT NULL,
  t3ver_state      SMALLINT(6) DEFAULT '0'          NOT NULL,
  t3ver_stage      INT(11) DEFAULT '0'              NOT NULL,
  t3ver_count      INT(11) DEFAULT '0'              NOT NULL,
  t3ver_tstamp     INT(11) DEFAULT '0'              NOT NULL,
  t3ver_move_id    INT(11) DEFAULT '0'              NOT NULL,

  sys_language_uid INT(11) DEFAULT '0'              NOT NULL,
  l10n_parent      INT(11) DEFAULT '0'              NOT NULL,
  l10n_diffsource  MEDIUMBLOB,
  l10n_state       TEXT,

  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid, t3ver_wsid),
  KEY language (l10n_parent, sys_language_uid)

);

#
# Table structure for table 'tx_couplemanager_domain_model_result'
#
CREATE TABLE tx_couplemanager_domain_model_result (

  uid               INT(11)                          NOT NULL AUTO_INCREMENT,
  pid               INT(11) DEFAULT '0'              NOT NULL,

  couple            INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  competition       INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  competition_type  INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  date              DATE                                      DEFAULT '0000-00-00',
  starting_group    VARCHAR(5) DEFAULT '0'           NOT NULL,
  starting_class    VARCHAR(2) DEFAULT '0'           NOT NULL,
  discipline        VARCHAR(20) DEFAULT '0'          NOT NULL,
  position          INT(11) DEFAULT '0'              NOT NULL,
  participant_count INT(11) DEFAULT '0'              NOT NULL,
  promotion         SMALLINT(5) UNSIGNED DEFAULT '0' NOT NULL,

  tstamp            INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  crdate            INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  cruser_id         INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  deleted           SMALLINT(5) UNSIGNED DEFAULT '0' NOT NULL,
  hidden            SMALLINT(5) UNSIGNED DEFAULT '0' NOT NULL,
  starttime         INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  endtime           INT(11) UNSIGNED DEFAULT '0'     NOT NULL,

  t3ver_oid         INT(11) DEFAULT '0'              NOT NULL,
  t3ver_id          INT(11) DEFAULT '0'              NOT NULL,
  t3ver_wsid        INT(11) DEFAULT '0'              NOT NULL,
  t3ver_label       VARCHAR(255) DEFAULT ''          NOT NULL,
  t3ver_state       SMALLINT(6) DEFAULT '0'          NOT NULL,
  t3ver_stage       INT(11) DEFAULT '0'              NOT NULL,
  t3ver_count       INT(11) DEFAULT '0'              NOT NULL,
  t3ver_tstamp      INT(11) DEFAULT '0'              NOT NULL,
  t3ver_move_id     INT(11) DEFAULT '0'              NOT NULL,

  sys_language_uid  INT(11) DEFAULT '0'              NOT NULL,
  l10n_parent       INT(11) DEFAULT '0'              NOT NULL,
  l10n_diffsource   MEDIUMBLOB,
  l10n_state        TEXT,

  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid, t3ver_wsid),
  KEY language (l10n_parent, sys_language_uid)

);

#
# Table structure for table 'tx_couplemanager_domain_model_competitiontype'
#
CREATE TABLE tx_couplemanager_domain_model_competitiontype (

  uid              INT(11)                          NOT NULL AUTO_INCREMENT,
  pid              INT(11) DEFAULT '0'              NOT NULL,

  result           INT(11) UNSIGNED DEFAULT '0'     NOT NULL,

  name             VARCHAR(255) DEFAULT ''          NOT NULL,
  organization     VARCHAR(255) DEFAULT ''          NOT NULL,

  tstamp           INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  crdate           INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  cruser_id        INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  deleted          SMALLINT(5) UNSIGNED DEFAULT '0' NOT NULL,
  hidden           SMALLINT(5) UNSIGNED DEFAULT '0' NOT NULL,
  starttime        INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  endtime          INT(11) UNSIGNED DEFAULT '0'     NOT NULL,

  t3ver_oid        INT(11) DEFAULT '0'              NOT NULL,
  t3ver_id         INT(11) DEFAULT '0'              NOT NULL,
  t3ver_wsid       INT(11) DEFAULT '0'              NOT NULL,
  t3ver_label      VARCHAR(255) DEFAULT ''          NOT NULL,
  t3ver_state      SMALLINT(6) DEFAULT '0'          NOT NULL,
  t3ver_stage      INT(11) DEFAULT '0'              NOT NULL,
  t3ver_count      INT(11) DEFAULT '0'              NOT NULL,
  t3ver_tstamp     INT(11) DEFAULT '0'              NOT NULL,
  t3ver_move_id    INT(11) DEFAULT '0'              NOT NULL,

  sys_language_uid INT(11) DEFAULT '0'              NOT NULL,
  l10n_parent      INT(11) DEFAULT '0'              NOT NULL,
  l10n_diffsource  MEDIUMBLOB,
  l10n_state       TEXT,

  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid, t3ver_wsid),
  KEY language (l10n_parent, sys_language_uid)

);

#
# Table structure for table 'tx_couplemanager_domain_model_competitiontype'
#
CREATE TABLE tx_couplemanager_domain_model_organizer (

  uid              INT(11)                          NOT NULL AUTO_INCREMENT,
  pid              INT(11) DEFAULT '0'              NOT NULL,

  name             VARCHAR(255) DEFAULT ''          NOT NULL,
  city             VARCHAR(255) DEFAULT ''          NOT NULL,
  zn_country_uid   INT(11) DEFAULT '0'              NOT NULL,

  tstamp           INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  crdate           INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  cruser_id        INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  deleted          SMALLINT(5) UNSIGNED DEFAULT '0' NOT NULL,
  hidden           SMALLINT(5) UNSIGNED DEFAULT '0' NOT NULL,
  starttime        INT(11) UNSIGNED DEFAULT '0'     NOT NULL,
  endtime          INT(11) UNSIGNED DEFAULT '0'     NOT NULL,

  t3ver_oid        INT(11) DEFAULT '0'              NOT NULL,
  t3ver_id         INT(11) DEFAULT '0'              NOT NULL,
  t3ver_wsid       INT(11) DEFAULT '0'              NOT NULL,
  t3ver_label      VARCHAR(255) DEFAULT ''          NOT NULL,
  t3ver_state      SMALLINT(6) DEFAULT '0'          NOT NULL,
  t3ver_stage      INT(11) DEFAULT '0'              NOT NULL,
  t3ver_count      INT(11) DEFAULT '0'              NOT NULL,
  t3ver_tstamp     INT(11) DEFAULT '0'              NOT NULL,
  t3ver_move_id    INT(11) DEFAULT '0'              NOT NULL,

  sys_language_uid INT(11) DEFAULT '0'              NOT NULL,
  l10n_parent      INT(11) DEFAULT '0'              NOT NULL,
  l10n_diffsource  MEDIUMBLOB,
  l10n_state       TEXT,

  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid, t3ver_wsid),
  KEY language (l10n_parent, sys_language_uid)
);
