SELECT DISTINCT
  veranstalter,
  ort
FROM TC_Erfolge
ORDER BY veranstalter;

UPDATE TC_Erfolge
SET veranstalter = NULL
WHERE veranstalter = '';
UPDATE TC_Erfolge
SET ort = NULL
WHERE ort = '' OR ort = '-';
UPDATE TC_Erfolge
SET veranstalter = REPLACE(veranstalter, 'e. V.', 'e.V.');
UPDATE TC_Erfolge
SET veranstalter = REPLACE(veranstalter, 'e. v.', 'e.V.');
UPDATE TC_Erfolge
SET veranstalter = REPLACE(veranstalter, 'e.v.', 'e.V.');
UPDATE TC_Erfolge
SET veranstalter = '1. TC Ludwigsburg e.V.', ort = 'Ludwigsburg'
WHERE veranstalter IN ('1. TC Ludwigsburg e.V.', '1. TC Ludwigsburg', 'Ludwigsburg', '1. TC', '1.TC Ludwigsburg');
UPDATE TC_Erfolge
SET veranstalter = 'TSC Villingen-Schwenningen e.V.'
WHERE veranstalter IN
      ('TSC Villingen-Schwenningen e.V.', ' TSC Villingen-Schwenningen e.V.',
       'TSC Villingen-Schwenningen', 'TSC Villiingen-Schwenningen e. V.', 'TSC Villingen Schwenningen e.V.');
UPDATE TC_Erfolge
SET veranstalter = 'TSC Unterschleißheim e.V.'
WHERE veranstalter IN ('TSC Unterschleißheim e.V.', 'TSC Unterschleissheim e.V.', 'TSC Unterschleißheim');
UPDATE TC_Erfolge
SET veranstalter = '1. TC Heidenheim d. SV Mergelstetten'
WHERE
  veranstalter IN ('1. TC Heidenheim d. SV Mergelstetten', '1. TC Heidenheim', '1. TC Heidenheim d. SV Mergelstetten');
UPDATE TC_Erfolge
SET veranstalter = '1. TSC Schwarz-Rot Herrenberg e.V.', ort = 'Herrenberg-Gültstein'
WHERE veranstalter IN ('1. TSC Schwarz-Rot Herrenberg e.V.', '1. TSC Schwarz-Rot');
UPDATE TC_Erfolge
SET veranstalter = '1. TC Weiß-Blau d. TSV 1880 Neu-Ulm'
WHERE veranstalter IN ('1. TC Weiß-Blau d. TSV 1880 Neu-Ulm', '1.TC Weiß-Blau d. TSV 1880 Neu-Ulm');
UPDATE TC_Erfolge
SET veranstalter = '1. TSC Enzklösterle'
WHERE veranstalter IN ('1. TSC Enzklösterle', '1.TSC Enzklösterle');
UPDATE TC_Erfolge
SET veranstalter = '1. TSC Kirchheim unter Teck e.V.', ort = 'Kirchheim unter Teck'
WHERE veranstalter IN
      ('1. TSC Kirchheim unter Teck e.V.', '1. Tanzsportclub Kirchheim unter Teck e.V.', '1.TSC Kirchheim u. Teck');
UPDATE TC_Erfolge
SET veranstalter = '1. TSC Wernigerode e.V.'
WHERE veranstalter IN ('1. TSC Wernigerode e.V.', '1. Tanzsportclub Wernigerode e. V.');
UPDATE TC_Erfolge
SET veranstalter = 'ATC Graf Zeppelin'
WHERE veranstalter IN ('ATC Graf Zeppelin', 'ATC  Graf Zeppelin');
UPDATE TC_Erfolge
SET veranstalter = 'ATC Blau-Gold Heilbronn d. TSG 1845 Heilbronn e.V.'
WHERE veranstalter IN ('ATC Blau-Gold Heilbronn d. TSG 1845 Heilbronn e.V.', 'ATC Blau-Gold Heilbronn',
                       'ATC Blau-Gold Heilbronn e.V.', 'ATC Blau-Gold in der TSG 1845', 'ATC Blau-Gold in der TSG 1845 Heilbronn e. V.',
                       'ATC Blau-Gold in der TSG 1845 Heilbronn e.V.', 'ATC Blau-Gold in der TSG 1846 Heilbronn e. V.',
                       'ATC Blaub-Gold Heilbronn');
