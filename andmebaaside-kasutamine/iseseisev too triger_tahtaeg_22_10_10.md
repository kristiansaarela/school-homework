# ISESEISEV TÖÖ AINES ANDMEBAASIDE KASUTAMINE
	## TÄHTAEG: 22.10.2010
		Iseseisev töö tuleb saata õpetajale e-kirjaga.

	#### Töö vormistamine:
		1. Näidata, millised tabelid loodi.
		2. Näidata tabeleid esialgsete andmetega.
		3. Missugused triger(-id) loodi.
		4. Näidata andmebaasi erinevaid testimise tulemusi. Testi tulemused peaksid näitama, et hääletusssteem töötab korrektselt.

# ÜLESANNE:

	1. Loo hääletussüsteem (andmebaas).
		```SQL
		create database kristiansaarela_vote;
		```
		*Query OK, 1 row affected (0.01 sec)*

		```SQL
		create table haaletus (
			h_id int not null auto_increment,
			eesnimi varchar(15),
			perenimi varchar(15),
			haaletuse_aeg datetime,
			otsus set('poolt', 'vastu'),
			primary key(h_id)
		);
		```
		*Query OK, 0 rows affected (0.01 sec)*

		```SQL
		create table tulemused (
			id int auto_increment primary key,
			haaletanute_arv int,
			alguse_aeg datetime,
			poolt int,
			vastu int
		);
		```
		*Query OK, 0 rows affected (0.01 sec)*

		```SQL
		create table logi(
			h_id int,
			haaletuse_aeg datetime,
			otsus set('poolt', 'vastu'),
			t_id int,
			foreign key (h_id) references haaletus.h_id,
			foreign key (t_id) references tulemused.id
		);
		```
		*Query OK, 0 rows affected (0.00 sec)*


	2. Hääletamises osalevad 11 inimest.
		```SQL
		select * from haaletus;
		```

		| h_id | eesnimi  | perenimi  | haaletuse_aeg       | otsus |
		|-----:|----------|-----------|---------------------|------:|
		|    1 | jyrgen   | luik      | 0000-00-00 00:00:00 | NULL  |
		|    2 | toomas   | sepp      | 0000-00-00 00:00:00 | NULL  |
		|    3 | kalle    | kulp      | 0000-00-00 00:00:00 | NULL  |
		|    4 | siiri    | tulp      | 0000-00-00 00:00:00 | NULL  |
		|    5 | marge    | simpson   | 0000-00-00 00:00:00 | NULL  |
		|    6 | chris    | chriffin  | 0000-00-00 00:00:00 | NULL  |
		|    7 | peter    | chriffin  | 0000-00-00 00:00:00 | NULL  |
		|    8 | homer    | simpson   | 0000-00-00 00:00:00 | NULL  |
		|    9 | joe      | cleveland | 0000-00-00 00:00:00 | NULL  |
		|   10 | jyri     | ratas     | 0000-00-00 00:00:00 | NULL  |
		|   11 | kuningas | kristian  | 0000-00-00 00:00:00 | NULL  |

		*11 rows in set (0.01 sec)*


	3. Üks hääletamine kestab 5 minutit ja hääletaja saab olla kas 'poolt' või 'vastu'.
		```SQL
		select * from tulemused;
		```

		| id | haaletanute_arv | alguse_aeg          | poolt | vastu |
		|---:|----------------:|---------------------|------:|------:|
		|  1 |            NULL | 2010-10-15 11:05:21 |  NULL |  NULL |

		*1 row in set (0.00 sec)*

		```SQL
		create trigger haaleta before update on haaletus

		for each row

		begin

			if date_add((select alguse_aeg from tulemused), interval 5 minute) > now() then

			begin

				if OLD.otsus != NEW.otsus or OLD.otsus is null then

				begin

					insert into logi values (OLD.h_id, now(), NEW.otsus, null);



					if OLD.otsus is null then

						update tulemused set haaletanute_arv = haaletanute_arv+1 where id = 1;

					end if;



					if OLD.otsus = 'poolt' then

						update tulemused set poolt = poolt-1 where id = 1;

					elseif OLD.otsus = 'vastu' then

						update tulemused set poolt = poolt+1 where id = 1;

					end if;



					if NEW.otsus = 'poolt' then

						update tulemused set poolt = poolt+1 where id = 1;

					elseif NEW.otsus = 'vastu' then

						update tulemused set vastu = vastu+1 where id = 1;

					end if;

				end;

				end if;

			else

				insert into logi values (OLD.h_id, now(), NEW.otsus, null);

			end;

			end if;

		end;//
		```


