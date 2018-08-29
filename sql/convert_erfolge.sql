-- INSERT INTO tx_couplemanager_domain_model_result (pid, tstamp, crdate, cruser_id, couple, competition, competition_type, `date`, starting_group, starting_class, discipline, position, participant_count, promotion)
SELECT
  *,
  137,
  unix_timestamp(),
  unix_timestamp(),
  1,
  2,
  NULL,
  NULL,
  NULL,
  STR_TO_DATE(datum, '%d.%m.%Y'),
  'sen3',
  CASE
  WHEN startklasse LIKE "% s %" THEN "s"
  WHEN startklasse LIKE "% a %" THEN "a"
  WHEN startklasse LIKE "%s/a%" THEN "s"
  END AS starting_class,
  IF(startklasse LIKE '%st%', 'standard', 'latein'),
  platz,
  anzahlpaare,
  0
FROM TC_Erfolge
WHERE name LIKE '%kuchenb%';