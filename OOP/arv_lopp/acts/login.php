<?php
//define('BASE_DIR', ''); // 
//define('BASE_DIR', '../');
//require_once(BASE_DIR.'conf.php');

//alguses tuleb lugeda sisse vormi template ja kuva ekraanile
$login_tmpl = new Template('tmpl/login.html');
//$http = new LinkObject;

//Lisame templatele ka sisu

$login_tmpl->set('nupp', 'Logi sisse');
$login_tmpl->set('kasutaja_nimi_str', 'Kasutajanimi');
$login_tmpl->set('parool_str', 'Parool');
$login_tmpl->set('kasutaja_nimi', 'kasutaja_nimi');
$login_tmpl->set('parool', 'parool');
/*
$logn_tmpl->set('rega', 'Registreeri Kasutajaks');
$link = $http->getLink(array('act' => 'add_user'));
$login_tmpl->set('rega_link', $link);*/

//kuhu see vorm suunab
$link = $http->getLink(array('act' => 'login_do'));
$login_tmpl->set('tegevus', $link);

$main_tmpl->set('sisu', $login_tmpl->parse());

//$link = $http->getLink(array('act' => 'user.add_user'));
//$tmpl->add('body', '<a href="'.$link.'"> Register new user</a>');

//$tmpl->set('body', $form->parse());
//echo $form->parse();
//$form->parse();
?>