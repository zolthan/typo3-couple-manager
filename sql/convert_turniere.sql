SELECT
  MIN(STR_TO_DATE(datum, '%d.%m.%Y')) AS start_date,
  MAX(STR_TO_DATE(datum, '%d.%m.%Y')) AS end_date,
  ort,
  turnierart,
  veranstalter
FROM TC_Erfolge
WHERE turnierart != ''
      AND veranstalter != ''
GROUP BY ort, turnierart, veranstalter;

