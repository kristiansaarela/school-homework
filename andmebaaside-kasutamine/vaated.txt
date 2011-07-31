mysql> create view t_andmed as select Ema_nimi, Synnikuupaev, L_nimi, Elukoht, Synniaeg, Synnikaal, Synnipikkus FROM EMAD as e, SYNNID as s WHERE s.SUGU = 't' and e.Ema_id = s.Ema_id;



mysql> create view p_andmed as select Ema_nimi, Synnikuupaev, L_nimi, Elukoht, Synniaeg, Synnikaal, Synnipikkus FROM EMAD as e, SYNNID as s WHERE s.SUGU = 'p' and e.Ema_id = s.Ema_id;




mysql> insert into SYNNID (Synnikuupaev, Ema_id, L_nimi, Elukoht, Synniaeg, Synnikaal, Synnipikkus, SUGU) values (2006-05-13, 50, Adavere, 05:02:03, 7810, 90, t);



mysql> select * from t_andmed;

| Merka       | 2007-02-27   | Merike    | Tallinn    | 20:56:00 |      3912 |          53 | 
| Viki        | 2007-03-08   | Merike    | Paide      | 01:43:00 |      3800 |          52 | 
| Katrin      | 2007-03-09   | Rita      | Tallinn    | 01:37:00 |      3778 |          52 | 
| Katrin      | 2006-05-13   | Lady GAGA | Adavere    | 05:02:03 |      7810 |          90 | 
+-------------+--------------+-----------+------------+----------+-----------+-------------+
25 rows in set (0.00 sec)



truncate kui tahad tabelit tühjendada.
truncate EMAD;



mysql> select concat_ws(' ', Eesnimi, Perenimi) as nimi, Isikukood, Aadress, Telefon, Email, Amet, Asutus From LUGEJA order by nimi;
+------------------+-------------+-----------------------+------------+------------------------+-------------+------------------+
| nimi             | Isikukood   | Aadress               | Telefon    | Email                  | Amet        | Asutus           |
+------------------+-------------+-----------------------+------------+------------------------+-------------+------------------+
| Berit Roosa      | 60211132136 | Tartu Kuuni 23-11     |       NULL | NULL                   | NULL        | Roomuratas       | 
| Hannes Hein      | 39212262427 | Tartu Betooni 24      |          0 | heina@tool.ee          | mja         | AS Tool          | 
| Jane Jnes        | 49009162497 | Tartu Piima 12        | 2147483647 | jane321@hot.ee         | pilane      | Teie kool        | 
| Janek Jooksik    | 38911222492 | Tartu Raatuse 22-4    |   56787900 | janek@hot.ee           | pilane      | Meie kool        | 
| Joosep Jalakas   | 38810222497 | Tartu                 |  556457575 | joosepjalakas@ut.ee    | lektor      | Tartulikool      | 
| Joosep Sinine    | 50101013462 | Tartu Tahe 43-1       |       NULL | NULL                   | NULL        | Pallike          | 
| Kadri Kade       | 48910212197 | Tartu Vru 89          |          0 | kati@kokk.ee           | kokk        | AS Sk ja jook    | 
| Kalev Komm       | 38809262497 | Tartu Vru 33          | 2147483647 | kalevikomm@komm.com    | mja         | Kommipood        | 
| Kalle Kohin      | 38910262497 | Tartu Prna 23-12      |   56789576 | kalle12@hot.ee         | pilane      | Tartu KHK        | 
| Kati Karu        | 48901312397 | Tartu Jalaka 23-3     |   74645679 | kati.karu@teiekool.ee  | pilane      | Teie kool        | 
| Kati Kask        | 49010162558 | Tartu Kopli 1         |   53459878 | kati_k@kool.ee         | juhiabi     | AS T             | 
| Kevin Kivi       | 39006022497 | Tartu Turu 5-12       |   59791547 | kivi@hot.ee            | pilane      | Uus kool         | 
| Kristian Saarela | 39205133516 | NULL                  |       NULL | NULL                   | NULL        | NULL             | 
| Leo Loots        | 38904292497 | Tartu Pepleri 2-1     |  569873223 | loots@maja.ee          | autojuht    | AS Maja          | 
| Liia Lips        | 49111162497 | Tartu Prna 66         |   69876222 | lipsik@lk.ee           | mja         | Riidepood        | 
| Lilli Lill       | 48910222497 | Tartu Prna 34         |  487541247 | lilli.lill@kodu.ee     | kodune      |                  | 
| Luisa Tuul       | 49112162497 | Tartu Vanemuise 56-23 |  558787887 | tuul@puhub.ee          |             |                  | 
| Malle Moos       | 48910012697 | Tartu Vru 54-21       |   56423789 |                        | koristaja   | O Kord ja Puhtus | 
| Mari Maasikas    | 48810242787 | Tartu Aida 3-14       |   50458977 |                        |             |                  | 
| Mart Karu        | 39112312497 | Tartu Aleksandri 3-2  |  587979797 | mart.karu@teiekool.ee  | petaja      | Teie kool        | 
| Pille Pill       | 49110302488 | Tartu Jalaka 12-3     |   51689789 | pillekas@gmail.com     | pilane      | Meie kool        | 
| Ragnar Roos      | 38911212491 | Tartu                 |    7715478 | rax_x@gmail.com        | pilane      | Uus kool         | 
| Rita Rehv        | 49107232497 | Tartu Riia 120        |   52323424 | rita.rehv@rehvivah.ee  | kassapidaja | Rehvivahetus     | 
| Robert Rohi      | 38806062494 | Tartu Vru 36          |  588787362 | robi@uuuskool.ee       | petaja      | Uus kool         | 
| Sandra Saar      | 49012292493 | Tartu Narva mnt 34-12 |  589456534 |                        |             |                  | 
| Sille Siil       | 49010262577 | Tartu Vru 69          |  454667993 | siilike@udus.ee        | lipilane    | Tartulikool      | 
| Tiia Tuisk       | 49011292497 | Tartu Riia 126        |   50468977 | tiia.tuisk@hotmail.com | petaja      | Meie kool        | 
| Tiit Tikk        | 38712062497 | Tartu                 |  547799133 | tiit.tikk@astiit.ee    | juhataja    | As Tiit          | 
| Vaiko Kook       | 38811202495 | Tartu Pikk 56-10      |    7689898 |                        | autojuht    | O auto           | 
| Veiko Vesi       | 38710022497 | Tartu Lai 76- 11      |    5877693 | veiko@vesi.com         |             |                  | 
+------------------+-------------+-----------------------+------------+------------------------+-------------+------------------+
30 rows in set (0.00 sec)
