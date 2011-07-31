<?php
//acts/login_do.php

$kasutaja_nimi = $http->get('kasutaja_nimi');
$parool = $http->get('parool');

//echo 'kn = '.$kasutaja_nimi.'<br />';
//echo 'p = '.$parool.'<br />';

$sql = "SELECT * FROM kasutajad WHERE kasutaja_nimi='".$kasutaja_nimi."' AND parool='".md5($parool)."'";
$res = $db->getArray($sql);
/*
echo '<pre>';
print_r($res);
echo '</pre>';
echo '<br />';
*/

//juhul, kui kasutaja puudub
if($res == false)
{
	$link = $http->getLink(array('act'=>'login'), array('username'));
	//$main_tmpl->add('sisu', $link);
	$http->redirect($link);
}
else
{
	//loome kasutaja andmetega sessioon ja laseme ta kasutama rakenduse
	
	$sess->createSession($res[0]);
/*
	echo '<pre>';
	print_r($sess);
	echo '</pre>';
	echo '<br />';
*/
	$main_tmpl->add('sisu', 'Logisid sisse nagu <b>'.$sess->user_data['kasutaja_nimi'].'</b><br />');

	//genereerime menüü eraldi failist
	require_once(BASE_DIR.'menu.php');

	//lisame menüü template sisse
	$main_tmpl->add('sisu', $menu->parse());
}

?>