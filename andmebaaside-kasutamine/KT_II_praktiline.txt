Järgnevate ülesannete lahendamiseks kasutage serverit aadressil 193.40.58.150 ja oma kasutaja nime ning parooli. 

Ülesannete lahendamiseks pakkige lahti fail andmed.sql

Salvesta antud fail oma kausta  …/AB kasutamine/KT/ ja töö lõpetamise järel saada ka õpetajale e-kirjaga.

Iga ülesande juurde kopeeri sisestatud käsud ja tulemus.



1. (3p) Leia, kui palju on meessoost isikuid, kellel on alusharidus? 

mysql> select sum(alusharidus) from MEHED;
+------------------+
| sum(alusharidus) |
+------------------+
|            21966 |
+------------------+
1 row in set (0.00 sec)


2. (3p) Leia, kui palju on naissoost isikuid, kellel on 10-12 klassine haridus.

mysql> select sum(10_12_KL) from NAISED;
+---------------+
| sum(10_12_KL) |
+---------------+
|         19599 |
+---------------+
1 row in set (0.00 sec)

3. (3p) Leia, kui palju on igas vallas inimesi (liida erinevad haridustasemed kokku).

mysql> select a.Koha_nimi, (select sum(alusharidus)+sum(1_6_KL)+SUM(7_9_KL)+SUM(10_12_KL)+SUM(KUTSE_PK_B)+SUM(KUTSE_KK_B)+SUM(KorgH)+SUM(MAGISTER)+SUM(DOKTOR) as km from MEHED where a.Koha_id = koha_id) + (select sum(alusharidus)+sum(1_6_KL)+SUM(7_9_KL)+SUM(10_12_KL)+SUM(KUTSE_PK_B)+SUM(KUTSE_KK_B)+SUM(KorgH)+SUM(MAGISTER)+SUM(DOKTOR) as km from NAISED where a.Koha_id = koha_id) as kokku from KOHAD a limit 0, 20;
+---------------------+-------+
| Koha_nimi           | kokku |
+---------------------+-------+
| Tallinn             | 97122 |
| Kehra linn          |   702 |
| Keila linn          |  2572 |
| Loksa linn          |   743 |
| Maardu linn         |  4159 |
| Paldiski linn       |   992 |
| Saue linn           |  1379 |
| Aegviidu vald       |   180 |
| Anija vald          |   812 |
| Harku vald          |  1894 |
| "Jo~ela""htme vald" |  1415 |
| Keila vald          |   868 |
| Kernu vald          |   355 |
| Kiili vald          |   655 |
| Kose vald           |  1609 |
| Kuusalu vald        |  1172 |
| Ko~ue vald          |   450 |
| Loksa vald          |   372 |
| Nissi vald          |   810 |
| Padise vald         |   423 |
+---------------------+-------+
20 rows in set (0.01 sec)



4. (3p) Leia linnad, kus on rohkem kui 500 alusharidusega inimest.

mysql> select Koha_nimi, (select sum(alusharidus) from MEHED where koha_id = KOHAD.Koha_id)+(select sum(alusharidus) from NAISED where koha_id = KOHAD.Koha_id) as kokku from KOHAD where (select sum(alusharidus) from MEHED where koha_id = KOHAD.Koha_id)+(select sum(alusharidus) from NAISED where koha_id = KOHAD.Koha_id) > 500;
+-----------------------+-------+
| Koha_nimi             | kokku |
+-----------------------+-------+
| Tallinn               | 11039 |
| Maardu linn           |   509 |
| "Kohtla-Ja""rve linn" |  1343 |
| Narva linn            |  2099 |
| "Sillama""e linn"     |   523 |
| Rakvere linn          |   565 |
| "Pa""rnu linn"        |  1540 |
| Kuressaare linn       |   701 |
| Alatskivi vald        |  1896 |
| Vo~ru linn            |   639 |
+-----------------------+-------+
10 rows in set (0.01 sec)


5. (5p) Leia, millises kohas (linnas või vallas) on kõige rohkem kõrgharidusega naisi? Väljasta koht ja naiste arv.

mysql> select KorgH, Koha_nimi FROM KOHAD, NAISED where KOHAD.Koha_id = NAISED.koha_id order by KorgH DESC LImit 0, 1;
+-------+-----------+
| KorgH | Koha_nimi |
+-------+-----------+
| 12232 | Tallinn   |
+-------+-----------+
1 row in set (0.00 sec)

6. (5p) Leia, millises kohas on kõige vähem kutseharidusega (KUTSE_KK_B) mehi. Väljasta koht ja meeste arv
mysql> select KUTSE_KK_B, Koha_nimi FROM KOHAD, MEHED where KOHAD.Koha_id = MEHED.koha_id order by KUTSE_KK_B asc limit 0,1;
+------------+-------------------+
| KUTSE_KK_B | Koha_nimi         |
+------------+-------------------+
|          0 | "Ma""rjamaa vald" |
+------------+-------------------+
1 row in set (0.01 sec)


7. (5p) Leia mitu nii meessoost kui ka naissoost doktori kraadiga isikut on igas vallas. 