mysql> delimiter //

create trigger haaleta before update on haaletus for each row begin if date_add((select alguse_aeg from tulemused), interval 5 minute) > now() then begin if OLD.otsus != NEW.otsus or OLD.otsus is null then begin insert into logi values (OLD.h_id, now(), NEW.otsus, null); if OLD.otsus is null then update tulemused set haaletanute_arv = haaletanute_arv+1 where id = 1; end if; if OLD.otsus = 'poolt' then update tulemused set poolt = poolt-1 where id = 1; elseif OLD.otsus = 'vastu' then update tulemused set poolt = poolt+1 where id = 1; end if; if NEW.otsus = 'poolt' then update tulemused set poolt = poolt+1 where id = 1; elseif NEW.otsus = 'vastu' then update tulemused set vastu = vastu+1 where id = 1; end if; end; end if; end; end if; end;//





*Hääletaja võib 5 minuti jooksul oma hääletustulemust muuta.

*Kõik otsused hääletamisel kajastuvad LOGI tabelis kellaajaliselt.

*Peale 5 minutit ei tohi enam lõplikud tulemused ja ka iga isiku otsus muutuda, kuigi kasutajad saavad hääletada edasi.



Tabelis HAALETUS on andmed hääletaja kohta (ees- ja perenimi), hääletuse aeg, otsus ('poolt','vastu').

Tabelis TULEMUSED on hääletanute arv, h_alguse_aeg ja poolt häälte arv ja vastu häälte arv.

Tabelis LOGI kuvatakse kõik muutused hääletamisel, mis oleks hiljem vajalikud hääletustulemuse õigsuse tõestamiseks.



mysql> show tables;

+--------------------------------+

| Tables_in_kristiansaarela_vote |

+--------------------------------+

| haaletus                       |

| logi                           |

| tulemused                      |

+--------------------------------+

3 rows in set (0.00 sec)





mysql> select * from haaletus;

+------+----------+-----------+---------------------+-------+

| h_id | eesnimi  | perenimi  | haaletuse_aeg       | otsus |

+------+----------+-----------+---------------------+-------+

|    1 | jyrgen   | luik      | 0000-00-00 00:00:00 | NULL  |

|    2 | toomas   | sepp      | 0000-00-00 00:00:00 | NULL  |

|    3 | kalle    | kulp      | 0000-00-00 00:00:00 | NULL  |

|    4 | siiri    | tulp      | 0000-00-00 00:00:00 | NULL  |

|    5 | marge    | simpson   | 0000-00-00 00:00:00 | NULL  |

|    6 | chris    | chriffin  | 0000-00-00 00:00:00 | NULL  |

|    7 | peter    | chriffin  | 0000-00-00 00:00:00 | NULL  |

|    8 | homer    | simpson   | 0000-00-00 00:00:00 | NULL  |

|    9 | joe      | cleveland | 0000-00-00 00:00:00 | NULL  |

|   10 | jyri     | ratas     | 0000-00-00 00:00:00 | NULL  |

|   11 | kuningas | kristian  | 0000-00-00 00:00:00 | NULL  |

+------+----------+-----------+---------------------+-------+

11 rows in set (0.00 sec)







mysql> select * from tulemused;

+----+-----------------+---------------------+-------+-------+

| id | haaletanute_arv | alguse_aeg          | poolt | vastu |

+----+-----------------+---------------------+-------+-------+

|  1 |               0 | 2010-10-22 11:10:33 |     0 |     0 |

+----+-----------------+---------------------+-------+-------+

1 row in set (0.00 sec)





mysql> update haaletus set haaletuse_aeg = now(), otsus = 'vastu' where h_id = 2 or h_id = 4 or h_id = 6 or h_id = 8 or h_id = 10;                               -> //

Query OK, 5 rows affected (0.00 sec)

Rows matched: 5  Changed: 5  Warnings: 0



mysql> update haaletus set haaletuse_aeg = now(), otsus = 'poolt' where h_id = 1 or h_id = 3 or h_id = 5 or h_id = 9 or h_id = 11;

Query OK, 5 rows affected (0.01 sec)

