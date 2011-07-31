<?php
//funktsioonid

/*
function funktsiooni_nimi([parameetrid])
{
	tegevused;
	return mida_tagastame;
};
*/
/*
function kuup($arv)
{
	return ($arv * $arv * $arv);
};

$arv = 5;
//echo $arv.'<br />';
$arv_kuubis = kuup($arv);
//echo $arv_kuubis.'<br />';
//echo kuup($arv).'<br />';
*/
echo 'Kalkulaator';
?>
<form method='get' action='<?=$PHP_SELF?>'>
	<table>
	<tr>
		<td colspan='4'>Arv 1&nbsp;<input type="text" name="arv1"></td>
	</tr>
	<tr>
		<td colspan='4'>Arv 2&nbsp;<input type="text" name="arv2"></td>
	</tr>
	<tr>
		<td><input type="submit" value='+' name='arvuta'></td>
		<td><input type="submit" value='-' name='arvuta'></td>
		<td><input type="submit" value='*' name='arvuta'></td>
		<td><input type="submit" value='/' name='arvuta'></td>
	</tr>
	<tr>
		<td><input type="submit" value='sqrt' name='arvuta'></td>
		<td><input type="submit" value='^2' name='arvuta'></td>
		<td><input type="submit" value='^3' name='arvuta'></td>
		<td><input type="submit" value='x^y' name='arvuta'></td>
	</tr>
	</table>
</form>


<?php
//arvutusfunktsioonid
function kontroll($arv1, $arv2)
{
	if(strlen($arv1)==0 or strlen($arv1)==0)
	{
		$teade = 'Tuleb sisestada mõlemad arvud<br />';
	}
	return $teade;
};
function liita($arv1, $arv2)
{
	return ($arv1 + $arv2);
};
function lahuta($arv1, $arv2)
{
	return ($arv1 - $arv2);
};
function korruta($arv1, $arv2)
{
	return ($arv1 * $arv2);
};
function jaga($arv1, $arv2)
{
	if($arv2 == 0)
	{
		$teade = 'Nulliga jagamine on keelatud<br />';
		return $teade;
	}
	else return ($arv1 / $arv2);
};
function juur($arv1, $arv2)
{
	if(strlen($arv1)>0 and strlen($arv2)>0)
	{
		$teade = 'Juure saab leida ainult esimesest arvust';
		return $teade;
	}
	else return round(sqrt($arv1), 2);
};
function ruut($arv1, $arv2)
{
	if(strlen($arv1)>0 and strlen($arv2)>0)
	{
		$teade = 'Ruutu saab leida ainult esimesest arvust';
		return $teade;
	}
	else return ($arv1 * $arv1);
};
function kuup($arv1, $arv2)
{
	if(strlen($arv1)>0 and strlen($arv2)>0)
	{
		$teade = 'Kuup saab leida ainult esimesest arvust';
		return $teade;
	}
	else return ($arv1 * $arv1 * $arv1);
};
function aste($arv1, $arv2)
{
	return round(pow($arv1, $arv2), 2);
};


$arv1 = $_GET['arv1'];
$arv2 = $_GET['arv2'];
$arvuta = $_GET['arvuta'];

$teade = kontroll($arv1, $arv2);
echo $teade;
if($arvuta == '+')
{
	echo 'Tulemus = '.liita($arv1, $arv2).'<br />';
}
else if($arvuta == '-')
{
	echo 'Tulemus = '.lahuta($arv1, $arv2).'<br />';
}
else if($arvuta == '*')
{
	echo 'Tulemus = '.korruta($arv1, $arv2).'<br />';
}
else if($arvuta == '/')
{
	echo 'Tulemus = '.jaga($arv1, $arv2).'<br />';
}
else if($arvuta == 'sqrt')
{
	echo 'Tulemus = '.juur($arv1, $arv2).'<br />';
}
else if($arvuta == '^2')
{
	echo 'Tulemus = '.ruut($arv1, $arv2).'<br />';
}
else if($arvuta == '^3')
{
	echo 'Tulemus = '.kuup($arv1, $arv2).'<br />';
}
else if($arvuta == 'x^y')
{
	echo 'Tulemus = '.aste($arv1, $arv2).'<br />';
}
else echo 'Antud operatsioon puudub';
?>