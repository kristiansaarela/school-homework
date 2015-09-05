# Kontrolltöö nr. 1

Järgnevate ülesannete lahendamiseks kasutage serverit aadressil xxx.xx.xx.xxx ja oma kasutaja nimesid ning parooli. Salvesta antud fail oma kausta  …/AB kasutamine/KT/

Iga ülesande juurde kopeeri sisestatud käsud ja tulemus.

1. (5p) MS Accessi andmebaasis `Avalik/kursuse kaust/AB_kasutamine/KT/Lapsevanem.mdb` on tabel `Lapsevanem`. Too selles olevad andmed oma andmebaasi uude tabelisse `Lapsevanemad` (kasuta tekstifailist andmete sissetoomist). Kirjelda iga sammu andmete üleviimisel koos käskudega MySql andmetabelisse. Sobivate väljadega tabel loo ise.

	```sql
	CREATE TABLE lapsevanem (
		lapsevanema_id INT,
		lapsevanema_nimi VARCHAR(50),
		lapse_nimi VARCHAR(50),
		sugu VARCHAR(1),
		telefon VARCHAR(15),
		linn VARCHAR(20),
		tanav VARCHAR(30)
	);
	```

	> Query OK, 0 rows affected (0.01 sec)

	```sql
	LOAD DATA INFILE '/usr/home/atp08/kristian_s/Lapsevanem.txt'
	INTO TABLE lapsevanem
	FIELDS TERMINATED BY ';'
	LINES TERMINATED BY '\n';
	```

	> Query OK, 11 rows affected, 2 warnings (0.01 sec)

	```sql
	SELECT * FROM lapsevanem;
	```

	| lapsevanema_id | lapsevanema_nimi | lapse_nimi | sugu | telefon  | linn     | tanav         |
	|---------------:|:-----------------|:-----------|:-----|:---------|:---------|:--------------|
	|              1 | Rita Ritsikas    | Jaana      | T    | 7345678  | Tartu    | Aia 23-4      |
	|              2 | Jaanus Nastik    | Jaan       | P    | 5088892  | Tartu    | Juustu 4      |
	|              3 | Jaana Jalaks     | Jaanika    | T    | 7689458  | Tartu    | Kase 4-12     |
	|              4 | Juhan Juss       | Kris       | P    | 53897865 | Tallinn  | Vee 2 -32     |
	|              5 | Riho Roos        | Valli      | T    | 56698879 | Tallinn  | Kollase 2 -23 |
	|              6 | Leho Loos        |            |      | 5669877  | Tallinn  | Kollase 2 -45 |
	|              7 | Kalle Kaun       | Janek      | P    | 78955545 | Tartu    | Piima 23      |
	|              8 | J                | Joonas     | P    | 4588789  | Tartu    | Kuuse 12 - 1  |
	|              9 | Salme Suusk      | Marika     | T    | 5566456  | Viljandi | Kuu 13        |
	|             10 | Juta Jalakas     | Tuuli      | T    | 25566558 | Viljandi | T             |
	|             11 | Reet Roos        | Taavi      | P    | 5698999  | Tallinn  | Tuule 34 -17  |

	> 11 rows in set (0.00 sec)

2. (2p) Lisa lapsevanema tabelisse väli lapse_vanus ja muuda väli sugu ümber väljaks lapse_sugu. Too siia käsud, mille abil eelnevad muutused tegid.

	```sql
	ALTER TABLE lapsevanem
	ADD lapse_vanus INT;
	```

	> Query OK, 11 rows affected (0.02 sec)

	```sql
	ALTER TABLE lapsevanem
	CHANGE sugu lapse_sugu varchar(1);
	```

	> Query OK, 11 rows affected (0.01 sec)

3. (2p) Muuda lapsevanema Leho Loos lapse andmeid, lisa talle poiss nimega Kalle.

	```sql
	UPDATE lapsevanem
	SET
		lapse_nimi = 'Kalle',
		lapse_sugu = 'P'
	WHERE lapsevanema_id = 6;
	```

	> Query OK, 1 row affected (0.00 sec)

