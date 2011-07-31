PRINT "See programm aitab õppida korrutustabelit"
INPUT "Mis arvuga korrutame"; ARV

algus: 'see on reamärgend 

FOR I = 1 TO 10
tagasi: 'see on reamärgend 
 PRINT ARV; "*"; I; "="; 'kirjutame tehte... 
 INPUT VASTUS            '...ootame vastust 

 'kui vastus on vale, siis 
 'teatame sellest ning kirjutame tehte uuesti. 
 IF ARV * I <> VASTUS THEN
   PRINT "Vale! Proovi uuesti!"
   Valesid = Valesid + 1'loendame valesid vastuseid 
   GOTO tagasi
 END IF

'siia jõuab programmi täitmisjärg üksnes siis, 
'kui vastus oli lõpuks õige 
NEXT I


'siin kontrollitakse kas kasutaja tegi vigu või mitte 
IF Valesid <> 0 THEN
 CLS
 PRINT "Tegid vigu. Alustame uuesti!"

 'nullime valede vastuste loenduri 
 'järgmise korra jaoks 
 Valesid = 0
 GOTO algus
END IF

'siia jõuab programmi täitmisjärg üksnes siis, 
'kui kõik kümme vastust olid järjest õiged 
PRINT "Head päeva!"
