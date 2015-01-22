Päringud SQL-is
Käsud ja tulemused, mida sisestad MySql-is kopeeri ka siia töölehele.


1. Loo tabel LUGEJA (kui Sa pole seda veel teinud), järgnevate väljadega:isikukood, eesnimi, perenimi, telefon, aadress, email, amet,asutus.
2. Lisa enda andmed lugejate tabelisse.
3. Lisa LUGEJA tabelisse ka etteantud andmed käivitades failis Lugeja.txt oleva käsk.  
4. Väljasta kogu tabeli LUGEJAD andmed.
5. Väljasta lugejate eesnimi, perenimi ja aadress.
select eesnimi, perenimi, aadress from LUGEJA;
+----------+----------+-----------------------+
| eesnimi  | perenimi | aadress               |
+----------+----------+-----------------------+
| Kristian | Saarela  | NULL                  | 
| Kalle    | Kohin    | Tartu Prna 23-12      | 
| Tiia     | Tuisk    | Tartu Riia 126        | 
| Pille    | Pill     | Tartu Jalaka 12-3     | 
| Kati     | Kask     | Tartu Kopli 1         | 
| Malle    | Moos     | Tartu Vru 54-21       | 
| Mari     | Maasikas | Tartu Aida 3-14       | 
| Joosep   | Jalakas  | Tartu                 | 
| Tiit     | Tikk     | Tartu                 | 
| Ragnar   | Roos     | Tartu                 | 
| Robert   | Rohi     | Tartu Vru 36          | 
| Kevin    | Kivi     | Tartu Turu 5-12       | 
| Sille    | Siil     | Tartu Vru 69          | 
| Lilli    | Lill     | Tartu Prna 34         | 
| Luisa    | Tuul     | Tartu Vanemuise 56-23 | 
| Sandra   | Saar     | Tartu Narva mnt 34-12 | 
| Kadri    | Kade     | Tartu Vru 89          | 
| Vaiko    | Kook     | Tartu Pikk 56-10      | 
| Veiko    | Vesi     | Tartu Lai 76- 11      | 
| Hannes   | Hein     | Tartu Betooni 24      | 
| Leo      | Loots    | Tartu Pepleri 2-1     | 
| Liia     | Lips     | Tartu Prna 66         | 
| Kalev    | Komm     | Tartu Vru 33          | 
| Rita     | Rehv     | Tartu Riia 120        | 
| Janek    | Jooksik  | Tartu Raatuse 22-4    | 
| Jane     | Jnes     | Tartu Piima 12        | 
| Mart     | Karu     | Tartu Aleksandri 3-2  | 
| Kati     | Karu     | Tartu Jalaka 23-3     | 
+----------+----------+-----------------------+
28 rows in set (0.00 sec)

6. Leia kõik lugejad kelle perenimi on Karu. Mitu neid on?
select * from LUGEJA where Perenimi='Karu';
+-----------+---------+----------+-------------+----------------------+-----------+-----------------------+--------+-----------+
| Lugeja_ID | Eesnimi | Perenimi | Isikukood   | Aadress              | Telefon   | email                 | Amet   | Asutus    |
+-----------+---------+----------+-------------+----------------------+-----------+-----------------------+--------+-----------+
|        27 | Mart    | Karu     | 39112312497 | Tartu Aleksandri 3-2 | 587979797 | mart.karu@teiekool.ee | petaja | Teie kool | 
|        28 | Kati    | Karu     | 48901312397 | Tartu Jalaka 23-3    |  74645679 | kati.karu@teiekool.ee | pilane | Teie kool | 
+-----------+---------+----------+-------------+----------------------+-----------+-----------------------+--------+-----------+
2 rows in set (0.00 sec)

7. Leia lugejad, kelle eesnimi on Kati. Mitu neid on? 
mysql> select * from LUGEJA where Eesnimi='Kati';
+-----------+---------+----------+-------------+-------------------+----------+-----------------------+---------+-----------+
| Lugeja_ID | Eesnimi | Perenimi | Isikukood   | Aadress           | Telefon  | email                 | Amet    | Asutus    |
+-----------+---------+----------+-------------+-------------------+----------+-----------------------+---------+-----------+
|         5 | Kati    | Kask     | 49010162558 | Tartu Kopli 1     | 53459878 | kati_k@kool.ee        | juhiabi | AS T      | 
|        28 | Kati    | Karu     | 48901312397 | Tartu Jalaka 23-3 | 74645679 | kati.karu@teiekool.ee | pilane  | Teie kool | 
+-----------+---------+----------+-------------+-------------------+----------+-----------------------+---------+-----------+
2 rows in set (0.00 sec)

