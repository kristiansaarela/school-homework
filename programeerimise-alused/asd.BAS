PRINT "See programm aitab �ppida korrutustabelit"
INPUT "Mis arvuga korrutame"; ARV

algus: 'see on ream�rgend 

FOR I = 1 TO 10
tagasi: 'see on ream�rgend 
 PRINT ARV; "*"; I; "="; 'kirjutame tehte... 
 INPUT VASTUS            '...ootame vastust 

 'kui vastus on vale, siis 
 'teatame sellest ning kirjutame tehte uuesti. 
 IF ARV * I <> VASTUS THEN
   PRINT "Vale! Proovi uuesti!"
   Valesid = Valesid + 1'loendame valesid vastuseid 
   GOTO tagasi
 END IF

'siia j�uab programmi t�itmisj�rg �ksnes siis, 
'kui vastus oli l�puks �ige 
NEXT I


'siin kontrollitakse kas kasutaja tegi vigu v�i mitte 
IF Valesid <> 0 THEN
 CLS
 PRINT "Tegid vigu. Alustame uuesti!"

 'nullime valede vastuste loenduri 
 'j�rgmise korra jaoks 
 Valesid = 0
 GOTO algus
END IF

'siia j�uab programmi t�itmisj�rg �ksnes siis, 
'kui k�ik k�mme vastust olid j�rjest �iged 
PRINT "Head p�eva!"
