<?php
//login.php
//kutsume vajalikud funktsioonid
require_once('db_fnc.php');

//alustame sessiooni sisselogitud kasutaja jaoks
session_start();

if(empty($_SESSION))
{
	$kasutaja_nimi = $_GET['kasutaja_nimi'];
	$parool = $_GET['parool'];

	//test
	echo 'Kasutaja nimi = '.$kasutaja_nimi.'<br />';
	echo 'Parool = '.$parool.'<br />';

	db();

	//p�ring
	$sql = 'SELECT * FROM kasutajad WHERE kasutaja_nimi="'.$kasutaja_nimi.'" and parool="'.md5($parool).'"';

	//saadame p�ring andmebaasi
	$tulemus = mysql_query($sql);

	if(mysql_num_rows($tulemus) > 0)
	{
		echo 'Oled sisse logitud';
		$_SESSION['sisselogitud_kasutaja'] = $kasutaja_nimi;
		echo '<pre>';
		print_r($_SESSION);
		echo '</pre>';
		echo '<a href="vaata.php">vaata</a> <a href="ylesanded.php">lisa</a> <a href = "logout.php">Logi v�lja</a><br />';
		if($_SESSION['sisselogitud_kasutaja'] == "admin") {
			echo '<a href="userlist.php">kasutajad</a> ';
		}
	
	}
	else
	{
		echo 'Logida sisse ei saa';
	}
}
else
{
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
	echo '<a href="vaata.php">vaata</a> <a href="ylesanded.php">lisa</a> <a href = "logout.php">Logi v�lja</a><br />';
	if($_SESSION['sisselogitud_kasutaja'] == "admin") {
			echo '<a href="userlist.php">kasutajad</a> ';
		}
}


?>