8. Järjesta lugejad perenime järgi kasvavalt.
mysql> select * from LUGEJA where Lugeja_ID > 0 order by Eesnimi asc;
+-----------+----------+----------+-------------+-----------------------+------------+------------------------+-------------+------------------+
| Lugeja_ID | Eesnimi  | Perenimi | Isikukood   | Aadress               | Telefon    | email                  | Amet        | Asutus           |
+-----------+----------+----------+-------------+-----------------------+------------+------------------------+-------------+------------------+
|        20 | Hannes   | Hein     | 39212262427 | Tartu Betooni 24      |          0 | heina@tool.ee          | mja         | AS Tool          | 
|        26 | Jane     | Jnes     | 49009162497 | Tartu Piima 12        | 2147483647 | jane321@hot.ee         | pilane      | Teie kool        | 
|        25 | Janek    | Jooksik  | 38911222492 | Tartu Raatuse 22-4    |   56787900 | janek@hot.ee           | pilane      | Meie kool        | 
|         8 | Joosep   | Jalakas  | 38810222497 | Tartu                 |  556457575 | joosepjalakas@ut.ee    | lektor      | Tartulikool      | 
|        17 | Kadri    | Kade     | 48910212197 | Tartu Vru 89          |          0 | kati@kokk.ee           | kokk        | AS Sk ja jook    | 
|        23 | Kalev    | Komm     | 38809262497 | Tartu Vru 33          | 2147483647 | kalevikomm@komm.com    | mja         | Kommipood        | 
|         2 | Kalle    | Kohin    | 38910262497 | Tartu Prna 23-12      |   56789576 | kalle12@hot.ee         | pilane      | Tartu KHK        | 
|         5 | Kati     | Kask     | 49010162558 | Tartu Kopli 1         |   53459878 | kati_k@kool.ee         | juhiabi     | AS T             | 
|        28 | Kati     | Karu     | 48901312397 | Tartu Jalaka 23-3     |   74645679 | kati.karu@teiekool.ee  | pilane      | Teie kool        | 
|        12 | Kevin    | Kivi     | 39006022497 | Tartu Turu 5-12       |   59791547 | kivi@hot.ee            | pilane      | Uus kool         | 
|         1 | Kristian | Saarela  | 39205133516 | NULL                  |       NULL | NULL                   | NULL        | NULL             | 
|        21 | Leo      | Loots    | 38904292497 | Tartu Pepleri 2-1     |  569873223 | loots@maja.ee          | autojuht    | AS Maja          | 
|        22 | Liia     | Lips     | 49111162497 | Tartu Prna 66         |   69876222 | lipsik@lk.ee           | mja         | Riidepood        | 
|        14 | Lilli    | Lill     | 48910222497 | Tartu Prna 34         |  487541247 | lilli.lill@kodu.ee     | kodune      |                  | 
|        15 | Luisa    | Tuul     | 49112162497 | Tartu Vanemuise 56-23 |  558787887 | tuul@puhub.ee          |             |                  | 
|         6 | Malle    | Moos     | 48910012697 | Tartu Vru 54-21       |   56423789 |                        | koristaja   | O Kord ja Puhtus | 
|         7 | Mari     | Maasikas | 48810242787 | Tartu Aida 3-14       |   50458977 |                        |             |                  | 
|        27 | Mart     | Karu     | 39112312497 | Tartu Aleksandri 3-2  |  587979797 | mart.karu@teiekool.ee  | petaja      | Teie kool        | 
|         4 | Pille    | Pill     | 49110302488 | Tartu Jalaka 12-3     |   51689789 | pillekas@gmail.com     | pilane      | Meie kool        | 
|        10 | Ragnar   | Roos     | 38911212491 | Tartu                 |    7715478 | rax_x@gmail.com        | pilane      | Uus kool         | 
|        24 | Rita     | Rehv     | 49107232497 | Tartu Riia 120        |   52323424 | rita.rehv@rehvivah.ee  | kassapidaja | Rehvivahetus     | 
|        11 | Robert   | Rohi     | 38806062494 | Tartu Vru 36          |  588787362 | robi@uuuskool.ee       | petaja      | Uus kool         | 
|        16 | Sandra   | Saar     | 49012292493 | Tartu Narva mnt 34-12 |  589456534 |                        |             |                  | 
|        13 | Sille    | Siil     | 49010262577 | Tartu Vru 69          |  454667993 | siilike@udus.ee        | lipilane    | Tartulikool      | 
|         3 | Tiia     | Tuisk    | 49011292497 | Tartu Riia 126        |   50468977 | tiia.tuisk@hotmail.com | petaja      | Meie kool        | 
|         9 | Tiit     | Tikk     | 38712062497 | Tartu                 |  547799133 | tiit.tikk@astiit.ee    | juhataja    | As Tiit          | 
|        18 | Vaiko    | Kook     | 38811202495 | Tartu Pikk 56-10      |    7689898 |                        | autojuht    | O auto           | 
|        19 | Veiko    | Vesi     | 38710022497 | Tartu Lai 76- 11      |    5877693 | veiko@vesi.com         |             |                  | 
+-----------+----------+----------+-------------+-----------------------+------------+------------------------+-------------+------------------+
28 rows in set (0.00 sec)

