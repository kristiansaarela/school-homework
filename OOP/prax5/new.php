<?php

function color($color, $tekst) {
	echo '<font color="' . $color . '">' . $tekst . '</font><br>';
}

$v_t = array("#999999" => "esimene", "#512872" => "teine", "#33FF00" => "kolmas");
foreach($v_t as $color => $tekst) {
	color($color, $tekst);
}

echo "<hr>";

echo '<form action="new.php" method="post">
tekst:
<input type="text" name="t" />
<br />
värv:
<input type="text" name="v" />
<input type="submit" value="Submit" />
</form>';

color($_POST['v'], $_POST['t']);


?>