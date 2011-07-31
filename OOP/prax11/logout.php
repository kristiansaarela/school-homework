<?php
//logout.php
//jatkame sessiooni
session_start();

//kontrollime sessiooni andmed
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

$vana_kasutaja = $_SESSION['sisselogitud_kasutaja'];

echo 'Vana kasutaja = '.$vana_kasutaja.'<br />';

//kustutame sessiooni andmed
unset($_SESSION['sisselogitud_kasutaja']);

//kontrollime sessiooni andmed
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

//kustutame sessiooni
$kustutatud_sessioon = session_destroy();

//juhul kui vanad andmed on alles
if(!empty($vana_kasutaja))
{
	//kas sessioon on ikka lõpetatud
	if($kustutatud_sessioon)
	{
		echo 'Oled välja logitud<br />';
		echo '<a href="index.php">Logi sisse uuesti</a><br />';
	}
	else
	{
		echo 'Sa ei saa välja logida<br />';
	}
}
else
{
	echo 'Oled välja logitud<br />';
	echo '<a href="index.php">Logi sisse uuesti</a><br />';
}

?>