9. Järjesta lugejad esmalt perenime seejärel eesnime järgi kasvavalt.
mysql> select * from LUGEJA where Lugeja_ID > 0 order by Perenimi asc, Eesnimi asc;
+-----------+----------+----------+-------------+-----------------------+------------+------------------------+-------------+------------------+
| Lugeja_ID | Eesnimi  | Perenimi | Isikukood   | Aadress               | Telefon    | email                  | Amet        | Asutus           |
+-----------+----------+----------+-------------+-----------------------+------------+------------------------+-------------+------------------+
|        20 | Hannes   | Hein     | 39212262427 | Tartu Betooni 24      |          0 | heina@tool.ee          | mja         | AS Tool          | 
|         8 | Joosep   | Jalakas  | 38810222497 | Tartu                 |  556457575 | joosepjalakas@ut.ee    | lektor      | Tartulikool      | 
|        26 | Jane     | Jnes     | 49009162497 | Tartu Piima 12        | 2147483647 | jane321@hot.ee         | pilane      | Teie kool        | 
|        25 | Janek    | Jooksik  | 38911222492 | Tartu Raatuse 22-4    |   56787900 | janek@hot.ee           | pilane      | Meie kool        | 
|        17 | Kadri    | Kade     | 48910212197 | Tartu Vru 89          |          0 | kati@kokk.ee           | kokk        | AS Sk ja jook    | 
|        28 | Kati     | Karu     | 48901312397 | Tartu Jalaka 23-3     |   74645679 | kati.karu@teiekool.ee  | pilane      | Teie kool        | 
|        27 | Mart     | Karu     | 39112312497 | Tartu Aleksandri 3-2  |  587979797 | mart.karu@teiekool.ee  | petaja      | Teie kool        | 
|         5 | Kati     | Kask     | 49010162558 | Tartu Kopli 1         |   53459878 | kati_k@kool.ee         | juhiabi     | AS T             | 
|        12 | Kevin    | Kivi     | 39006022497 | Tartu Turu 5-12       |   59791547 | kivi@hot.ee            | pilane      | Uus kool         | 
|         2 | Kalle    | Kohin    | 38910262497 | Tartu Prna 23-12      |   56789576 | kalle12@hot.ee         | pilane      | Tartu KHK        | 
|        23 | Kalev    | Komm     | 38809262497 | Tartu Vru 33          | 2147483647 | kalevikomm@komm.com    | mja         | Kommipood        | 
|        18 | Vaiko    | Kook     | 38811202495 | Tartu Pikk 56-10      |    7689898 |                        | autojuht    | O auto           | 
|        14 | Lilli    | Lill     | 48910222497 | Tartu Prna 34         |  487541247 | lilli.lill@kodu.ee     | kodune      |                  | 
|        22 | Liia     | Lips     | 49111162497 | Tartu Prna 66         |   69876222 | lipsik@lk.ee           | mja         | Riidepood        | 
|        21 | Leo      | Loots    | 38904292497 | Tartu Pepleri 2-1     |  569873223 | loots@maja.ee          | autojuht    | AS Maja          | 
|         7 | Mari     | Maasikas | 48810242787 | Tartu Aida 3-14       |   50458977 |                        |             |                  | 
|         6 | Malle    | Moos     | 48910012697 | Tartu Vru 54-21       |   56423789 |                        | koristaja   | O Kord ja Puhtus | 
|         4 | Pille    | Pill     | 49110302488 | Tartu Jalaka 12-3     |   51689789 | pillekas@gmail.com     | pilane      | Meie kool        | 
|        24 | Rita     | Rehv     | 49107232497 | Tartu Riia 120        |   52323424 | rita.rehv@rehvivah.ee  | kassapidaja | Rehvivahetus     | 
|        11 | Robert   | Rohi     | 38806062494 | Tartu Vru 36          |  588787362 | robi@uuuskool.ee       | petaja      | Uus kool         | 
|        10 | Ragnar   | Roos     | 38911212491 | Tartu                 |    7715478 | rax_x@gmail.com        | pilane      | Uus kool         | 
|        16 | Sandra   | Saar     | 49012292493 | Tartu Narva mnt 34-12 |  589456534 |                        |             |                  | 
|         1 | Kristian | Saarela  | 39205133516 | NULL                  |       NULL | NULL                   | NULL        | NULL             | 
|        13 | Sille    | Siil     | 49010262577 | Tartu Vru 69          |  454667993 | siilike@udus.ee        | lipilane    | Tartulikool      | 
|         9 | Tiit     | Tikk     | 38712062497 | Tartu                 |  547799133 | tiit.tikk@astiit.ee    | juhataja    | As Tiit          | 
|         3 | Tiia     | Tuisk    | 49011292497 | Tartu Riia 126        |   50468977 | tiia.tuisk@hotmail.com | petaja      | Meie kool        | 
|        15 | Luisa    | Tuul     | 49112162497 | Tartu Vanemuise 56-23 |  558787887 | tuul@puhub.ee          |             |                  | 
|        19 | Veiko    | Vesi     | 38710022497 | Tartu Lai 76- 11      |    5877693 | veiko@vesi.com         |             |                  | 
+-----------+----------+----------+-------------+-----------------------+------------+------------------------+-------------+------------------+
28 rows in set (0.00 sec)


