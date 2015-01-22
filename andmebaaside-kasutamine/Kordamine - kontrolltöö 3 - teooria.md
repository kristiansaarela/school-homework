Kordamisküsimused

1. Transaktsioon - mõiste, tööpõhimõte, näide transaktsioonist.

Tehing lõpetatakse ja andmebaasi muudatused on alalised alles siis, kui kogu tehing on edukalt lõpule viidud. 

Et tehingut saaks lugeda edukalt toimunuks ja andmebaasi võiks teha alalisi muudatusi, peavad kõik need sammud olema lõpetatud. 
Senikaua peab olema võimalus andmebaasi muudatusi tagasi pöörata. 


Näide tehingust:
	ostja esitab telefoni teel kataloogikauba tellimuse ja tema esindaja sisestab selle arvutisse. 
	Tehing sisaldab 
laoseisu andmebaasi kontrollimist, 
tellitud kauba olemasolu kinnitust, 
tellimuse vastuvõtmist, 
tellimuse vastuvõtmise kinnitust ja kauba eeldatavat väljastamisaega. 


2. Triger - definitsioon. Milliste käskude korral tööle hakkab? Trigeri aeg, kuna kasutada after, kuna before.

Tegevus, mis põhjustab protseduuri automaatse käivitumise, näit. viitetervikluse säilitamiseks. 
Triger käivitub, kui kasutaja üritab andmebaasis sisalduvaid andmeid muuta lisamise (insert) , 
kustutamise (delete) või värskendamise (update) käsu abil. 

AFTHER - Peale käsku
Before - Enne käsku

3. Indeksid, millise käsuga lisatakse uuele tabelile indekseid, millise käsuga muudetakse tabelit, lisades indekseid.

    * Väldi liigsete indeksite loomist. Indeksid mõjutavad otseselt INSERT, UPDATE ja DELETE päringute jõudlust, sest nende päringute korral tuleb enamasti muuta ka indekseid. Seegam, mida väiksema arvu indeksitega saab läbi, seda parem. Olen kuulnud soovitust, et üle nelja või viie indeksi pole tabeli kohta mõtet luua. Samas ma ei jaga seda soovitust eriti. Indekseid tuleb teha nii palju, kui neid on vaja.
       
    * Kahe samasuguse indeksi loomisel pole mõtet. Tõepoolest, mida annaks meile meie käsiraamatu juures juurde see, kui seal oleks peale ühe märksõnade registri veel teine, mis on täpselt samasugune? Ma arvan, et midagi ei annaks juurde.
       
    * Hoia indeksid nii “kitsad” kui võimalik. Kitsas tähendab siinkohal seda, et mida vähem välju indeksis, seda parem. Mida rohkem on indeksis välju, seda rohkem nõuab ressurssi indeksite muutmine. Samuti on päringute jõudluse seisukohalt oluline, et indeksid ei sisaldaks kasutut ballasti veergude näol, mida päringud ei kasuta.
       
    * “Staatilistele” tabelitele võib luua rohkem indekseid kui tihti muutuvatele tabelitele. See vist on kõigile selge, miks see nii on. Vähe muutuvate tabelite indeksid muutuvad ka vähe ning kui vastavatele tabelitele on vaja luua mitmeid indekseid, siis võib seda suhteliselt muretult teha.



4. Milliseid välju peab indekseerima?

# Indekseerida on soovitatav veerud, mida kasutatakse WHERE, ORDER BY, GROUP BY ja DISTINCT klauslites.
 
# Väldi indeksite loomist char ja varchar tüüpi väljadele. Kui vähegi võimalik, loo indeksid ainult täisarvulistele väljadele, sest nende kaudu on näiteks tabelite sidumine kõige kiirem. char ja varchar tüüpi väljadele loodud indeksite uuendamine INSERT, UPDATE ja DELETE päringute järel on oluliselt ressursinõudlikum kui täisarvulist tüüpi veergude indeksite uuendamine. NB! Siinkohal ma ei taha öelda, et tekstilistele väljadele indekseid üldse ei tohiks luua.
 
# Kui võimalik, siis ära kasuta primaarvõtme väljades reaalarvulisi veerutüüpe. Reaalarvuliste veergude kontrollimine ja indekseerimine on ressursinõudlikum kui täisarvuliste väljade kontrollimine ja indekseerimine.



5. Milliseid samme peab tegema, et andmebaasi tööd optimeerida?

I.	Normaliseerimine

II.	Seostamine

III.	Indeksid

IV.	Jälgimine