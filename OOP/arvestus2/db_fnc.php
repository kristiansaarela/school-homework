<?php
//db_fnc.php

function db()
{
	//�hendus andmebaasiga
	$link = mysql_connect('localhost', 'kristian.saarela', 'asdasd');
	if(!$link) echo 'Probleem andmebaasi �hendusega<br />';
	
	//andmebaasi valik
	mysql_select_db('kristiansaarela') or die('Probleem andmebaasivalikuga');
}
?>