K�ik sisestaud k�sud ja tulemused kopeeri sellele t��lehele.

K�ivita oma andmebaasis fail kool.sql


1. Millistes ainetes pole �pilased �htegi hinnet saanud?

mysql> SELECT a.nimetus FROM AINE a LEFT JOIN AINE_OPILANE o ON a.a_kood = o.aine_kood WHERE o.hinne IS NULL;

+-----------------------------------------+
| nimetus                                 |
+-----------------------------------------+
| Kutsealane inglise keel                 | 
| Adobe Illustratori kasutamine           | 
| Adobe Photoshopi kasutamine             | 
| Dekoratiivviimistlus-tehnikad           | 
| Dieettoitlustamine                      | 
| Dokumendi- ja arhiivihaldus             | 
| Dokumendihalduspraktika                 | 
| Eelarveline raamatupidamine             | 
| Eesti keel                              | 
| Eesti maastikud                         | 
| Eesti rekreatsioonigeograafia           | 
| Eesti turismigeograafia                 | 
| Eesti kossteemid                        | 
| Eetika alused                           | 
| Ehitamise alused                        | 
| Ehitamise phialused                     | 
| Ehitiste konstruktsioonid               | 
| Ehituse alused                          | 
| Ehituskonstruktsioonid                  | 
| Ehitusmdistamine                        | 
| Ehitusmdistamine ja mrkimine            | 
| Ehitusrenoveerimise alused              | 
| Ehitustriistad ja pinnattlus            | 
| e-kaubandus                             | 
| Eksam                                   | 
| Eksamid, kursusetd                      | 
| EL majandus ja tturg                    | 
| Elektripetus                            | 
| Elektroonika alused                     | 
| Elektrotehnika                          | 
| Elektrotehnika ja automaatika elemendid | 
| Enesearengu kursus                      | 
| Enesevljendus                           | 
| Eriala toetav eesti keel                | 
| Eriala toetav inglise keel              | 
| Eriala toetav keh.kasv                  | 
| Eriala toetav saksa keel                | 
| Eritoitumine                            | 
| Esitluse loomine                        | 
| Esitlusgraafika ja multimeedia          | 
| Esmaabi                                 | 
| e-teenused                              | 
| Etikett                                 | 
| Ettevtlus ja turundus                   | 
| Ettevtluse alused                       | 
| Ettevttepraktika                        | 
| EUCIPi eksamiks valmistumine            | 
| Euroopa turismigeograafia               | 
| Failihaldus                             | 
| Finantsanals                            | 
| Finantsraamatupidamine                  | 
| Finantsraamatupidamine arvutil          | 
| Finantsvahendus                         | 
| Fsika                                   | 
+-----------------------------------------+
54 rows in set (0.00 sec)





2. V�ljasta nende �pilaste ees- ja perenimi, kes on saanud hindeid.



mysql> select o.eesnimi, o.perenimi from OPILANE o left join AINE_OPILANE a on o.isikukood = a.o_isikukood where a.hinne is not null;

+---------+----------+

| eesnimi | perenimi |

+---------+----------+

| Mari    | Maasikas | 

| Joosep  | Jalakas  | 

| Tiit    | Tikk     | 

| Ragnar  | Roos     | 

| Robert  | Rohi     | 

| Kevin   | Kivi     | 

| Sille   | Siil     | 

| Lilli   | Lill     | 

| Luisa   | Tuul     | 

| Sandra  | Saar     | 

| Kadri   | Kade     | 

| Vaiko   | Kook     | 

| Veiko   | Vesi     | 

| Hannes  | Hein     | 

| Leo     | Loots    | 

| Liia    | Lips     | 

| Kalev   | Komm     | 

| Rita    | Rehv     | 

| Janek   | Jooksik  | 

| Jane    | Jnes     | 

| Mart    | Karu     | 

| Kati    | Karummm  | 

| Kalle   | Kohin    | 

| Tiia    | Tuisk    | 

+---------+----------+

24 rows in set (0.01 sec)