4. (2p) Lisa Lapsevanemate tabelisse 1 kirje. Too siia lisamiskäsk. Näita sisestatud andmetega tabelit.

	```sql
	INSERT INTO lapsevanem
	VALUES (12, 'luule rida', 'vahe', 'T', 50480886, 'Tartu', 'kuuu', 12);
	```

	> Query OK, 1 row affected (0.00 sec)

	```sql
	SELECT * FROM lapsevanem;
	```

	| lapsevanema_id | lapsevanema_nimi | lapse_nimi | lapse_sugu | telefon  | linn     | tanav         | lapse_vanus |
	|----------------|------------------|------------|------------|----------|----------|---------------|-------------|
	|              1 | Rita Ritsikas    | Jaana      | T          | 7345678  | Tartu    | Aia 23-4      |        NULL |
	|              2 | Jaanus Nastik    | Jaan       | P          | 5088892  | Tartu    | Juustu 4      |        NULL |
	|              3 | Jaana Jalaks     | Jaanika    | T          | 7689458  | Tartu    | Kase 4-12     |        NULL |
	|              4 | Juhan Juss       | Kris       | P          | 53897865 | Tallinn  | Vee 2 -32     |        NULL |
	|              5 | Riho Roos        | Valli      | T          | 56698879 | Tallinn  | Kollase 2 -23 |        NULL |
	|              6 | Leho Loos        | Kalle      | P          | 5669877  | Tallinn  | Kollase 2 -45 |        NULL |
	|              7 | Kalle Kaun       | Janek      | P          | 78955545 | Tartu    | Piima 23      |        NULL |
	|              8 | J                | Joonas     | P          | 4588789  | Tartu    | Kuuse 12 - 1  |        NULL |
	|              9 | Salme Suusk      | Marika     | T          | 5566456  | Viljandi | Kuu 13        |        NULL |
	|             10 | Juta Jalakas     | Tuuli      | T          | 25566558 | Viljandi | T             |        NULL |
	|             11 | Reet Roos        | Taavi      | P          | 5698999  | Tallinn  | Tuule 34 -17  |        NULL |
	|             12 | luule rida       | vahe       | T          | 50480886 | Tartu    | kuuu          |          12 |

	> 12 rows in set (0.00 sec)

5. (5p) Too failist agentuurid.xls andmed tabelisse agentuurid (kasuta tekstifailist andmete sissetoomist). Kirjelda iga sammu andmete üleviimisel koos käskudega MySql andmetabelisse. Näita sisestatud andmetega tabelit. Sobivate väljadega tabel loo ise.

	```sql
	CREATE TABLE agentuurid (
		firma_id INT,
		firma_nimi VARCHAR(50),
		aadress VARCHAR(50),
		firma_telefon INT,
		mobiiltelefon INT,
		e_kiri VARCHAR(50)
	);
	```

	> Query OK, 0 rows affected (0.01 sec)

	```sql
	LOAD DATA INFILE '/usr/home/atp08/kristian_s/Agentuurid.csv'
	INTO TABLE agentuurid
	FIELDS TERMINATED BY ';'
	LINES TERMINATED BY '\r\n';
	```

	> Query OK, 5 rows affected, 1 warning (0.01 sec)

	```sql
	SELECT * FROM agentuurid;
	```

	| firma_id | firma_nimi          | aadress              | firma_telefon | mobiiltelefon | e_kiri                  |
	|----------|---------------------|----------------------|---------------|---------------|-------------------------|
	|        1 | AS Asendus vanaemad | Tamme 121 Tartu      |             7 |       5148791 | vanaemad@hot.ee         |
	|        2 | OY Beebiabi         | Banaani 12-3 Paide   |       7458919 |       5689728 | beebiabi@abi.ee         |
	|        3 | AS Ponni hoidjad    | Peetri 51 - 24 Narva |       7856298 |       5378945 | ponnid@ponni.ee         |
	|        4 | Lapsehoidjate OY    | Laane 11 Tallinn     |        654548 |       5248977 | lapsehoidjad@hoidjad.ee |
	|        5 | Lastehoiu OY        | Lille 1 Tartu        |        656549 |       5569996 | lastehoiu_ou@firma.ee   |

	> 5 rows in set (0.00 sec)