10. Leia lugejad, kelle perenimi algab K tähega.
mysql> select * from LUGEJA where left(Perenimi, 1) = 'K';
+-----------+---------+----------+-------------+----------------------+------------+-----------------------+----------+---------------+
| Lugeja_ID | Eesnimi | Perenimi | Isikukood   | Aadress              | Telefon    | email                 | Amet     | Asutus        |
+-----------+---------+----------+-------------+----------------------+------------+-----------------------+----------+---------------+
|         2 | Kalle   | Kohin    | 38910262497 | Tartu Prna 23-12     |   56789576 | kalle12@hot.ee        | pilane   | Tartu KHK     | 
|         5 | Kati    | Kask     | 49010162558 | Tartu Kopli 1        |   53459878 | kati_k@kool.ee        | juhiabi  | AS T          | 
|        12 | Kevin   | Kivi     | 39006022497 | Tartu Turu 5-12      |   59791547 | kivi@hot.ee           | pilane   | Uus kool      | 
|        17 | Kadri   | Kade     | 48910212197 | Tartu Vru 89         |          0 | kati@kokk.ee          | kokk     | AS Sk ja jook | 
|        18 | Vaiko   | Kook     | 38811202495 | Tartu Pikk 56-10     |    7689898 |                       | autojuht | O auto        | 
|        23 | Kalev   | Komm     | 38809262497 | Tartu Vru 33         | 2147483647 | kalevikomm@komm.com   | mja      | Kommipood     | 
|        27 | Mart    | Karu     | 39112312497 | Tartu Aleksandri 3-2 |  587979797 | mart.karu@teiekool.ee | petaja   | Teie kool     | 
|        28 | Kati    | Karu     | 48901312397 | Tartu Jalaka 23-3    |   74645679 | kati.karu@teiekool.ee | pilane   | Teie kool     | 
+-----------+---------+----------+-------------+----------------------+------------+-----------------------+----------+---------------+
8 rows in set (0.00 sec)

