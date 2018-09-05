SELECT veranstalter, ort, count(*)
FROM TC_Erfolge
GROUP BY veranstalter, ort
ORDER BY veranstalter;

UPDATE TC_Erfolge SET veranstalter = NULL WHERE veranstalter = '';
UPDATE TC_Erfolge SET veranstalter = REPLACE(veranstalter, 'e. V.', 'e.V.');
UPDATE TC_Erfolge SET veranstalter = REPLACE(veranstalter, 'e. v.', 'e.V.');
UPDATE TC_Erfolge SET veranstalter = REPLACE(veranstalter, 'e.v.', 'e.V.');

UPDATE TC_Erfolge SET veranstalter = '1. TC Heidenheim d. SV Mergelstetten' WHERE veranstalter IN ('1. TC Heidenheim d. SV Mergelstetten', '1. TC Heidenheim', '1. TC Heidenheim d. SV Mergelstetten');
UPDATE TC_Erfolge SET veranstalter = '1. TC Ludwigsburg e.V.', ort = 'Ludwigsburg' WHERE veranstalter IN ('1. TC Ludwigsburg e.V.', '1. TC Ludwigsburg', 'Ludwigsburg', '1. TC', '1.TC Ludwigsburg');
UPDATE TC_Erfolge SET veranstalter = '1. TC Weiß-Blau d. TSV 1880 Neu-Ulm' WHERE veranstalter IN ('1. TC Weiß-Blau d. TSV 1880 Neu-Ulm', '1.TC Weiß-Blau d. TSV 1880 Neu-Ulm');
UPDATE TC_Erfolge SET veranstalter = '1. TSC Enzklösterle' WHERE veranstalter IN ('1. TSC Enzklösterle', '1.TSC Enzklösterle');
UPDATE TC_Erfolge SET veranstalter = '1. TSC Kirchheim unter Teck e.V.', ort = 'Kirchheim unter Teck' WHERE veranstalter IN ('1. TSC Kirchheim unter Teck e.V.', '1. Tanzsportclub Kirchheim unter Teck e.V.', '1.TSC Kirchheim u. Teck');
UPDATE TC_Erfolge SET veranstalter = '1. TSC Schwarz-Rot Herrenberg e.V.', ort = 'Herrenberg-Gültstein' WHERE veranstalter IN ('1. TSC Schwarz-Rot Herrenberg e.V.', '1. TSC Schwarz-Rot');
UPDATE TC_Erfolge SET veranstalter = '1. TSC Wernigerode e.V.' WHERE veranstalter IN ('1. TSC Wernigerode e.V.', '1. Tanzsportclub Wernigerode e. V.');
UPDATE TC_Erfolge SET veranstalter = 'ATC Blau-Gold Heilbronn d. TSG 1845 Heilbronn e.V.' WHERE veranstalter IN ('ATC Blau-Gold Heilbronn d. TSG 1845 Heilbronn e.V.', 'ATC Blau-Gold Heilbronn', 'ATC Blau-Gold Heilbronn e.V.', 'ATC Blau-Gold in der TSG 1845', 'ATC Blau-Gold in der TSG 1845 Heilbronn e. V.', 'ATC Blau-Gold in der TSG 1845 Heilbronn e.V.', 'ATC Blau-Gold in der TSG 1846 Heilbronn e. V.', 'ATC Blaub-Gold Heilbronn');
UPDATE TC_Erfolge SET veranstalter = 'ATC „Graf Zeppelin“ Friedrichshafen e.V.' WHERE veranstalter IN ('ATC „Graf Zeppelin“ Friedrichshafen e.V.', 'ATC  Graf Zeppelin', 'ATC Graf Zeppelin', 'ATC Graf Zeppelin Friedrichshafen', 'ATC Graf Zeppelin Friedrichshafen e. V.');
UPDATE TC_Erfolge SET veranstalter = 'ATK Suebia Stuttgart e.V.' WHERE veranstalter IN ('ATK Suebia Stuttgart e.V.', 'ATK Suebia Stuttgart', 'ATK Suebia', 'Amateurtanzklub Suebia', 'Suebia Stuttgart e.V.');
UPDATE TC_Erfolge SET veranstalter = 'Blaues Band der Spree' WHERE veranstalter IN ('Blaues Band der Spree', 'Blaue Band an der Spree', 'Blaues Band', 'Blaues Band Berlin');
UPDATE TC_Erfolge SET veranstalter = 'Bodenseetanzfest' WHERE veranstalter IN ('Bodenseetanzfest', 'Bodenseetanzfestival');
UPDATE TC_Erfolge SET veranstalter = 'Boston Club e.V. Düsseldorf' WHERE veranstalter IN ('Boston Club e.V. Düsseldorf', 'Boston-Club e. V. Düsseldorf');
UPDATE TC_Erfolge SET veranstalter = 'Casino Club Cannstatt e.V.' WHERE veranstalter IN ('Casino Club Cannstatt e.V.', 'Casino Club Canstatt');
UPDATE TC_Erfolge SET veranstalter = 'danceComp Wuppertal' WHERE veranstalter IN ('danceComp Wuppertal', 'dance Comp', 'danceComp');
UPDATE TC_Erfolge SET veranstalter = 'Gelb-Schwarz-Casino München e.V.' WHERE veranstalter IN ('Gelb-Schwarz-Casino München e.V.', 'Gelb-Schwarz-Casino München e. V.');
UPDATE TC_Erfolge SET veranstalter = 'GOC-Gesellschafter', ort = 'Stuttgart' WHERE veranstalter IN ('GOC-Gesellschafter', 'GOC', 'GOC 2005', 'Stuttgart/GOC-Gesellschafter') OR (veranstalter = 'Stuttgart' AND ort = 'GOC');
UPDATE TC_Erfolge SET veranstalter = 'Grün-Gold d. Turngemeinde in Berlin 1848 e.V.' WHERE veranstalter IN ('Grün-Gold d. Turngemeinde in Berlin 1848 e.V.', 'Grün-Gold der Turngemeinde in Berlin 1848 e.V.');
UPDATE TC_Erfolge SET veranstalter = 'Grün-Gold-Club Bremen e.V.' WHERE veranstalter IN ('Grün-Gold-Club Bremen e.V.', 'Grün-Goldclub e.V.');
UPDATE TC_Erfolge SET veranstalter = 'hessen tanzt', ort = 'Frankfurt/Main' WHERE veranstalter IN ('hessen tanzt');
UPDATE TC_Erfolge SET veranstalter = 'Hessischer Tanzsportverband' WHERE veranstalter IN ('Hessischer Tanzsportverband', 'Hessischer Tanzsportverband (HTV)', 'HTV');
UPDATE TC_Erfolge SET veranstalter = 'Oberbayerische Pfingstturniere', ort = 'Unterschleißheim' WHERE veranstalter IN ('Oberbayerische Pfingstturniere', 'Oberbayrische Pfingstturniere', 'Oberbayerisches Pfingstturnier');
UPDATE TC_Erfolge SET veranstalter = 'Open de Paris', ort = 'Paris' WHERE veranstalter IN ('Open de Paris', 'Paris Dance Open');
UPDATE TC_Erfolge SET veranstalter = 'Schwarz-Silber e.V.' WHERE veranstalter IN ('Schwarz-Silber e.V.', 'Schwarz-Silber Frankfurt');
UPDATE TC_Erfolge SET veranstalter = 'Schwarz-Weiß-Club Esslingen e.V.', ort = 'Esslingen-Berkheim' WHERE veranstalter IN ('Schwarz-Weiß-Club Esslingen e.V.', 'Schwarz-Weiß-Club e. V., Esslingen', 'Schwarz-Weiß-Club e. V.Esslingen', 'Schwarz-Weiss-Club e.V. Esslingen', 'TSA Schwarz- Weiß-Club TSA d.SV 1845', 'TSA Schwarz-Weiß-Club TSA d.SV 1845', 'TSA Schwarz-Weiß-Club d.SV 1845 Esslingen', 'TSA d. SV 1845 Esslingen', 'TSA der Sportvereinigung 1845 Esslingen e.V.');
UPDATE TC_Erfolge SET veranstalter = 'Schwarz-Weiß-Club Pforzheim e.V.' WHERE veranstalter IN ('Schwarz-Weiß-Club Pforzheim e.V.', 'Schwarz- Weiß Club', 'Schwarz-Weiss Pforzheim', 'Schwarz-Weiss-Club Pforzheim e.v.', 'Schwarz- Weiß-Club Pforzheim e.V.', 'Schwarz-Weiß Club');
UPDATE TC_Erfolge SET veranstalter = 'Step by Step Oberhausen e.V.' WHERE veranstalter IN ('Step by Step Oberhausen e.V.', 'Step by Step Oberhausen e. V.');
UPDATE TC_Erfolge SET veranstalter = 'Styrian Open - Steirischer Tanzsportverband' WHERE veranstalter IN ('Styrian Open - Steirischer Tanzsportverband', 'Styrian DanceSPort-Federation');
UPDATE TC_Erfolge SET veranstalter = 'Tanzclub Staufen Göppingen e.V.', ort = 'Göppingen' WHERE veranstalter IN ('Tanzclub Staufen Göppingen e.V.', 'Tanzclub Staufen Goeppingen e.V.');
UPDATE TC_Erfolge SET veranstalter = 'Tanzsport-Club Baden-Baden e.V.', ort = 'Baden-Baden' WHERE veranstalter IN ('Tanzsport-Club Baden-Baden e.V.', 'Tanzsport-Club', 'Tanzsport-Club Baden-Baden e. V.');
UPDATE TC_Erfolge SET veranstalter = 'Tanzsport-Club Landau e.V.' WHERE veranstalter LIKE 'Tanzsportclub%' AND ort LIKE 'Landau%';
UPDATE TC_Erfolge SET veranstalter = 'Tanzsport-Zentrum Mosbach e.V.' WHERE veranstalter IN ('Tanzsport-Zentrum Mosbach e.V.', 'Tanzsport-Zentum Mosbach e.V.');
UPDATE TC_Erfolge SET veranstalter = 'Tanzsportakademie Ludwigsburg e.V.' WHERE veranstalter IN ('Tanzsportakademie Ludwigsburg e.V.', 'Tanzsportakademie Ludwigsburg', 'TSA der Tanzakademie Ludwigsburg', 'TSV der TSA', 'TSV d. Tanzsportakademie Ludwigsburg');
UPDATE TC_Erfolge SET veranstalter = 'Tanzsportclub Ludwigshafen Rot-Gold e.V.' WHERE veranstalter IN ('Tanzsportclub Ludwigshafen Rot-Gold e.V.', 'Tanzsport-Club Ludwigshafen');
UPDATE TC_Erfolge SET veranstalter = 'TanzZentrum Ludwighafen e.V.' WHERE veranstalter IN ('TanzZentrum Ludwighafen e.V.', 'Tanzzentrum Ludwigshafen');
UPDATE TC_Erfolge SET veranstalter = 'TC 75 Lindau e.V.' WHERE veranstalter IN ('TC-75 Lindau', 'TC 75 Lindau e.V.', 'Tanzclub 75 Lindau e.V.');
UPDATE TC_Erfolge SET veranstalter = 'TC Blau-Gelb Kirchheim e.V.' WHERE veranstalter IN ('TC Blau-Gelb Kirchheim e.V.', 'TC Blau-Gelb Kirchheim', 'TC Blau-Gelb Kirchheim/Teck');
UPDATE TC_Erfolge SET veranstalter = 'TC Blau-Gold-Casino Mannheim e.V.' WHERE veranstalter IN ('TC Blau-Gold-Casino Mannheim e.V.', 'TC Blau-Gold Casino', 'TC Blau-Gold-Casino Mannheim e.V.');
UPDATE TC_Erfolge SET veranstalter = 'TC Konstanz e.V.' WHERE veranstalter IN ('TC Konstanz e.V.', 'TC Konstanz');
UPDATE TC_Erfolge SET veranstalter = 'TC Rot-Gold Würzburg e.V.' WHERE veranstalter IN ('TC Rot-Gold Würzburg e.V.', 'TC Rot-Gold', 'TC Rot-Gold Würzburg', 'TSC Rot-Gold Würzburg');
UPDATE TC_Erfolge SET veranstalter = 'TC Rot-Weiß Kaiserslautern e.V.' WHERE veranstalter IN ('TC Rot-Weiß Kaiserslautern e.V.', 'TC Kaiserslautern', 'Rot-Weiss Kaiserslautern');
UPDATE TC_Erfolge SET veranstalter = 'TC Rot-Weiß Schwäbisch Gmünd e.V.' WHERE veranstalter IN ('TC Rot-Weiß Schwäbisch Gmünd e.V.', 'TC Rot-Weiss Schwäbisch Gmünd e.V.', 'TC Rot-Weiß Schwäbisch Gemünd e.V.');
UPDATE TC_Erfolge SET veranstalter = 'TC Schwarz-Weiß Reutlingen e.V.' WHERE veranstalter IN ('TC Schwarz-Weiß Reutlingen e.V.', 'TC Schwarz- Weiß', 'TC Schwarz-Weiß', 'TC Schwarz-Weiss e.V.');
UPDATE TC_Erfolge SET veranstalter = 'TD Tanzsportclub Düsseldorf Rot-Weiss e.V.' WHERE veranstalter IN ('TD Tanzsportclub Düsseldorf Rot-Weiss e.V.', 'Tanzsportclub Düsseldorf Rot-Weiss');
UPDATE TC_Erfolge SET veranstalter = 'TG Blau-Gold St. Ingbert e.V.' WHERE veranstalter IN ('TG Blau-Gold St. Ingbert e.V.','TanzsportGesellschaft Blau-Gold St. Ingbert e.V.', 'TG Blau- Gold ST. Ingbert e.V.', 'TC Blau-Gold St. Ingbert e.V.');
UPDATE TC_Erfolge SET veranstalter = 'TSA des TV 1862 Bad Mergentheim e.V.' WHERE veranstalter IN ('TSA des TV 1862 Bad Mergentheim e.V.','TSA d. TV 1862', 'TSA d. TV 1862 Bad Mergentheim e.V.');
UPDATE TC_Erfolge SET veranstalter = 'TSC Astoria Karlsruhe e.V.' WHERE (veranstalter = 'TSC Astoria' AND ort LIKE 'Karlsruhe') OR (veranstalter IN ('TSC Astoria Karlsruhe e.V.','TSC Astoria Karlsruhe'));
UPDATE TC_Erfolge SET veranstalter = 'TSC Astoria Stuttgart e.V.' WHERE (veranstalter = 'TSC Astoria' AND ort LIKE 'Stuttgart') OR (veranstalter IN ('TSC Astoria Stuttgart e.V.'));
UPDATE TC_Erfolge SET veranstalter = 'TSC Astoria Tübingen e.V.' WHERE (veranstalter LIKE 'TSC Astoria%' AND ort LIKE 'Tübingen') OR (veranstalter IN ('TSC Astoria Tübingen e.V.'));
UPDATE TC_Erfolge SET veranstalter = 'TSC Blau-Weiß Waldshut-Tiengen e.V.' WHERE veranstalter IN ('TSC Blau-Weiß Waldshut-Tiengen e.V.', 'TSC Blau-Weiss Waldshut e.V.', 'TSC Blau-Weiß Waldshut-Tiengen', 'TSC Blau-Weiß Waldshut e.V.');
UPDATE TC_Erfolge SET veranstalter = 'TSC Grün-Gold Heidelberg e.V.' WHERE veranstalter IN ('TSC Grün-Gold Heidelberg e.V.', 'Tanzsportclub Grün-Gold Heidelberg e.V.', 'Tanzsportclub Gruen-Gold Heidelberg', 'Tanzsportclub Heidelberg e.V.');
UPDATE TC_Erfolge SET veranstalter = 'TSC Illingen e.V.' WHERE veranstalter IN ('TSC Illingen e.V.','TC Illingen', 'TSC Illingen');
UPDATE TC_Erfolge SET veranstalter = 'TSC Ludwigshafen/Wachenheim Rot-Gold e.V.' WHERE veranstalter IN ('TSC Ludwigshafen/Wachenheim Rot-Gold e.V.','Tanzsportclub Ludwigshafen Rot-Gold e.V.', 'TC Ludwigshafen Rot-Gold e.V.');
UPDATE TC_Erfolge SET veranstalter = 'TSC Residenz Ludwigsburg e.V.' WHERE veranstalter IN ('TSC Residenz Ludwigsburg e.V.','TSC Resident Ludwigsburg', 'TSC Residenz', 'TSC Residenz Ludwigsburg');
UPDATE TC_Erfolge SET veranstalter = 'TSC Rot-Gold Casino Nürnberg e.V.' WHERE veranstalter IN ('TSC Rot-Gold Casino Nürnberg e.V.','TSC Rot-Gold-Casino Nürnberg e.V.', 'TSC Rot-Gold-Casino Nürnberg');
UPDATE TC_Erfolge SET veranstalter = 'TSC Rot-Weiß Karlsruhe e.V.' WHERE (veranstalter LIKE 'TSC Rot_Wei%' AND ort LIKE 'Karlsruhe');
UPDATE TC_Erfolge SET veranstalter = 'TSC Rot-Weiß Öhringen e.V.' WHERE (veranstalter LIKE 'TSC Rot-Wei%' AND ort LIKE 'Öhringen');
UPDATE TC_Erfolge SET veranstalter = 'TSC Rödermark e.V.' WHERE veranstalter LIKE 'Tanzsportclub%' AND ort LIKE 'Rödermark%';
UPDATE TC_Erfolge SET veranstalter = 'TSC Staufer-Residenz Waiblingen e.V.' WHERE (veranstalter LIKE 'TSC Staufer%Residenz%' AND ort LIKE 'Waiblingen') OR (veranstalter IN ('TSC Staufer-Residenz Waiblingen e.V.','TSC Staufer-Residenz Waiblingen', 'TSC Waiblingen'));
UPDATE TC_Erfolge SET veranstalter = 'TSC Staufer-Residenz Waiblingen e.V.' WHERE veranstalter IN ('TSC Staufer-Residenz Waiblingen e.V.', 'Staufer Residenz e.V.', 'Staufer Residenz Waiblingen');
UPDATE TC_Erfolge SET veranstalter = 'TSC Unterschleißheim e.V.' WHERE (veranstalter LIKE 'Tanzsportclub%' AND ort LIKE 'Unterschleißheim%') OR (veranstalter IN ('TSC Unterschleißheim e.V.','TanzSportClub Unterschleißheim e.V.','TSC Unterschleißheim e.V.', 'TSC Unterschleissheim e.V.', 'TSC Unterschleißheim'));
UPDATE TC_Erfolge SET veranstalter = 'TSC Villingen-Schwenningen e.V.' WHERE veranstalter IN ('TSC Villingen-Schwenningen e.V.', ' TSC Villingen-Schwenningen e.V.', 'TSC Villingen-Schwenningen', 'TSC Villiingen-Schwenningen e. V.', 'TSC Villingen Schwenningen e.V.');
UPDATE TC_Erfolge SET veranstalter = 'TSC Zentrum Graz' WHERE veranstalter IN ('TSC Zentrum Graz', 'Tanzsportclub Zentrum Graz', 'TSC-Zentrum Graz');
UPDATE TC_Erfolge SET veranstalter = 'TSF Meersburg e.V.' WHERE veranstalter IN ('TSF Meersburg e.V.', 'Tanzsportfreunde Meersburg e.V.', 'Tanzsportfreunde Hagnau', 'TC Meersburg', 'TSF Meersburg');
UPDATE TC_Erfolge SET veranstalter = 'TSG 1846 Backnang e.V. Tanzsport' WHERE veranstalter IN ('TSG 1846 Backnang e.V. Tanzsport','TSC 1846 Backnang e.V.', 'TSA der TSG', 'TSA der TSG 1846 Backnang', 'TSA der TSG Backnang', 'TSC 1846 Backnang e.V.', 'TSG 1846 Backnang e.V.', 'TSG 1846 Backnang e.V Tanzsport');
UPDATE TC_Erfolge SET veranstalter = 'TSG Bavaria e.V.' WHERE veranstalter IN ('TSG Bavaria e.V.','TSG Bavaria Augsburg', 'Tanzsportgemeinschaft Bavaria e.V.');
UPDATE TC_Erfolge SET veranstalter = 'TSG Creativ Norderstedt e.V.' WHERE veranstalter IN ('TSG Creativ Norderstedt e.V.','TSG Creativ Norderstedt', 'TSG Creative Norderstedt', 'Tanzsportgemeinschaft Creativ Norderstedt e.V.');
UPDATE TC_Erfolge SET veranstalter = 'TSG Fürth e.V.' WHERE veranstalter IN ('TSG Fürth e.V.','TSG Fürth', 'Tanzsportgemeinschaft Fürth e.V.');
UPDATE TC_Erfolge SET veranstalter = 'TSV Grün-Gold Erfurt e.V.' WHERE veranstalter IN ('TSV Grün-Gold Erfurt e.V.', 'Grün Gold Erfurt');
UPDATE TC_Erfolge SET veranstalter = 'Turnierserie Leistungsstarke 66' WHERE veranstalter IN ('Turnierserie Leistungsstarke 66', 'Leistungsstarke 66', 'LS 66');
UPDATE TC_Erfolge SET veranstalter = 'VTSC Casino Dornbirn' WHERE (veranstalter LIKE 'Österreich' AND ort LIKE 'Höchst%') OR (veranstalter IN ('VTSC Casino Dornbirn','VTC', 'VTC Dornbirn'));
UPDATE TC_Erfolge SET veranstalter = 'TTC Rot-Gold Tübingen e.V.' WHERE (veranstalter LIKE 'TTC Rot-Gold' AND ort LIKE 'Tübingen') OR (veranstalter IN ('TTC Rot-Gold Tübingen e.V.','TTC Rot-Gold e.V.', 'TTC Rot-Gold e.V.,','TTC Rot-Gold v.V.','TTC Rot-Gold  Tübingen e.V.'));