mysql> select Koha_nimi, (select DOKTOR from MEHED where koha_id = KOHAD.Koha_id) as mehed, (select DOKTOR from NAISED where koha_id = KOHAD.Koha_id) as naised from KOHAD limit 0, 20;
+---------------------+-------+--------+
| Koha_nimi           | mehed | naised |
+---------------------+-------+--------+
| Tallinn             |   182 |    156 |
| Kehra linn          |     0 |      0 |
| Keila linn          |     6 |      1 |
| Loksa linn          |     0 |      0 |
| Maardu linn         |     3 |      2 |
| Paldiski linn       |     0 |      0 |
| Saue linn           |     5 |      0 |
| Aegviidu vald       |     0 |      0 |
| Anija vald          |     0 |      0 |
| Harku vald          |     6 |      4 |
| "Jo~ela""htme vald" |     2 |      0 |
| Keila vald          |     0 |      0 |
| Kernu vald          |     0 |      0 |
| Kiili vald          |     2 |      0 |
| Kose vald           |     3 |      0 |
| Kuusalu vald        |     2 |      1 |
| Ko~ue vald          |     0 |      0 |
| Loksa vald          |     0 |      1 |
| Nissi vald          |     0 |      0 |
| Padise vald         |     0 |      0 |
+---------------------+-------+--------+
20 rows in set (0.01 sec)


8. (3p) Muuda eelnevat päringut Väljastades vaid need vallad, kus on vähemalt üks doktorikraadiga isik.

mysql> select Koha_nimi, (select DOKTOR from MEHED where koha_id = KOHAD.Koha_id) as mehed, (select DOKTOR from NAISED where koha_id = KOHAD.Koha_id) as naised from KOHAD where (select DOKTOR from MEHED where koha_id = KOHAD.Koha_id) > 0 or (select DOKTOR from NAISED where koha_id = KOHAD.Koha_id) > 0;
+-----------------------+-------+--------+
| Koha_nimi             | mehed | naised |
+-----------------------+-------+--------+
| Tallinn               |   182 |    156 |
| Keila linn            |     6 |      1 |
| Maardu linn           |     3 |      2 |
| Saue linn             |     5 |      0 |
| Harku vald            |     6 |      4 |
| "Jo~ela""htme vald"   |     2 |      0 |
| Kiili vald            |     2 |      0 |
| Kose vald             |     3 |      0 |
| Kuusalu vald          |     2 |      1 |
| Loksa vald            |     0 |      1 |
| Rae vald              |     4 |      1 |
| Saku vald             |     1 |      5 |
| Saue vald             |     3 |      3 |
| Viimsi vald           |     4 |      1 |
| "Ka""rdla linn"       |     0 |      1 |
| "Kohtla-Ja""rve linn" |     1 |      2 |
| Narva linn            |     3 |      5 |
| Narva-Jo~esuu linn    |     0 |      1 |
| "Pu""ssi linn"        |     0 |      1 |
| "Sillama""e linn"     |     1 |      0 |
| Jo~hvi vald           |     0 |      1 |
| "Lu""ganuse vald"     |     1 |      0 |
| Jo~geva linn          |     0 |      3 |
| Mustvee linn          |     1 |      0 |
| Po~ltsamaa linn       |     1 |      1 |
| Jo~geva vald          |     2 |      1 |
| Tabivere vald         |     1 |      0 |
| Paide linn            |     1 |      0 |
| "Tu""ri linn"         |     0 |      1 |
| Haapsalu linn         |     2 |      0 |
| Lihula vald           |     0 |      2 |
| Vormsi vald           |     0 |      1 |
| Kadrina vald          |     0 |      1 |
| Tamsalu vald          |     1 |      0 |
| "Va""ike-Maarja vald" |     1 |      0 |
| Po~lva linn           |     0 |      1 |
| Laheda vald           |     1 |      0 |
| Po~lva vald           |     0 |      1 |
| "Pa""rnu linn"        |     8 |      5 |
| Sauga vald            |     0 |      1 |
| Rapla linn            |     0 |      3 |
| Kehtna vald           |     1 |      0 |
| Kohila vald           |     0 |      1 |
| Kuressaare linn       |     0 |      1 |
| "Lu""manda vald"      |     1 |      0 |
| Elva linn             |     5 |      5 |
| Alatskivi vald        |   226 |      1 |
| Haaslava vald         |     0 |      1 |
| Kambja vald           |     0 |      1 |
| Konguta vald          |     1 |      0 |
| Laeva vald            |     1 |      0 |
| Luunja vald           |     1 |      0 |
| Meeksi vald           |     1 |      0 |
| No~o vald             |     0 |      4 |
| "Peipsia""a""re vald" |     5 |      0 |
| Rannu vald            |     1 |      1 |
| Tartu vald            |     2 |      3 |
| "Ta""htvere vald"     |     3 |      5 |
| Vara vald             |     6 |      0 |
| Vo~nnu vald           |     0 |      1 |
| "u""lenurme vald"     |     1 |      7 |
| To~rva linn           |     5 |      0 |
| Valga linn            |     0 |      1 |
| "Otepa""a"" vald"     |     0 |      2 |
| Palupera vald         |     1 |      0 |
| Po~drala vald         |     1 |      0 |
| Viljandi linn         |     0 |      4 |
| Vo~hma linn           |     3 |      0 |
| Halliste vald         |     1 |      0 |
| Karksi vald           |     0 |      1 |
| Vo~ru linn            |     0 |      2 |
| Haanja vald           |     0 |      1 |
| So~merpalu vald       |     1 |      0 |
| Vastseliina vald      |     0 |      1 |
| Vo~ru vald            |     0 |      1 |
+-----------------------+-------+--------+
75 rows in set (0.00 sec)


