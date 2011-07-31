<?php

session_start();

include('db_fnc.php');
db();
echo "<table>";
$sql = mysql_query("select * from kasutajad");
while($row  = mysql_fetch_array($sql)) {
	echo "<tr><td>" . $row[kasutaja_nimi] . "</td><td>" . $row[parool] . "</td><td>" . $row[email] . "</td></tr>";
}
echo "</table>";

?>