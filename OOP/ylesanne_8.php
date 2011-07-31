<?php

$filmid = array(
	array(
		nimi => "hancock",
		teema => "komöödia"
	),
	array(
		nimi => "oceans's eleven",
		teema => "krimi"
	),
	array(
		nimi => "thaw",
		teema => "horror"
	),
	array(
		nimi => "avatar",
		teema => "ulme"
	)
);

foreach($filmid as $val) {
	foreach($val as $key => $final_val) {
		print "$key: $final_val<br>";
	}
	print "<br>";
}

?>