UPDATE TC_Erfolge
SET veranstalter = 'ATC „Graf Zeppelin“ Friedrichshafen e.V.'
WHERE veranstalter IN ('ATC „Graf Zeppelin“ Friedrichshafen e.V.', 'ATC Graf Zeppelin',
                       'ATC Graf Zeppelin Friedrichshafen', 'ATC Graf Zeppelin Friedrichshafen e. V.');
UPDATE TC_Erfolge
SET veranstalter = 'ATK Suebia Stuttgart e.V.'
WHERE veranstalter IN ('ATK Suebia Stuttgart e.V.', 'ATK Suebia Stuttgart',
                       'ATK Suebia', 'Amateurtanzklub Suebia', 'Suebia Stuttgart e.V.');
UPDATE TC_Erfolge
SET veranstalter = 'Blaues Band der Spree'
WHERE veranstalter IN ('Blaues Band der Spree', 'Blaue Band an der Spree',
                       'Blaues Band', 'Blaues Band Berlin');
UPDATE TC_Erfolge
SET veranstalter = 'Casino Club Cannstatt e.V.'
WHERE veranstalter IN ('Casino Club Cannstatt e.V.', 'Casino Club Canstatt');
UPDATE TC_Erfolge
SET veranstalter = 'Boston Club e.V. Düsseldorf'
WHERE veranstalter IN ('Boston Club e.V. Düsseldorf', 'Boston-Club e. V. Düsseldorf');
UPDATE TC_Erfolge
SET veranstalter = 'danceComp Wuppertal'
WHERE veranstalter IN ('danceComp Wuppertal', 'dance Comp', 'danceComp');
UPDATE TC_Erfolge
SET veranstalter = 'Gelb-Schwarz-Casino München e.V.'
WHERE veranstalter IN ('Gelb-Schwarz-Casino München e.V.', 'Gelb-Schwarz-Casino München e. V.');
UPDATE TC_Erfolge
SET veranstalter = 'GOC-Gesellschafter', ort = 'Stuttgart'
WHERE veranstalter IN ('GOC-Gesellschafter', 'GOC', 'GOC 2005', 'Stuttgart/GOC-Gesellschafter')
      OR (veranstalter = 'Stuttgart' AND ort = 'GOC');
UPDATE TC_Erfolge
SET veranstalter = 'Grün-Gold-Club Bremen e.V.'
WHERE veranstalter IN ('Grün-Gold-Club Bremen e.V.', 'Grün-Goldclub e.V.');
UPDATE TC_Erfolge
SET veranstalter = 'TSV Grün-Gold Erfurt e.V.'
WHERE veranstalter IN ('TSV Grün-Gold Erfurt e.V.', 'Grün Gold Erfurt');
UPDATE TC_Erfolge
SET veranstalter = 'Grün-Gold d. Turngemeinde in Berlin 1848 e.V.'
WHERE
  veranstalter IN ('Grün-Gold d. Turngemeinde in Berlin 1848 e.V.', 'Grün-Gold der Turngemeinde in Berlin 1848 e.V.');
UPDATE TC_Erfolge
SET veranstalter = 'hessen tanzt', ort = 'Frankfurt/Main'
WHERE veranstalter IN ('hessen tanzt');
UPDATE TC_Erfolge
SET veranstalter = 'Hessischer Tanzsportverband'
WHERE veranstalter IN ('Hessischer Tanzsportverband', 'Hessischer Tanzsportverband (HTV)', 'HTV');
UPDATE TC_Erfolge
SET veranstalter = 'Schwarz-Silber e.V.'
WHERE veranstalter IN ('Schwarz-Silber e.V.', 'Schwarz-Silber Frankfurt');
UPDATE TC_Erfolge
SET veranstalter = 'Turnierserie Leistungsstarke 66'
WHERE veranstalter IN ('Turnierserie Leistungsstarke 66', 'Leistungsstarke 66', 'LS 66');
UPDATE TC_Erfolge
SET veranstalter = 'Oberbayerische Pfingstturniere', ort = 'Unterschleißheim'
WHERE
  veranstalter IN ('Oberbayerische Pfingstturniere', 'Oberbayrische Pfingstturniere', 'Oberbayerisches Pfingstturnier');