9. (5p) Leia tabeli MEHED põhjal kui palju on linnades ja valdades eraldi erineva haridusega inimesi. Väljasta linn/vald ja erinevad haridustasemed ning sellesse kuuluvate inimeste arvud kokku.
mysql> select Koha_nimi, (select alusharidus from MEHED where koha_id = KOHAD.Koha_id) as alusharidus,  (select 1_6_KL from MEHED where koha_id = KOHAD.Koha_id) as 1_6_KL, (select 7_9_KL from MEHED where koha_id = KOHAD.Koha_id) as 7_9_KL, (select 10_12_KL from MEHED where koha_id = KOHAD.Koha_id) as 10_12_KL, (select KUTSE_PK_B from MEHED where koha_id = KOHAD.Koha_id) as KUTSE_PK_B, (select KUTSE_KK_B from MEHED where koha_id = KOHAD.Koha_id) as KUTSE_KK_B, (select KorgH from MEHED where koha_id = KOHAD.Koha_id) as KorgH, (select MAGISTER from MEHED where koha_id = KOHAD.Koha_id) as MAGISTER, (select DOKTOR from MEHED where koha_id = KOHAD.Koha_id) as DOKTOR from KOHAD limit 0,20;
+---------------------+-------------+--------+--------+----------+------------+------------+-------+----------+--------+
| Koha_nimi           | alusharidus | 1_6_KL | 7_9_KL | 10_12_KL | KUTSE_PK_B | KUTSE_KK_B | KorgH | MAGISTER | DOKTOR |
+---------------------+-------------+--------+--------+----------+------------+------------+-------+----------+--------+
| Tallinn             |        5708 |  15030 |   8079 |     4380 |       2770 |        939 |  9657 |      761 |    182 |
| Kehra linn          |          55 |    142 |     86 |       33 |         24 |          9 |    20 |        0 |      0 |
| Keila linn          |         186 |    501 |    231 |      105 |         66 |         11 |   138 |       13 |      6 |
| Loksa linn          |          44 |    162 |     91 |       31 |         24 |          6 |    25 |        0 |      0 |
| Maardu linn         |         241 |    779 |    516 |      159 |        160 |         30 |   140 |        2 |      3 |
| Paldiski linn       |          66 |    208 |     88 |       31 |         17 |          8 |    47 |        3 |      0 |
| Saue linn           |          98 |    215 |    101 |       84 |         39 |          8 |   115 |       16 |      5 |
| Aegviidu vald       |          26 |     28 |     12 |        5 |          3 |          0 |     8 |        0 |      0 |
| Anija vald          |          77 |    196 |     83 |       19 |         32 |          4 |    16 |        0 |      0 |
| Harku vald          |         124 |    350 |    165 |       85 |         42 |          8 |   123 |       18 |      6 |
| "Jo~ela""htme vald" |         117 |    285 |    131 |       74 |         51 |          6 |    62 |        8 |      2 |
| Keila vald          |          67 |    218 |     93 |       28 |         20 |          5 |    17 |        3 |      0 |
| Kernu vald          |          27 |     83 |     30 |       11 |          9 |          2 |     6 |        0 |      0 |
| Kiili vald          |          46 |    136 |     46 |       34 |         14 |          2 |    27 |        9 |      2 |
| Kose vald           |         134 |    317 |    147 |       47 |        108 |          5 |    34 |        3 |      3 |
| Kuusalu vald        |          84 |    263 |    120 |       76 |         14 |          5 |    36 |        4 |      2 |
| Ko~ue vald          |          43 |    109 |     33 |       11 |         13 |          1 |     4 |        0 |      0 |
| Loksa vald          |          19 |     86 |     46 |       17 |          2 |          4 |     9 |        0 |      0 |
| Nissi vald          |          53 |    175 |     77 |       42 |         21 |          3 |    18 |        1 |      0 |
| Padise vald         |          24 |    115 |     37 |       19 |         16 |          1 |     4 |        0 |      0 |
+---------------------+-------------+--------+--------+----------+------------+------------+-------+----------+--------+
20 rows in set (0.01 sec)


10. (5p) Loo vaade Magister, milles näidatakse iga koha kohta mitu meessoost ja mitu naissoost magistrit seal elab.

mysql> create view magister as select Koha_nimi, (select MAGISTER from NAISED where KOHAD.Koha_id = koha_id) as nais, (select MAGISTER from MEHED where KOHAD.Koha_id = koha_id) as mehed FROM KOHAD;

