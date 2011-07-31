<?php
//ts¸klid ja tingimuslaused

//if lause
//if(tingimus(ed)) tegevus;
//else if(tingimus(ed)) tegevus;
//else tegevus;
$kuu = 1;

if($kuu == 12 or $kuu == 1 or $kuu == 2) echo 'Praegu on talv!!!<br />';
else if($kuu == 3 or $kuu == 4 or $kuu == 5) echo 'Praegu on kevad!!!<br />';
else if($kuu == 6 or $kuu == 7 or $kuu == 8) echo 'Praegu on suvi!!!<br />';
else if($kuu == 9 or $kuu == 10 or $kuu == 11) echo 'Praegu on s&uuml;gis!!!<br />';
else echo 'Sisestasid vale kuu numbri!<br />';

echo '<hr>';

//for($loendus = algv‰‰rtus; tingimus; $loenduri suurendamine/v‰hendamine) tegevus;
/*
for($arv = 1; $arv < 11; $arv++)
echo $arv.' - ';
echo '<br />';
*/

for($arv = 1; $arv < 11; $arv++)
{
	//for-iga seotud tegevused
	if($arv != 10)
	echo $arv.' - ';
	else echo $arv.'<br />';
}

echo '<hr>';

echo '<table border=1>';
for($rida = 1; $rida <= 5; $rida++)
{//for1
	echo '<tr>';
	for($veerg = 1; $veerg <=4; $veerg++)
	{//for2
		echo '<td>';
			echo 'rida = '.$rida.' ja veerg = '.$veerg;
		echo '</td>';
	}//for2
	echo '</tr>';
}//for1
echo '</table>';

echo '<hr>';

/*
v =   1 2 3 4 5
r = 1 *
r = 2 * *
r = 3 * * *
r = 4 * * * *
r = 5 * * * * *

*/

for($rida = 1; $rida <= 5; $rida++)
{

	for($veerg = 1; $veerg <= $rida; $veerg++)
	{
		echo '* ';
	}
	echo '<br />';
}
echo '<hr>';

/*
v =   1 2 3 4 5
r = 1 * * * * *
r = 2 *       *
r = 3 *       *
r = 4 *       *
r = 5 * * * * *

*/

for($rida = 1; $rida <= 5; $rida++)
{
	if($rida == 1 or $rida == 5)
	{
		for($veerg = 1; $veerg <= 5; $veerg++)
		{
			echo '*&nbsp;'; 
		}
	}
	else
	{
		echo '*&nbsp;';
			for($veerg = 2; $veerg <= 4; $veerg++)
			{
				echo '&nbsp;&nbsp;&nbsp;';
			}
		echo '*&nbsp;';
	}
	
	echo '<br />';
}
?>