Rows matched: 5  Changed: 5  Warnings: 0



mysql> select * from tulemused;

+----+-----------------+---------------------+-------+-------+

| id | haaletanute_arv | alguse_aeg          | poolt | vastu |

+----+-----------------+---------------------+-------+-------+

|  1 |              10 | 2010-10-22 11:30:32 |     5 |     5 |

+----+-----------------+---------------------+-------+-------+

1 row in set (0.00 sec)





mysql> update haaletus set haaletuse_aeg = now(), otsus = 'poolt' where h_id = 7;

Query OK, 1 row affected (0.00 sec)

Rows matched: 1  Changed: 1  Warnings: 0



mysql> select * from tulemused;

+----+-----------------+---------------------+-------+-------+

| id | haaletanute_arv | alguse_aeg          | poolt | vastu |

+----+-----------------+---------------------+-------+-------+

|  1 |              11 | 2010-10-22 11:30:32 |     6 |     5 |

+----+-----------------+---------------------+-------+-------+

1 row in set (0.00 sec)





mysql> select * from logi;

+------+---------------------+-------+------+

| h_id | haaletuse_aeg       | otsus | t_id |

+------+---------------------+-------+------+

|    2 | 2010-10-22 11:31:27 | vastu | NULL |

|    4 | 2010-10-22 11:31:27 | vastu | NULL |

|    6 | 2010-10-22 11:31:27 | vastu | NULL |

|    8 | 2010-10-22 11:31:27 | vastu | NULL |

|   10 | 2010-10-22 11:31:27 | vastu | NULL |

|    1 | 2010-10-22 11:32:33 | poolt | NULL |

|    3 | 2010-10-22 11:32:33 | poolt | NULL |

|    5 | 2010-10-22 11:32:33 | poolt | NULL |

|    9 | 2010-10-22 11:32:33 | poolt | NULL |

|   11 | 2010-10-22 11:32:33 | poolt | NULL |

|    7 | 2010-10-22 11:33:30 | poolt | NULL |

+------+---------------------+-------+------+

11 rows in set (0.00 sec)











peale 5 minutit



mysql> select * from tulemused;

+----+-----------------+---------------------+-------+-------+

| id | haaletanute_arv | alguse_aeg          | poolt | vastu |

+----+-----------------+---------------------+-------+-------+

|  1 |              11 | 2010-10-22 11:30:32 |     6 |     5 |

+----+-----------------+---------------------+-------+-------+

1 row in set (0.00 sec)



mysql> select * from haaletus;

+------+----------+-----------+---------------------+-------+

| h_id | eesnimi  | perenimi  | haaletuse_aeg       | otsus |

+------+----------+-----------+---------------------+-------+

|    1 | jyrgen   | luik      | 2010-10-22 11:32:33 | poolt |

|    2 | toomas   | sepp      | 2010-10-22 11:31:27 | vastu |

|    3 | kalle    | kulp      | 2010-10-22 11:32:33 | poolt |

|    4 | siiri    | tulp      | 2010-10-22 11:31:27 | vastu |

|    5 | marge    | simpson   | 2010-10-22 11:32:33 | poolt |

|    6 | chris    | chriffin  | 2010-10-22 11:31:27 | vastu |

|    7 | peter    | chriffin  | 2010-10-22 11:33:30 | poolt |

|    8 | homer    | simpson   | 2010-10-22 11:31:27 | vastu |

|    9 | joe      | cleveland | 2010-10-22 11:32:33 | poolt |

|   10 | jyri     | ratas     | 2010-10-22 11:31:27 | vastu |

|   11 | kuningas | kristian  | 2010-10-22 11:32:33 | poolt |

+------+----------+-----------+---------------------+-------+

11 rows in set (0.00 sec)



mysql> update haaletus set otsus = 'vastu', haaletuse_aeg = now() where h_id = 11;

Query OK, 1 row affected (0.01 sec)

Rows matched: 1  Changed: 1  Warnings: 0



mysql> select * from tulemused;

+----+-----------------+---------------------+-------+-------+

| id | haaletanute_arv | alguse_aeg          | poolt | vastu |

+----+-----------------+---------------------+-------+-------+

|  1 |              11 | 2010-10-22 11:30:32 |     6 |     5 |

+----+-----------------+---------------------+-------+-------+

1 row in set (0.01 sec)

