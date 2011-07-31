<?php
//define('BASE_DIR', ''); // 
//define('BASE_DIR', '../');
//require_once(BASE_DIR.'conf.php');

//alguses tuleb lugeda sisse vormi template ja kuva ekraanile
/*require('classes/template.php');
require('classes/linkobject.php');
require('classes/httpp.php');*/
$login_tmpl = new Template('tmpl/add_user.html');
/*$http = new LinkObject;*/

//Lisame templatele ka sisu

$login_tmpl->set('nupp', 'Registreeri');
$login_tmpl->set('kasutaja_nimi_str', 'Kasutajanimi');
$login_tmpl->set('parool_str', 'Parool');
$login_tmpl->set('parool_uuesti_str', 'Parool uuesti');
$login_tmpl->set('email_str', 'Email');
$login_tmpl->set('kasutaja_nimi', 'kasutaja_nimi');
$login_tmpl->set('parool', 'parool');
$login_tmpl->set('parool_uuesti', 'parool_uuesti');
$login_tmpl->set('email', 'email');
/*
$logn_tmpl->set('rega', 'Registreeri Kasutajaks');
$link = $http->getLink(array('act' => 'add_user'));
$login_tmpl->set('rega_link', $link);*/

//kuhu see vorm suunab
$link = $http->getLink(array('act' => 'add_user_do'));
$login_tmpl->set('tegevus', $link);

$main_tmpl->set('sisu', $login_tmpl->parse());

//$link = $http->getLink(array('act' => 'user.add_user'));
//$tmpl->add('body', '<a href="'.$link.'"> Register new user</a>');

//$tmpl->set('body', $form->parse());
//echo $form->parse();
//$form->parse();
?>