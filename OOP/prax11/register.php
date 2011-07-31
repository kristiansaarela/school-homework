<?php
//register.php

//kutsume vajalikud funktsioonid
require_once('db_fnc.php');

//alustame sessiooni
session_start();

$kasutaja_nimi = $_GET['kasutaja_nimi'];
$parool = $_GET['parool'];
$parool_1 = $_GET['parool_1'];
$email = $_GET['email'];

//test
/*
echo 'Kasutaja nimi = '.$kasutaja_nimi.'<br />';
echo 'Parool = '.$parool.'<br />';
echo 'Parool_1 = '.$parool_1.'<br />';
echo 'Email = '.$email.'<br />';
*/

db();

//päring
$sql = 'SELECT * FROM kasutajad WHERE kasutaja_nimi="'.$kasutaja_nimi.'"';

//saadame päring andmebaasi
$tulemus = mysql_query($sql);

if(mysql_num_rows($tulemus) > 0)
{
	echo 'Antud kasutajanimi on juba võetud<br />';
}
else
{
	//päring
	$sql = 'INSERT INTO kasutajad VALUES("'.$kasutaja_nimi.'", "'.md5($parool).'", "'.$email.'")';

	$tulemus = mysql_query($sql);
	if(!$tulemus)
	{
		echo 'Probleem registreerimisega<br />';
	}
	else
	{
		$_SESSION['sisselogitud_kasutaja'] = $kasutaja_nimi;
		//echo 'Oled registreeritud nagu '.$_SESSION['sisselogitud_kasutaja'].'<br />';
		
		//echo '<a href="login.php">Kasuta rakendust</a><br />';

		//suuname kasutajar sisselogitud kasutaja lehele
		header('Location: login.php');
		/*echo '<pre>';
		print_r($_SESSION);
		echo '</pre>';
		*/

	}
}

?>