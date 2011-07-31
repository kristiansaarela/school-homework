<?php
///acts/login.php

//konfigureerimine
define('CLASS_DIR', './classes/');
require_once(CLASS_DIR.'template.php');
require_once(CLASS_DIR.'httpp.php');
require_once(CLASS_DIR.'linkobject.php');
//koostame uue Httpp ja Linkobject objekti
$http = new LinkObject;

$login_tmpl = new Template('tmpl/login.html');

$login_tmpl->set('kasutaja_nimi_str', 'Kasutajanimi');
$login_tmpl->set('kasutaja_nimi', 'kasutaja_nimi');
$login_tmpl->set('parool_str', 'Parool');
$login_tmpl->set('parool', 'parool');
$login_tmpl->set('nupp', 'Logi sisse');

//koostame linki, kuhu suunatakse login vorm 
$link = $http->getLink(array('act' => 'login_do'));
//lisame linki vההrtuse template sisse
$login_tmpl->set('tegevus', $link);

$main_tmpl->set('sisu', $login_tmpl->parse());
?>