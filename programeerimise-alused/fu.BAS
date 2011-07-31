CLS
DO
INPUT "Kui palju numbreid Sa tahaksid sisestada"; ammount
  IF ammount < 5000 THEN EXIT DO
LOOP
REDIM nums(ammount)
FOR i = 1 TO ammount
  INPUT "Sisesta number"; q
  nums(i) = q
NEXT

'''''  MAX  '''''
'''''''''''''''''
max = nums(1)
FOR i = 1 TO ammount
  IF nums(i) > max THEN max = nums(i)
NEXT

''''' MIN '''''
'''''''''''''''
min = nums(1)
FOR i = 1 TO ammount
  IF nums(i) < min THEN min = nums(i)
NEXT

''''' Tot '''''
'''''''''''''''
tot = 0
FOR i = 1 TO ammount
  tot = tot + nums(i)
NEXT

''''' AVG '''''
'''''''''''''''
AVG = tot / ammount

PRINT STR$(tot) + " - Kokku"
PRINT STR$(max) + " - MAX"
PRINT STR$(min) + " - MIN"
PRINT STR$(AVG) + " - AVG"
