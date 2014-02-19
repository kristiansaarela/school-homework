# Mõtlemiseks!

1. Loo tabel, milles on 2 veergu: id integer ja aeg datetime tüüpi.
```SQL
CREATE TABLE motlemiseks (
	id INT,
	aeg DATETIME
);
```

2. Sisesta tabelisse 3-4 rida.
```SQL
INSERT INTO motlemiseks VALUES
	(1, '2009-12-01 22:59:59'),
	(2, '2010-05-13 12:45:12'),
	(3, '2005-12-11 04:12:45'),
	(4, '2000-03-02 06:02:00');
```

3. Muuta veergu aeg nii, et muudetakse ajaosa aga kuupäeva osa jääb samaks.
 * proovi muuta ajaosa vajaliku käsuga.
```SQL
UPDATE
	motlemiseks
SET
	aeg = (CONCAT(DATE(aeg),' 08:30:00'))
WHERE
	id = 2;
```
*Query OK, 1 row affected (0.00 sec)*
*Rows matched: 1  Changed: 1  Warnings: 0*

```SQL
SELECT * FROM motlemiseks;
```

| id   | aeg                 |
|-----:|---------------------|
|    1 | 2009-12-01 22:59:59 |
|    2 | 2010-05-13 08:30:00 |
|    3 | 2005-12-11 04:12:45 |
|    4 | 2000-03-02 06:02:00 |
*4 rows in set (0.00 sec)*