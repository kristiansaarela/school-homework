<?php

$var1 = 7;
$var2 = 1;

echo '$var1 = ' . $var1 . '<br>$var2 = ' . $var2 . "<br>";

$var3 = $var1 + $var2;
echo '$var3 = $var1 + $var2 = ' . $var3 . '<br>';

echo '$var3 = $var1 / $var2 = ' .$var2 / $var1. '<br>';
echo '$var3 = $var1 * $var2 = ' .$var2 * $var1. '<br>';
echo '$var3 = $var1 - $var2 = ' .($var2 - $var1). '<br>';

echo "<br>";

$a = 20;
$w;

echo "<br>";

$w = $w + $a;
$w .+ $a;
echo $w;

echo "<br>";

echo $w++;
echo "<br>";
echo --$w;
echo "<br>";

echo "<hr>";

$y = "sõnaANSA";

echo gettype($y);
echo "<br>";

$muutujad = array("dhas", "548", "*/", 5574, true);
echo "<table border='1'>";
foreach($muutujad as $sad) {
	echo "<tr><td>".$sad."</td><td>".gettype($sad)."</td></tr>";
}
echo "</table>";

?>