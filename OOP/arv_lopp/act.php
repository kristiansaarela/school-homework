<?php
//koodi kaitsmiseks - et v�ljaspool antud veebi ei saa sisse
if(!defined('BASE_DIR'))
{
	exit;
}
//kontrollime, kas mingi tegevus on kaasa antud v�i mitte
$act = $http->get('act');
$fn = ACTS_DIR.str_replace('.', '/', $act).'.php';


//kontroll
//kas mingi tegevus on antud kaasa
if(file_exists($fn) and is_file($fn) and is_readable($fn))
{
	require_once($fn);
}
//juhul kui ei ole, siis k�ivitatakse vaikimisi m��ratud tegevus
else
{
	$fn = ACTS_DIR.DEFAULT_ACT.'.php';
	$http->set('act', DEFAULT_ACT);
	require_once $fn;
}
//echo $fn.'<br />';
?>