-- ORTE KORRIGIEREN --
UPDATE TC_Erfolge SET ort = NULL WHERE ort = '' OR ort = '-';
UPDATE TC_Erfolge SET ort = 'Auenwald-Unterbrüden' WHERE ort IN ('Auenwald-Unterbrüden', 'Auenwald-UnterbrÃ¼den');
UPDATE TC_Erfolge SET ort = 'Bad Dürrheim' WHERE ort IN ('Bad Dürrheim', 'Bad DÃ¼rrheim');
UPDATE TC_Erfolge SET ort = 'Bruckmühl' WHERE ort IN ('Bruckmühl', 'BruckmÃ¼hl');
UPDATE TC_Erfolge SET ort = 'Dornbirn (AT)' WHERE ort IN ('Dornbirn (AT)', 'Dornbirn', 'Dornbirn, Österreich');
UPDATE TC_Erfolge SET ort = 'Enzklösterle' WHERE ort IN ('Enzklösterle', ' Enzklösterle');
UPDATE TC_Erfolge SET ort = 'Erlangen' WHERE ort IN ('Erlangen', 'Erlangen d. TB 1880');
UPDATE TC_Erfolge SET ort = 'Frankfurt am Main' WHERE ort IN ('Frankfurt am Main', 'Frankfurt/Main', 'Frankfurt');
UPDATE TC_Erfolge SET ort = 'Freiberg am Neckar' WHERE ort IN ('Freiberg am Neckar', 'Freiberg a.N.', 'Freiberg/Neckar');
UPDATE TC_Erfolge SET ort = 'Friedrichshafen-Ettenkirch' WHERE ort IN ('Friedrichshafen-Ettenkirch', 'Friedrichshafen-Ettkirch', 'Ettenkirch');
UPDATE TC_Erfolge SET ort = 'Höchst (AT)' WHERE ort IN ('Höchst (AT)', 'Höchst');
UPDATE TC_Erfolge SET ort = 'Kelkheim (Taunus)' WHERE ort IN ('Kelkheim (Taunus)', 'Kelkheim', 'Kelkheim/Taunus');
UPDATE TC_Erfolge SET ort = 'Kirchheim unter Teck' WHERE ort IN ('Kirchheim unter Teck', 'Kirchheim/Teck');
UPDATE TC_Erfolge SET ort = 'Konstanz-Dettingen' WHERE ort IN ('Konstanz-Dettingen', 'Konstanz-Dettlingen');
UPDATE TC_Erfolge SET ort = 'Kopenhagen (DK)' WHERE ort IN ('Kopenhagen (DK)', 'Kopenhagen');
UPDATE TC_Erfolge SET ort = 'Kopenhagen' WHERE ort IN ('Kopenhagen', 'Copenhagen');
UPDATE TC_Erfolge SET ort = 'Landau in der Pfalz' WHERE ort IN ('Landau in der Pfalz', 'Landau i. d. Pfalz');
UPDATE TC_Erfolge SET ort = 'Lollar' WHERE ort IN ('Lollar', 'Lollar bei Gießen');
UPDATE TC_Erfolge SET ort = 'Mühlheim an der Ruhr' WHERE ort IN ('Mühlheim an der Ruhr', 'MÃ¼hlheim an der Ruhr', 'Mülheim a. d. Ruhr');
UPDATE TC_Erfolge SET ort = 'Olomouc / Olmütz (CZ)' WHERE ort IN ('Olomouc / Olmütz (CZ)', 'Olomouc (CZ)', 'Olomouc');
UPDATE TC_Erfolge SET ort = 'Paris (FR)' WHERE ort IN ('Paris (FR)', 'Paris');
UPDATE TC_Erfolge SET ort = 'Pforzheim' WHERE ort IN ('Pforzheim', 'Pforzhem');
UPDATE TC_Erfolge SET ort = 'Pieve di Cento (IT)' WHERE ort IN ('Pieve di Cento (IT)', 'Pieve di Cento');
UPDATE TC_Erfolge SET ort = 'Schladming (AT)' WHERE ort IN ('Schladming (AT)', 'Schladming');
UPDATE TC_Erfolge SET ort = 'Stuttgart-Botnang' WHERE ort IN ('Stuttgart-Botnang', 'Botnang', 'S-Botnang');
UPDATE TC_Erfolge SET ort = 'Stuttgart-Feuerbach' WHERE ort IN ('Stuttgart-Feuerbach', 'Suttgart-Feuerbach');
UPDATE TC_Erfolge SET ort = 'Unterhaching' WHERE ort IN ('Unterhaching', 'Unterhaching 1910 e.V.');
UPDATE TC_Erfolge SET ort = 'Unterschleißheim' WHERE ort IN ('Unterschleißheim', 'Unterschleissheim');
UPDATE TC_Erfolge SET ort = 'Waiblingen' WHERE ort IN ('Waiblingen', 'Waiblingen e.V.');
UPDATE TC_Erfolge SET ort = 'Wien (AT)' WHERE ort IN ('Wien (AT)', 'Wien');
UPDATE TC_Erfolge SET ort = 'Wuppertal' WHERE ort IN ('Wuppertal', 'Wuppertal ');
UPDATE TC_Erfolge SET ort = 'Öhringen' WHERE ort IN ('Öhringen', ' Öhringen');

