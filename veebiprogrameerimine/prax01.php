<?php

// Loob andmebaasiga ühenduse
mysql_connect("localhost", "root", "kadakas") or die(mysql_error());
mysql_select_db("IS") or die(mysql_error());

//Loeb kokku, palju itemeid andmete tabelis on
$result = mysql_query("SELECT COUNT(items) FROM andmed")
or die(mysql_error());  

//võtab mysqlist andmed, töötleb need sellisele kujule, et php-ga saaks kasutada
$row = mysql_fetch_array( $result );
$kokku=$row['COUNT(items)'];
echo $kokku;




//Võtab kõige pikema sõna, kunad sõnad on kahanevas järjekorras
$result = mysql_query("SELECT items FROM andmed ORDER BY LENGTH(items) DESC")
or die(mysql_error());  

//töötleb andmeid ja valib sealt kõige suurema pikkusega sõna
$row = mysql_fetch_array( $result );
$max=$row['items'];
echo $max;

$result = mysql_query("SELECT items FROM andmed ORDER BY LENGTH(items) ASC")
or die(mysql_error());  

$row = mysql_fetch_array( $result );
$min=$row['items'];

//Sisestab kõik järgnevad andmed andmebaasi
echo $min;
$sql="INSERT INTO tulemused (count, min, max) VALUES ('$kokku','$max','$min')";
mysql_query($sql);



?>

