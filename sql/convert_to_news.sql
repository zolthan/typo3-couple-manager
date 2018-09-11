CREATE FUNCTION `strip_tags`($str TEXT)
  RETURNS TEXT
  BEGIN
    DECLARE $start, $end INT DEFAULT 1;
    LOOP
      SET $start = LOCATE("<", $str, $start);
      IF (!$start)
      THEN RETURN $str; END IF;
      SET $end = LOCATE(">", $str, $start);
      IF (!$end)
      THEN SET $end = $start; END IF;
      SET $str = INSERT($str, $start, $end - $start + 1, "");
    END LOOP;
  END;

DELETE FROM d02b2c81.pages_OLD
WHERE pid NOT IN (35, 3672, 3182, 2742, 2412, 1772, 1391, 862, 482, 201, 184, 183, 182);
DELETE FROM d02b2c81.tt_content_OLD
WHERE pid NOT IN (SELECT uid
                  FROM d02b2c81.pages_OLD) OR deleted = 1 OR hidden = 1;

DELETE FROM d02b2c81.tx_news_domain_model_news
WHERE pid = 163;

INSERT INTO d02b2c81.tx_news_domain_model_news (uid, pid, tstamp, crdate, cruser_id, title, bodytext, datetime, archive, import_id, import_source)
  SELECT
    -- uid
    NULL                                                               AS uid,
    -- pid
    163                                                                AS pid,
    -- tstamp
    p.tstamp,
    -- crdate
    p.crdate,
    -- cruser_id
    1                                                                  AS cruser_id,
    /*
    -- t3ver_oid
    0,
    -- t3ver_id
    0,
    -- t3ver_wsid
    0,
    -- t3ver_label
    '',
    -- t3ver_state
    0,
    -- t3ver_stage
    0,
    -- t3ver_count
    0,
    -- t3ver_tstamp
    0,
    -- t3ver_move_id
    0,
    -- t3_origuid
    0,
    -- editlock
    0,
    -- sys_language_uid
    0,
    -- l10n_parent
    0,
    -- l10n_diffsource
    'a:1:{s:5:"title";N;}',
    -- deleted
    0,
    -- hidden
    0,
    -- starttime
    0,
    -- endtime
    0,
    -- sorting
    0,
    -- fe_group
    '',
    */
    -- title
    IF(c.header <> '', c.header, substring(p.title FROM 4))            AS title,
    -- teaser
    -- '',
    -- bodytext
    strip_tags(c.bodytext)                                             AS bodytext,
    -- datetime
    p.crdate                                                           AS datetime,
    -- archive
    unix_timestamp(DATE_ADD(from_unixtime(p.crdate), INTERVAL 1 YEAR)) AS archive,
    /*
    -- author
    '',
    -- author_email
    '',
    -- categories
    -- related
    -- related_from
    -- related_files
    -- fal_related_files
    -- related_links
    -- type
    -- keywords
    -- description
    -- tags
    -- media
    -- fal_media
    -- internalurl
    -- externalurl
    -- istopnews
    -- content_elements
    -- path_segment
    -- alternative_title
    -- notes
    */
    -- import_id
    CONCAT('pid-', p.uid)                                              AS import_id,
    -- import_source
    CONCAT('uid-', c.uid)                                              AS import_source
  -- l10n_state
  -- ,c.*
  -- ,p.*
  FROM d02b2c81.pages_OLD p
    INNER JOIN d02b2c81.tt_content_OLD c
      ON p.uid = c.pid
  WHERE p.pid IN (35, 3672, 3182, 2742, 2412, 1772, 1391, 862, 482, 201, 184, 183, 182)
        AND p.deleted = 0
        AND p.hidden = 0
        AND c.deleted = 0
        AND c.hidden = 0
  ORDER BY p.uid DESC;

SELECT *
FROM d02b2c81.tt_content_OLD
WHERE length(image) < 5 AND image <> '';

UPDATE d02b2c81.tt_content_OLD c1
SET image = (SELECT GROUP_CONCAT(name)
             FROM d02b2c81.sys_file_reference_OLD sfr
               INNER JOIN d02b2c81.sys_file__OLD sf
                 ON sfr.uid_local = sf.uid AND sfr.deleted = 0
             WHERE sfr.uid_foreign = c1.uid
             GROUP BY sfr.uid_foreign)
WHERE length(c1.image) < 5;