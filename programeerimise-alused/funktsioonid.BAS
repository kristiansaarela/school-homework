CLS
DO
INPUT "Kui palju numbreid Sa tahaksid sisestada"; ammount
INPUT "mida teed (1 max, 2 min, 3 total, 4avg)"; nr$
  IF ammount < 5000 THEN EXIT DO
LOOP
REDIM nums(ammount)
FOR i = 1 TO ammount
  INPUT "Sisesta number"; q
  nums(i) = q
NEXT

SELECT CASE nr$
	CASE "1"
		'''''  MAX  '''''
		'''''''''''''''''
		max = nums(1)
		FOR i = 1 TO ammount
  			IF nums(i) > max THEN max = nums(i)
		NEXT
		PRINT "Suurim arv on " + STR$(max)

	CASE "2"
		''''' MIN '''''
		'''''''''''''''
		min = nums(1)
		FOR i = 1 TO ammount
			IF nums(i) < min THEN min = nums(i)
		NEXT
		PRINT "Väikseim arv on " + STR$(min)

	CASE "3"
		''''' Tot '''''
		'''''''''''''''
		tot = 0
		FOR i = 1 TO ammount
			tot = tot + nums(i)
		NEXT
		PRINT "Arvude summa on " + STR$(tot)

	CASE "4"
		''''' AVG '''''
		'''''''''''''''
		tot = 0
		FOR i = 1 TO ammount
			tot = tot + nums(i)
		NEXT
		AVG = tot / ammount
		PRINT "Arvude keskmine on " + STR$(AVG)
	CASE ELSE
		PRINT "vale valik"
END SELECT