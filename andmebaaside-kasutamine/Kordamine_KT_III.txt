Kordamine III kontrolltööks 
1. vaata tabeli AINE_OPILANE olevaid andmeid.

2. Loo uus tabel KESKMINE, milles ühes veerus on kuupäev ja teises veerus hoitakse kõikide hinnete keskmist väärtus. (Andmed keskmise arvutamiseks tuleb võtta tabelist AINE_OPILANE)  
mysql> create table keskmine (kp date not null, keskmine decimal(3, 2) not null);


3. Pane tabelisse KESKMINE esialgsed andmed keskmise hinde kohta. 
mysql> insert into keskmine values (now(), (select avg(hinne) from AINE_OPILANE));

mysql> select * from keskmine;
+------------+----------+
| kp         | keskmine |
+------------+----------+
| 2010-11-03 |     4.08 |
+------------+----------+
1 row in set (0.01 sec)


4. Loo triger, mis lisab tabelisse KESKMINE uue rea keskmise hinde kohta, kui tabelisse AINE_OPILANE lisati uus hinne või muudeti hinnet. 
mysql> create trigger keskminne after update on AINE_OPILANE for each row begin insert into keskmine values (now(), (select avg(hinne) from AINE_OPILANE)); end;//
Query OK, 0 rows affected (0.01 sec)


5. Loo funktsioon, mis etteantud isikukoodi alusel väljastab sünniaja (nt 01.11.10).
mysql> create function ik_to_vanus(ik varchar(10)) returns varchar(10) begin return concat(mid(ik, 6, 2), '.', mid(ik, 4, 2), '.', mid(ik, 2, 2)); end//
Query OK, 0 rows affected (0.00 sec)

mysql> select ik_to_vanus(38911212491);
    -> //
+--------------------------+
| ik_to_vanus(38911212491) |
+--------------------------+
| 21.11.89                 |
+--------------------------+
1 row in set, 1 warning (0.00 sec)


6. Kasuta eelnevalt loodud funktsiooni ja väljasta õpilase ees- ja perenimi ühes veerus ja õpilase sünniaeg teises veerus.

mysql> select concat(eesnimi, ' ', perenimi) as nimi, ik_to_vanus(isikukood) as vanus from OPILANE;
+----------------+----------+
| nimi           | vanus    |
+----------------+----------+
| Kalle Kohin    | 26.10.89 |
| Tiia Tuisk     | 29.11.90 |
| Pille Pill     | 36.10.91 |
| Kati Kask      | 16.10.90 |
| Malle Moos     | 01.10.89 |
| Mari Maasikas  | 24.10.88 |
| Joosep Jalakas | 22.10.88 |
| Tiit Tikk      | 06.12.87 |
| Ragnar Roos    | 21.11.89 |
| Robert Rohi    | 06.06.88 |
| Kevin Kivi     | 02.06.90 |
| Sille Siil     | 26.10.90 |
| Lilli Lill     | 22.10.89 |
| Luisa Tuul     | 16.12.91 |
| Sandra Saar    | 29.12.90 |
| Kadri Kade     | 21.10.89 |
| Vaiko Kook     | 20.11.88 |
| Veiko Vesi     | 02.10.87 |
| Hannes Hein    | 26.12.92 |
| Leo Loots      | 29.04.89 |
| Liia Lips      | 16.11.91 |
| Kalev Komm     | 26.09.88 |
| Rita Rehv      | 23.07.91 |
| Janek Jooksik  | 22.11.89 |
| Jane Jnes      | 16.09.90 |
| Mart Karu      | 31.12.91 |
| Kati Karummm   | 31.01.89 |
+----------------+----------+
27 rows in set, 27 warnings (0.00 sec)
