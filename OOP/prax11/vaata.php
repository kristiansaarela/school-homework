<?php

session_start();

include('db_fnc.php');
db();
echo "<table border=1>";
echo "<tr><td>kasutaja_nimi</td><td>kirjeldus</td><td>algusaeg</td><td>loppaeg</td></tr>";
$sql = mysql_query("select * from ylesanded");
while($row  = mysql_fetch_array($sql)) {
	echo "<tr><td>" . $row[kasutaja_nimi] . "</td><td>" . $row[kirjeldus] . "</td><td>" . $row[algusaeg] . "</td><td>" . $row[loppaeg] . "</td></tr>";
}
echo "</table>";

?>