11. Leia lugejad, kelle perenimi algab L või M tähega.
mysql> select * from LUGEJA where left(Perenimi, 1) = 'L' OR left(Perenimi, 1) = 'M';
+-----------+---------+----------+-------------+-------------------+-----------+--------------------+-----------+------------------+
| Lugeja_ID | Eesnimi | Perenimi | Isikukood   | Aadress           | Telefon   | email              | Amet      | Asutus           |
+-----------+---------+----------+-------------+-------------------+-----------+--------------------+-----------+------------------+
|         6 | Malle   | Moos     | 48910012697 | Tartu Vru 54-21   |  56423789 |                    | koristaja | O Kord ja Puhtus | 
|         7 | Mari    | Maasikas | 48810242787 | Tartu Aida 3-14   |  50458977 |                    |           |                  | 
|        14 | Lilli   | Lill     | 48910222497 | Tartu Prna 34     | 487541247 | lilli.lill@kodu.ee | kodune    |                  | 
|        21 | Leo     | Loots    | 38904292497 | Tartu Pepleri 2-1 | 569873223 | loots@maja.ee      | autojuht  | AS Maja          | 
|        22 | Liia    | Lips     | 49111162497 | Tartu Prna 66     |  69876222 | lipsik@lk.ee       | mja       | Riidepood        | 
+-----------+---------+----------+-------------+-------------------+-----------+--------------------+-----------+------------------+
5 rows in set (0.00 sec)

12. Leia lugejad, kelle eesnimi ja perenimi algavad M tähega.
mysql> select * from LUGEJA where left(Eesnimi, 1) = 'M' AND left(Perenimi, 1) = 'M';
+-----------+---------+----------+-------------+-----------------+----------+-------+-----------+------------------+
| Lugeja_ID | Eesnimi | Perenimi | Isikukood   | Aadress         | Telefon  | email | Amet      | Asutus           |
+-----------+---------+----------+-------------+-----------------+----------+-------+-----------+------------------+
|         6 | Malle   | Moos     | 48910012697 | Tartu Vru 54-21 | 56423789 |       | koristaja | O Kord ja Puhtus | 
|         7 | Mari    | Maasikas | 48810242787 | Tartu Aida 3-14 | 50458977 |       |           |                  | 
+-----------+---------+----------+-------------+-----------------+----------+-------+-----------+------------------+
2 rows in set (0.00 sec)

13.Leia lugejad, kes elavad Riia tänaval.
mysql> select * from LUGEJA where Aadress like '%Riia%';
+-----------+---------+----------+-------------+----------------+----------+------------------------+-------------+--------------+
| Lugeja_ID | Eesnimi | Perenimi | Isikukood   | Aadress        | Telefon  | email                  | Amet        | Asutus       |
+-----------+---------+----------+-------------+----------------+----------+------------------------+-------------+--------------+
|         3 | Tiia    | Tuisk    | 49011292497 | Tartu Riia 126 | 50468977 | tiia.tuisk@hotmail.com | petaja      | Meie kool    | 
|        24 | Rita    | Rehv     | 49107232497 | Tartu Riia 120 | 52323424 | rita.rehv@rehvivah.ee  | kassapidaja | Rehvivahetus | 
+-----------+---------+----------+-------------+----------------+----------+------------------------+-------------+--------------+
2 rows in set (0.00 sec)

14. Leia lugejad, kelle ametiks on õpilane (o~pilane).  
mysql> select * from LUGEJA where Amet = 'pilane';
+-----------+---------+----------+-------------+--------------------+------------+-----------------------+--------+-----------+
| Lugeja_ID | Eesnimi | Perenimi | Isikukood   | Aadress            | Telefon    | email                 | Amet   | Asutus    |
+-----------+---------+----------+-------------+--------------------+------------+-----------------------+--------+-----------+
|         2 | Kalle   | Kohin    | 38910262497 | Tartu Prna 23-12   |   56789576 | kalle12@hot.ee        | pilane | Tartu KHK | 
|         4 | Pille   | Pill     | 49110302488 | Tartu Jalaka 12-3  |   51689789 | pillekas@gmail.com    | pilane | Meie kool | 
|        10 | Ragnar  | Roos     | 38911212491 | Tartu              |    7715478 | rax_x@gmail.com       | pilane | Uus kool  | 
|        12 | Kevin   | Kivi     | 39006022497 | Tartu Turu 5-12    |   59791547 | kivi@hot.ee           | pilane | Uus kool  | 
|        25 | Janek   | Jooksik  | 38911222492 | Tartu Raatuse 22-4 |   56787900 | janek@hot.ee          | pilane | Meie kool | 
|        26 | Jane    | Jnes     | 49009162497 | Tartu Piima 12     | 2147483647 | jane321@hot.ee        | pilane | Teie kool | 
|        28 | Kati    | Karu     | 48901312397 | Tartu Jalaka 23-3  |   74645679 | kati.karu@teiekool.ee | pilane | Teie kool | 
+-----------+---------+----------+-------------+--------------------+------------+-----------------------+--------+-----------+
7 rows in set (0.00 sec)
