<?php
// kontrolli get install olemasolu
$install = (isset($_GET['install'])) ? $_GET['install'] : '';

if($install == 'true')
{	//andmebaasi ühendus
	include('connection.php');
	
	// users tabel
	$sql1 = 'CREATE TABLE users (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nimi VARCHAR(15) NOT NULL
	);';
	// kommentaaride tabel
	$sql2 = 'CREATE TABLE kommentaarid (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	autori_id INT(11) NOT NULL,
	kommentaar TEXT NOT NULL,
	parent_id INT(11)
	)';
	
	// loome mõlemad tabelid
	$res1 = mysql_query($sql1) or die(mysql_error());
	$res2 = mysql_query($sql2) or die(mysql_error());
	
	// kui erroreid ei ole siis suuname edasi kommentaaride lehele
	if(!mysql_error())
		header("Location: prax03.php?install=success");
	else
		echo 'Midagi läks valesti.';
}

?>