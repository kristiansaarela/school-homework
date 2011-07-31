KONTROLLTÖÖ AINES ANDMEBAASIDE KASUTAMINE

Sisesta kasutatud käsud ja näita funktsiooni tööd.

1. Loo funktsioon, mis muudab etteantud kaalu grammides kaaluks kilogrammides. (Kasuta tabelit Synnid) 
mysql> create function kg(kaal int) returns decimal(4, 2) begin return(round(kaal/1000, 2)); end//
Query OK, 0 rows affected (0.01 sec)

mysql> select kg(Synnikaal) from SYNNID;
+---------------+
| kg(Synnikaal) |
+---------------+
|          2.39 |
|          3.74 |
|          3.54 |
|          2.92 |
|          2.61 |
|          2.46 |
|          2.47 |
|          3.15 |
|          2.65 |
|          3.55 |
|          3.74 |
|          3.85 |
|          3.45 |
|          3.29 |
|          4.04 |
|          3.25 |
|          4.14 |
|          3.33 |
|          3.76 |
|          2.71 |
|          3.06 |
|          2.82 |
|          3.50 |
|          2.76 |
|          3.40 |
|          4.35 |
|          3.15 |
|          3.46 |
|          3.88 |
|          3.67 |
|          3.67 |
|          4.84 |
|          3.67 |
|          3.17 |
|          3.09 |
|          3.64 |
|          4.10 |
|          3.54 |
|          3.40 |
|          3.99 |
|          4.06 |
|          3.19 |
|          3.91 |
|          4.08 |
|          4.04 |
|          3.91 |
|          3.10 |
|          3.41 |
|          4.60 |
|          3.80 |
|          3.78 |
|          7.81 |
+---------------+
52 rows in set (0.00 sec)


2. Loo funktsioon, mis suurendab etteantud arvu 100 korda. (Arv anna ise funktsioonile ette)
mysql> create function sada_korda_suurem(arv int) returns int begin return arv*100; end//
Query OK, 0 rows affected (0.00 sec)

mysql> select sada_korda_suurem(50);
+-----------------------+
| sada_korda_suurem(50) |
+-----------------------+
|                  5000 |
+-----------------------+
1 row in set (0.00 sec)

3. Loo triger, mis peale tabelisse RAAMAT andmete lisamist, lisab tabelisse vanim_uusim andmed (pealkiri +autor) kõige uuema ja kõige vanema raamatu kohta ning lisab ka sisestamise kuupäeva. Tabel uusim_vanim loo ise.
mysql> create table uusim_vanem(pealkiri varchar(50), autor varchar(50), aeg date)//
Query OK, 0 rows affected (0.04 sec)

mysql> create trigger hakka_toole after insert on RAAMAT for each row begin insert into uusim_vanem values ((select Autor from RAAMAT where Aasta = (select min(Aasta) from RAAMAT)), (select Aasta from RAAMAT where Aasta = (select min(Aasta) from RAAMAT)), curdate()), ((select Autor from RAAMAT where Aasta = (select max(Aasta) FROM RAAMAT)), (select Aasta from RAAMAT where Aasta = (select max(Aasta) from RAAMAT)), curdate()); end; //
Query OK, 0 rows affected (0.00 sec)

mysql> insert into RAAMAT values (43, 'fhm', 'kristian', 1820, 'poltsamaa', 52, 'eesti', 50);


mysql> insert into RAAMAT values (null, 'fhm', 'kristian', 2008, 'poltsamaa', 52, 'eesti', 50);
    -> //
Query OK, 1 row affected (0.01 sec)

mysql> select * from uusim_vanem//
+---------------+-------+------------+
| pealkiri      | autor | aeg        |
+---------------+-------+------------+
| A.H.Tammsaare | 1920  | 2010-11-04 |
| kristian      | 2008  | 2010-11-04 |
+---------------+-------+------------+
8 rows in set (0.00 sec)

4. Loo triger, mis käivitub tabelis RAAMAT andmete muutmisel. Trigeri ülesandeks on väljastada kõik muudetava raamatu autori poolt kirjutatud raamatud.
mysql> create table logggi ( autor varchar(50), nr int, aeg date)//
Query OK, 0 rows affected (0.00 sec)

mysql> create trigger luts after update on RAAMAT for each row begin insert into logggi values (NEW.Autor, (select count(Pealkiri) from RAAMAT where Autor = NEW.Autor), curdate()); end//
Query OK, 0 rows affected (0.01 sec)

mysql> update RAAMAT set Keel = 'taani' where Pealkiri = 'fhm'//
Query OK, 0 rows affected (0.01 sec)
Rows matched: 1  Changed: 0  Warnings: 0

mysql> select * from logggi//
+--------+------+------------+
| autor  | nr   | aeg        |
+--------+------+------------+
| soccer |    1 | 2010-11-04 |
+--------+------+------------+
1 row in set (0.00 sec)
