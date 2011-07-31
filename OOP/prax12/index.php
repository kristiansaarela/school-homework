<?php
//index.php
//konfigureerimine
define('CLASS_DIR', './classes/');
require_once(CLASS_DIR.'template.php');
require_once(CLASS_DIR.'httpp.php');
require_once(CLASS_DIR.'linkobject.php');

//koostame uue Httpp ja Linkobject objekti
$http = new LinkObject;

$main_tmpl = new Template('tmpl/main.html');
$login_tmpl = new Template('tmpl/login.html');
//vaatame ta ära
//echo $main_tmpl->content;
//täidame sisuga

$main_tmpl->set('aeg', utf8_encode(strftime('%A, %d.%B %Y %H:%M')));
$main_tmpl->set('nimetus', 'M&auml;rkmik');


$login_tmpl->set('kasutaja_nimi_str', 'Kasutajanimi');
$login_tmpl->set('kasutaja_nimi', 'kasutaja_nimi');
$login_tmpl->set('parool_str', 'Parool');
$login_tmpl->set('parool', 'parool');
$login_tmpl->set('nupp', 'Logi sisse');


//koostame linki, kuhu suunatakse login vorm 
$link = $http->getLink(array('act' => 'login_do'));
//lisame linki väärtuse template sisse
$login_tmpl->set('tegevus', $link);

$main_tmpl->set('sisu', $login_tmpl->parse());


echo $main_tmpl->parse();

?>