-- LEERE VERANSTALTER --
UPDATE TC_Erfolge SET ort = 'Achern', veranstalter = NULL WHERE (ort IS NULL OR ort = 'Achern') AND veranstalter = 'Achern';
UPDATE TC_Erfolge SET ort = 'Bad Homburg', veranstalter = NULL WHERE (ort IS NULL OR ort = 'Bad Homburg') AND veranstalter = 'Bad Homburg';
UPDATE TC_Erfolge SET ort = 'Baden-Baden', veranstalter = NULL WHERE (ort IS NULL OR ort = 'Baden-Baden') AND veranstalter = 'Baden-Baden';
UPDATE TC_Erfolge SET ort = 'Berlin', veranstalter = NULL WHERE (ort IS NULL OR ort = 'Berlin') AND veranstalter = 'Berlin';
UPDATE TC_Erfolge SET ort = 'Dortmund', veranstalter = NULL WHERE (ort IS NULL OR ort = 'Dortmund') AND veranstalter = 'Dortmund';
UPDATE TC_Erfolge SET ort = 'Düsseldorf', veranstalter = NULL WHERE (ort IS NULL OR ort = 'Düsseldorf') AND veranstalter = 'Düsseldorf';
UPDATE TC_Erfolge SET ort = 'Fürth', veranstalter = NULL WHERE (ort IS NULL OR ort = 'Fürth') AND veranstalter = 'Fürth';
UPDATE TC_Erfolge SET ort = 'Hamburg', veranstalter = NULL WHERE (ort IS NULL OR ort = 'Hamburg') AND veranstalter = 'Hamburg';
UPDATE TC_Erfolge SET veranstalter = NULL WHERE ort = veranstalter;