UPDATE TC_Erfolge
SET veranstalter = 'Open de Paris', ort = 'Paris'
WHERE veranstalter IN ('Open de Paris', 'Paris Dance Open');
UPDATE TC_Erfolge
SET veranstalter = 'Schwarz-Weiß-Club Pforzheim e.V.'
WHERE veranstalter IN ('Schwarz-Weiß-Club Pforzheim e.V.', 'Schwarz- Weiß Club', 'Schwarz-Weiss Pforzheim',
                       'Schwarz-Weiss-Club Pforzheim e.v.', 'Schwarz- Weiß-Club Pforzheim e.V.', 'Schwarz-Weiß Club');
UPDATE TC_Erfolge
SET veranstalter = 'Schwarz-Weiß-Club Esslingen e.V.', ort = 'Esslingen-Berkheim'
WHERE veranstalter IN
      ('Schwarz-Weiß-Club Esslingen e.V.', 'Schwarz-Weiß-Club e. V., Esslingen', 'Schwarz-Weiß-Club e. V.Esslingen',
       'Schwarz-Weiss-Club e.V. Esslingen', 'TSA Schwarz- Weiß-Club TSA d.SV 1845', 'TSA Schwarz-Weiß-Club TSA d.SV 1845',
       'TSA Schwarz-Weiß-Club d.SV 1845 Esslingen', 'TSA d. SV 1845 Esslingen', 'TSA der Sportvereinigung 1845 Esslingen e.V.');
UPDATE TC_Erfolge
SET veranstalter = 'TSC Staufer-Residenz Waiblingen e.V.'
WHERE veranstalter IN ('TSC Staufer-Residenz Waiblingen e.V.', 'Staufer Residenz e.V.', 'Staufer Residenz Waiblingen');
UPDATE TC_Erfolge
SET veranstalter = 'Step by Step Oberhausen e.V.'
WHERE veranstalter IN ('Step by Step Oberhausen e.V.', 'Step by Step Oberhausen e. V.');
UPDATE TC_Erfolge
SET veranstalter = 'Styrian Open - Steirischer Tanzsportverband'
WHERE veranstalter IN ('Styrian Open - Steirischer Tanzsportverband', 'Styrian DanceSPort-Federation');
UPDATE TC_Erfolge
SET veranstalter = 'Tanzclub Staufen Göppingen e.V.', ort = 'Göppingen'
WHERE veranstalter IN ('Tanzclub Staufen Göppingen e.V.', 'Tanzclub Staufen Goeppingen e.V.');
UPDATE TC_Erfolge
SET veranstalter = 'Tanzsport-Club Baden-Baden e.V.', ort = 'Baden-Baden'
WHERE veranstalter IN ('Tanzsport-Club Baden-Baden e.V.', 'Tanzsport-Club', 'Tanzsport-Club Baden-Baden e. V.');
UPDATE TC_Erfolge
SET veranstalter = 'TC Schwarz-Weiß Reutlingen e.V.'
WHERE
  veranstalter IN ('TC Schwarz-Weiß Reutlingen e.V.', 'TC Schwarz- Weiß', 'TC Schwarz-Weiß', 'TC Schwarz-Weiss e.V.');
