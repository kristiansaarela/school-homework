<?php

// andmebaasi ühenduse fail
$dbh = mysql_connect('localhost', 'root', 'usbw') or die(mysql_error());
mysql_select_db('kommentaarium', $dbh) or die(mysql_error());

?>