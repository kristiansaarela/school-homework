<?php


echo '<form action="Noname1.php3" method="post">
eesnimi:
<input type="text" name="t" />
<br />
perenimi:
<input type="text" name="v" />
<input type="submit" value="Submit" />
</form>';

$filename = "myfile.txt";

touch($filename);
//kirjutab
$fp = fopen($filename, 'a');
fputs($fp, $_POST['t'] . " " . $_POST['v'] . "<br>");

fclose($fp);
//loeb
$fpa = fopen($filename, 'rb');
$char = fread($fpa, filesize($filename));

fclose($fpa);
//näitab
echo $char;


?>