6. (2p) Muuda kõikide agentuuride nimedes lühend OY lühendiks AS. Too siia vastav käsk. Näita muudetud  andmetega tabelit.

	```sql
	UPDATE agentuurid
	SET firma_nimi = REPLACE(firma_nimi, "OY", "AS")
	WHERE firma_nimi LIKE "%OY%";
	```

	> Query OK, 3 rows affected (0.00 sec)

	```sql
	SELECT * FROM agentuurid;
	```

	| firma_id | firma_nimi          | aadress              | firma_telefon | mobiiltelefon | e_kiri                  |
	|----------|---------------------|----------------------|---------------|---------------|-------------------------|
	|        1 | AS Asendus vanaemad | Tamme 121 Tartu      |             7 |       5148791 | vanaemad@hot.ee         |
	|        2 | AS Beebiabi         | Banaani 12-3 Paide   |       7458919 |       5689728 | beebiabi@abi.ee         |
	|        3 | AS Ponni hoidjad    | Peetri 51 - 24 Narva |       7856298 |       5378945 | ponnid@ponni.ee         |
	|        4 | Lapsehoidjate AS    | Laane 11 Tallinn     |        654548 |       5248977 | lapsehoidjad@hoidjad.ee |
	|        5 | Lastehoiu AS        | Lille 1 Tartu        |        656549 |       5569996 | lastehoiu_ou@firma.ee   |

	> 5 rows in set (0.01 sec)

7. (2p) Väljasta iga linna kohta, millised lapsed selles elavad. (Ühes veerus on linna nimi ja teises komadega eraldatud laste nimed)

	```sql
	SELECT linn,
	GROUP_CONCAT(lapse_nimi) AS nimed
	FROM lapsevanem
	GROUP BY linn;
	```

	| linn     | nimed                                |
	|----------|--------------------------------------|
	| Tallinn  | Taavi,Kris,Valli,Kalle               |
	| Tartu    | Jaana,Joonas,Janek,Jaanika,Jaan,vahe |
	| Viljandi | Marika,Tuuli                         |

	> 3 rows in set (0.01 sec)

8. (3p) Loo tabel Lapsehoidmine, millel on väljad Hoidmise_id, firma_id, lapsevanema_id ja kuupaev. See tabel on seotud tabelitega Lapsevanemad ja agentuurid.

	```sql
	CREATE TABLE lapsehoidmine (
		hoidmise_id INT,
		firma_id INT,
		lapsevanema_id INT,
		kuupaev DATETIME
	);
	```

	> Query OK, 0 rows affected (0.01 sec)

9. (2p) Lisa tabelisse Lapsehoidmine andmed 3 hoidmise kohta.

	```sql
	INSERT INTO lapsehoidmine
	VALUES
		(1, 3, 4, 2009),
		(2,3,2, 2009),
		(3, 5, 5, 2010);
	```

	> Query OK, 3 rows affected, 3 warnings (0.00 sec)

10. (4p) Väljasta laste hoidmised (hoidmise kuupäev, lapsevanema nimi, lapse nimi ja lapsehoidmisfirma nimi).

	```sql
	SELECT
		h.kuupaev,
		l.lapsevanema_nimi,
		l.lapse_nimi,
		a.firma_nimi
	FROM
		lapsehoidmine h,
		lapsevanem l,
		agentuurid a
	WHERE
		l.lapsevanema_id = h.lapsevanema_id AND
		h.firma_id = a.firma_id;
	```

	| kuupaev             | lapsevanema_nimi | lapse_nimi | firma_nimi       |
	|---------------------|------------------|------------|------------------|
	| 0000-00-00 00:00:00 | Jaanus Nastik    | Jaan       | AS Ponni hoidjad |
	| 0000-00-00 00:00:00 | Juhan Juss       | Kris       | AS Ponni hoidjad |
	| 0000-00-00 00:00:00 | Riho Roos        | Valli      | Lastehoiu AS     |

	> 3 rows in set (0.00 sec)


## Hindamine
* 25-28p hinne "5"
* 19–24p hinne "4"
* 14-18p hinne "3"