3. Mitu on selliseid �pilasi?



24 rows in set (0.01 sec)



4. V�ljasta hinnatud ained, hinded ja �petajad, kes on ainet hinnanud.



mysql> select a.nimetus, ao.hinne, concat_ws(' ', o.eesnimi, o.perenimi) from AINE a left join AINE_OPILANE ao on a.a_kood = ao.aine_kood left join OPETAJA o on o.opetaja_isikuk = ao.opetaja_kood where ao.hinne is not null;

+------------------------------------------------+-------+---------------------------------------+

| nimetus                                        | hinne | concat_ws(' ', o.eesnimi, o.perenimi) |

+------------------------------------------------+-------+---------------------------------------+

| Aedvilja ttlemise tehn.                        | 3     | Olga Kask                             | 

| Aedvilja ttlemise tehnoloogia                  | 4     | Oliver Kuusk                          | 

| Ajalugu                                        | 4     | Pille Katus                           | 

| Alternatiivsed kontoritpaketid                 | 5     | Piret Siil                            | 

| Andmebaasid                                    | 5     | Piret Karu                            | 

| Andmebaaside alused                            | 5     | Priit Rebane                          | 

| Andmebaaside projekteerimine                   | 5     | Priit Jnes                            | 

| Andmebaaside projekteerimine ja haldus         | 5     | Sirje Koer                            | 

| Andmeturbe alused                              | 3     | Sirje Kass                            | 

| Andmeturve                                     | 3     | Sirje Rebane                          | 

| Andmettlus ja statistika                       | 3     | Sirje Mnd                             | 

| Arhiivinduse alused                            | 3     | Tarmo Saar                            | 

| Arvutipetus                                    | 5     | Tauno Kuusik                          | 

| Asjaajamine                                    | 5     | Terje Tamm                            | 

| Asjaajamisse alused                            | 5     | Thea Tammik                           | 

| Avalik esinemine                               | 3     | Tiina Lilleaed                        | 

| Baarit                                         | 4     | Tiit Lilleaed                         | 

| Betoonitd                                      | 4     | Tiiu Rohi                             | 

| Bioloogia                                      | 4     | Toomas Leht                           | 

| Catering                                       | 4     | Triin Oks                             | 

| CCNA1-arvutivrkude alused                      | 5     | Tuuliki Kadaks                        | 

| CCNA2-ruuterite ja marsruutimise alused        | 4     | Urmas Okas                            | 

| CCNA3-Kommunikatsiooni alused ja marsruutimine | 3     | Viia Mgi                              | 

| CCNA4-Laivrgu tehnoloogiad                     | 4     | Vilve Org                             | 

+------------------------------------------------+-------+---------------------------------------+

24 rows in set (0.00 sec)



5. Leia keskimine hinne k�ikidest hinnetest.



mysql> select avg(hinne) from AINE_OPILANE;

+-----------------+

| avg(hinne)      |

+-----------------+

| 4.0833333333333 | 

+-----------------+

1 row in set (0.00 sec)





6. Leia iga aine keskmine hinne. V�ljasta aine nimetus ja keskmine hinne.



mysql> select a.nimetus nim, (select avg(hinne) from AINE_OPILANE where a.a_kood = aine_kood) kesk from AINE a, AINE_OPILANE  group by nim;

+------------------------------------------------+------+

| nim                                            | kesk |

+------------------------------------------------+------+

| Adobe Illustratori kasutamine                  | NULL | 

| Adobe Photoshopi kasutamine                    | NULL | 

| Aedvilja ttlemise tehn.                        |    3 | 

| Aedvilja ttlemise tehnoloogia                  |    4 | 

| Ajalugu                                        |    4 | 

| Alternatiivsed kontoritpaketid                 |    5 | 

| Andmebaasid                                    |    5 | 

| Andmebaaside alused                            |    5 | 

| Andmebaaside projekteerimine                   |    5 | 

| Andmebaaside projekteerimine ja haldus         |    5 | 

