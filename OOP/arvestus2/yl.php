<?php

session_start();

echo '<pre>' . print_r($_SESSION) . '</pre>';

include('db_fnc.php');

db();

$_K = $_GET['ylesanne'];
$_L = $_GET['loppaeg'];


	$sql = "insert into ylesanded values ('".$_SESSION['sisselogitud_kasutaja']."','".$_K."','','".$_L."')";
	$T = mysql_query($sql);
	echo 'korras';


?>