UPDATE TC_Erfolge
SET veranstalter = 'Tanzsportclub Ludwigshafen Rot-Gold e.V.'
WHERE veranstalter IN ('Tanzsportclub Ludwigshafen Rot-Gold e.V.', 'Tanzsport-Club Ludwigshafen');
UPDATE TC_Erfolge
SET veranstalter = 'Tanzsport-Zentrum Mosbach e.V.'
WHERE veranstalter IN ('Tanzsport-Zentrum Mosbach e.V.', 'Tanzsport-Zentum Mosbach e.V.');
UPDATE TC_Erfolge
SET veranstalter = 'Tanzsportakademie Ludwigsburg e.V.'
WHERE veranstalter IN ('Tanzsportakademie Ludwigsburg e.V.', 'Tanzsportakademie Ludwigsburg');
UPDATE TC_Erfolge
SET veranstalter = 'TC Rot-Gold Würzburg e.V.'
WHERE veranstalter IN ('TC Rot-Gold Würzburg e.V.', 'TC Rot-Gold', 'TC Rot-Gold Würzburg', 'TSC Rot-Gold Würzburg');
UPDATE TC_Erfolge
SET veranstalter = 'TC Rot-Weiß Schwäbisch Gmünd e.V.'
WHERE veranstalter IN
      ('TC Rot-Weiß Schwäbisch Gmünd e.V.', 'TC Rot-Weiss Schwäbisch Gmünd e.V.', 'TC Rot-Weiß Schwäbisch Gemünd e.V.');

-- ORTE KORRIGIEREN --

UPDATE TC_Erfolge
SET ort = 'Friedrichshafen-Ettenkirch'
WHERE ort IN ('Friedrichshafen-Ettenkirch', 'Friedrichshafen-Ettkirch', 'Ettenkirch');
UPDATE TC_Erfolge
SET ort = 'Stuttgart-Botnang'
WHERE ort IN ('Stuttgart-Botnang', 'Botnang', 'S-Botnang');
UPDATE TC_Erfolge
SET ort = 'Bruckmühl'
WHERE ort IN ('Bruckmühl', 'BruckmÃ¼hl');
UPDATE TC_Erfolge
SET ort = 'Kopenhagen'
WHERE ort IN ('Kopenhagen', 'Copenhagen');
UPDATE TC_Erfolge
SET ort = 'Frankfurt/Main'
WHERE ort IN ('Frankfurt/Main', 'Frankfurt');
UPDATE TC_Erfolge
SET ort = 'Pforzheim'
WHERE ort IN ('Pforzheim', 'Pforzhem');

-- LEERE VERANSTALTER --

UPDATE TC_Erfolge
SET ort = 'Berlin', veranstalter = NULL
WHERE (ort IS NULL OR ort = 'Berlin') AND veranstalter = 'Berlin';
UPDATE TC_Erfolge
SET ort = 'Baden-Baden', veranstalter = NULL
WHERE (ort IS NULL OR ort = 'Baden-Baden') AND veranstalter = 'Baden-Baden';
UPDATE TC_Erfolge
SET ort = 'Bad Homburg', veranstalter = NULL
WHERE (ort IS NULL OR ort = 'Bad Homburg') AND veranstalter = 'Bad Homburg';
UPDATE TC_Erfolge
SET ort = 'Achern', veranstalter = NULL
WHERE (ort IS NULL OR ort = 'Achern') AND veranstalter = 'Achern';
UPDATE TC_Erfolge
SET ort = 'Dortmund', veranstalter = NULL
WHERE (ort IS NULL OR ort = 'Dortmund') AND veranstalter = 'Dortmund';
UPDATE TC_Erfolge
SET ort = 'Düsseldorf', veranstalter = NULL
WHERE (ort IS NULL OR ort = 'Düsseldorf') AND veranstalter = 'Düsseldorf';
UPDATE TC_Erfolge
SET ort = 'Fürth', veranstalter = NULL
WHERE (ort IS NULL OR ort = 'Fürth') AND veranstalter = 'Fürth';
UPDATE TC_Erfolge
SET ort = 'Hamburg', veranstalter = NULL
WHERE (ort IS NULL OR ort = 'Hamburg') AND veranstalter = 'Hamburg';
UPDATE TC_Erfolge
SET veranstalter = NULL
WHERE ort = veranstalter;