| Andmettlus ja statistika                       |    3 | 

| Andmeturbe alused                              |    3 | 

| Andmeturve                                     |    3 | 

| Arhiivinduse alused                            |    3 | 

| Arvutipetus                                    |    5 | 

| Asjaajamine                                    |    5 | 

| Asjaajamisse alused                            |    5 | 

| Avalik esinemine                               |    3 | 

| Baarit                                         |    4 | 

| Betoonitd                                      |    4 | 

| Bioloogia                                      |    4 | 

| Catering                                       |    4 | 

| CCNA1-arvutivrkude alused                      |    5 | 

| CCNA2-ruuterite ja marsruutimise alused        |    4 | 

| CCNA3-Kommunikatsiooni alused ja marsruutimine |    3 | 

| CCNA4-Laivrgu tehnoloogiad                     |    4 | 

| Dekoratiivviimistlus-tehnikad                  | NULL | 

| Dieettoitlustamine                             | NULL | 

| Dokumendi- ja arhiivihaldus                    | NULL | 

| Dokumendihalduspraktika                        | NULL | 

| e-kaubandus                                    | NULL | 

| e-teenused                                     | NULL | 

| Eelarveline raamatupidamine                    | NULL | 

| Eesti keel                                     | NULL | 

| Eesti kossteemid                               | NULL | 

| Eesti maastikud                                | NULL | 

| Eesti rekreatsioonigeograafia                  | NULL | 

| Eesti turismigeograafia                        | NULL | 

| Eetika alused                                  | NULL | 

| Ehitamise alused                               | NULL | 

| Ehitamise phialused                            | NULL | 

| Ehitiste konstruktsioonid                      | NULL | 

| Ehituse alused                                 | NULL | 

| Ehituskonstruktsioonid                         | NULL | 

| Ehitusmdistamine                               | NULL | 

| Ehitusmdistamine ja mrkimine                   | NULL | 

| Ehitusrenoveerimise alused                     | NULL | 

| Ehitustriistad ja pinnattlus                   | NULL | 

| Eksam                                          | NULL | 

| Eksamid, kursusetd                             | NULL | 

| EL majandus ja tturg                           | NULL | 

| Elektripetus                                   | NULL | 

| Elektroonika alused                            | NULL | 

| Elektrotehnika                                 | NULL | 

| Elektrotehnika ja automaatika elemendid        | NULL | 

| Enesearengu kursus                             | NULL | 

| Enesevljendus                                  | NULL | 

| Eriala toetav eesti keel                       | NULL | 

| Eriala toetav inglise keel                     | NULL | 

| Eriala toetav keh.kasv                         | NULL | 

| Eriala toetav saksa keel                       | NULL | 

| Eritoitumine                                   | NULL | 

| Esitluse loomine                               | NULL | 

| Esitlusgraafika ja multimeedia                 | NULL | 

| Esmaabi                                        | NULL | 

| Etikett                                        | NULL | 

| Ettevtlus ja turundus                          | NULL | 

| Ettevtluse alused                              | NULL | 

| Ettevttepraktika                               | NULL | 

| EUCIPi eksamiks valmistumine                   | NULL | 

| Euroopa turismigeograafia                      | NULL | 

| Failihaldus                                    | NULL | 

| Finantsanals                                   | NULL | 

| Finantsraamatupidamine                         | NULL | 

| Finantsraamatupidamine arvutil                 | NULL | 

| Finantsvahendus                                | NULL | 

| Fsika                                          | NULL | 

| Kutsealane inglise keel                        | NULL | 

+------------------------------------------------+------+

78 rows in set (0.09 sec)



7. Koolis hakatakse hindama 5-pallise skaala asemel 10 pallisel skaalal. V�ljasta ained ja uued hinded, kui on teada, et hinded muutuvad j�rgmiselt (1->2, 2->4, 3->6, 4->8 ja 5->10).



