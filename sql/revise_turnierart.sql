SELECT DISTINCT
  veranstalter,
  turnierart
FROM TC_Erfolge
ORDER BY turnierart;

UPDATE TC_Erfolge
SET turnierart = NULL
WHERE turnierart = '';
UPDATE TC_Erfolge
SET turnierart = 'Offen'
WHERE turnierart IN ('offen', 'Offen', '0ffen', 'Offrn');
UPDATE TC_Erfolge
SET turnierart = 'Deutschlandpokal'
WHERE turnierart IN ('D-Pokal', 'Deutschlandpokal', 'DP');
UPDATE TC_Erfolge
SET turnierart = 'Deutsche Meisterschaft'
WHERE turnierart IN ('Deutsche Meisterschaft', 'DM');
UPDATE TC_Erfolge
SET turnierart = 'Landesmeisterschaft'
WHERE turnierart IN ('Landesmeisterschaft', 'LM');
UPDATE TC_Erfolge
SET turnierart = 'Weltmeisterschaft'
WHERE turnierart IN ('Weltmeisterschaft', 'WM');
UPDATE TC_Erfolge
SET turnierart = 'Ranglistenturnier'
WHERE turnierart IN ('Ranglistenturnier', 'RL', 'Rangliste');
UPDATE TC_Erfolge
SET turnierart = 'Ranglistenturnier (DTV)'
WHERE turnierart IN ('Ranglistenturnier (DTV)', 'DTV Ranglistenturnier', 'DTV-RL');
UPDATE TC_Erfolge
SET turnierart = 'Ranglistenturnier (WDSF / DTV)'
WHERE turnierart IN ('Ranglistenturnier (WDSF / DTV)', 'WDSF, DTV-RL', 'WDSF / DTV-RL', 'WDSF/DTV-RL');
UPDATE TC_Erfolge
SET turnierart = 'Einladungsturnier'
WHERE turnierart IN ('Einladungsturnier', 'Einladung');
UPDATE TC_Erfolge
SET turnierart = 'Turnierserie Goldene 55'
WHERE turnierart IN ('Turnierserie Goldene 55', 'Gold 55', 'Gold. 55');
UPDATE TC_Erfolge
SET turnierart = 'Turnierserie Goldene 55 - Endturnier'
WHERE turnierart IN ('Turnierserie Goldene 55 - Endturnier');
UPDATE TC_Erfolge
SET turnierart = 'Turnierserie Leistungsstarke 66'
WHERE turnierart IN
      ('Turnierserie Leistungsstarke 66', 'Turnierserie Leistungsstarke 66 S-Klasse', 'LS 66', 'LS66', 'LSt66 S STD', 'Leist. 66', 'Leistungsstarke 66')
      OR veranstalter IN
         ('Turnierserie Leistungsstarke 66', 'Turnierserie Leistungsstarke 66 S-Klasse', 'LS 66', 'LS66', 'LSt66 S STD', 'Leist. 66', 'Leistungsstarke 66');
UPDATE TC_Erfolge
SET turnierart = 'Turnierserie Leistungsstarke 66 - Endturnier'
WHERE turnierart IN ('Turnierserie Leistungsstarke 66 - Endturnier', 'LS 66-Endt.', 'LS66 / Endturnier');
UPDATE TC_Erfolge
SET turnierart = 'Rising Stars (WDSF)'
WHERE
  turnierart IN ('Rising Stars (WDSF)', 'WDSF / Rising Stars', 'WDSF/Rising Star', 'WDSF/RisingStar', 'Rising Star');
