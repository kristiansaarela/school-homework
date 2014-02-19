# Description

Some homework I found in my computer and in school network.
Mostly database related and few programming tasks I made.

# Author
Kristian Saarela
Tartu KHK
2008-2011

# Markdown test
1. ###Teata iga linna kohta selle linna kõige noorema lapse nimi.
```SQL
SELECT
	li.Nimi,
	MIN(YEAR(CURDATE()) - synnaasta) AS noorim
FROM
	laps l,
	LINN li
WHERE
	l.synnilinn = li.LinnID
GROUP BY
	li.Nimi;
```
+---------+--------+
| Nimi    | noorim |
+---------+--------+
| Tallinn |     13 |
| Tartu   |     13 |
+---------+--------+

*2 rows in set (0.00 sec)*