8. Loo vaade, milles n�idatakse neid �pilasi, kes on saanud mingis aines hinde. Lisaks �pilase nimele, kuva ka aine nimetus, hinne ja �petaja, kes hindas teadmisi aines.



mysql> SELECT CONCAT_WS(' ', OPILANE.eesnimi, OPILANE.perenimi) opilane, AINE_OPILANE.hinne hinne, AINE.nimetus nimetus, CONCAT_WS(' ', OPETAJA.eesnimi, OPETAJA.perenimi) AS opetaja FROM AINE_OPILANE LEFT JOIN OPILANE ON OPILANE.isikukood = AINE_OPILANE.o_isikukood LEFT JOIN AINE ON AINE.a_kood = AINE_OPILANE.aine_kood LEFT JOIN OPETAJA ON OPETAJA.opetaja_isikuk = AINE_OPILANE.opetaja_kood
    -> ;

+----------------+-------+------------------------------------------------+----------------+

| opilane        | hinne | nimetus                                        | opetaja        |

+----------------+-------+------------------------------------------------+----------------+

| Mari Maasikas  | 3     | Aedvilja ttlemise tehn.                        | Olga Kask      | 

| Joosep Jalakas | 4     | Aedvilja ttlemise tehnoloogia                  | Oliver Kuusk   | 

| Tiit Tikk      | 4     | Ajalugu                                        | Pille Katus    | 

| Ragnar Roos    | 5     | Alternatiivsed kontoritpaketid                 | Piret Siil     | 

| Robert Rohi    | 5     | Andmebaasid                                    | Piret Karu     | 

| Kevin Kivi     | 5     | Andmebaaside alused                            | Priit Rebane   | 

| Sille Siil     | 5     | Andmebaaside projekteerimine                   | Priit Jnes     | 

| Lilli Lill     | 5     | Andmebaaside projekteerimine ja haldus         | Sirje Koer     | 

| Luisa Tuul     | 3     | Andmeturbe alused                              | Sirje Kass     | 

| Sandra Saar    | 3     | Andmeturve                                     | Sirje Rebane   | 

| Kadri Kade     | 3     | Andmettlus ja statistika                       | Sirje Mnd      | 

| Vaiko Kook     | 3     | Arhiivinduse alused                            | Tarmo Saar     | 

| Veiko Vesi     | 5     | Arvutipetus                                    | Tauno Kuusik   | 

| Hannes Hein    | 5     | Asjaajamine                                    | Terje Tamm     | 

| Leo Loots      | 5     | Asjaajamisse alused                            | Thea Tammik    | 

| Liia Lips      | 3     | Avalik esinemine                               | Tiina Lilleaed | 

| Kalev Komm     | 4     | Baarit                                         | Tiit Lilleaed  | 

| Rita Rehv      | 4     | Betoonitd                                      | Tiiu Rohi      | 

| Janek Jooksik  | 4     | Bioloogia                                      | Toomas Leht    | 

| Jane Jnes      | 4     | Catering                                       | Triin Oks      | 

| Mart Karu      | 5     | CCNA1-arvutivrkude alused                      | Tuuliki Kadaks | 

| Kati Karummm   | 4     | CCNA2-ruuterite ja marsruutimise alused        | Urmas Okas     | 

| Kalle Kohin    | 3     | CCNA3-Kommunikatsiooni alused ja marsruutimine | Viia Mgi       | 

| Tiia Tuisk     | 4     | CCNA4-Laivrgu tehnoloogiad                     | Vilve Org      | 

+----------------+-------+------------------------------------------------+----------------+

24 rows in set (0.00 sec)





9. Leia �pilaste s�nniajad isikukoodist. V�ljasta �pilase ees- ja perenimi �hes veerus ja �pilase s�nniaeg kujul nt 27.09.2010



10. Arvuta �pilaste vanused arvestades ka seda, millal on �pilase s�nnip�ev st, kas see on juba sel aastal toimunud v�i mitte.



11. Leia, mitu �pilast �pib igas grupis?







12. Leia mitu t�drukut ja mitu poissi �pib igas grupis.



