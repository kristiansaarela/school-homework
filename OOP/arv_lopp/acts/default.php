<?php
//kõikidel tegevustel on olemas 4 objekti
//andmebaasi objekt
//sessiooni objekt
//link objekt
//peatemplate objekt
//$tmpl->add('body', 'Vaikimisi tegevus'); //näiteks vaatame, kas lehe number on kaasa antud - otsime selle numbri järgi lehe ja kuvame ekraanile lehe sisu

/*
$page_id = (int)$http->get('page_id');
$sql = 'SELECT * FROM content WHERE '.
	'content_id='.$page_id.' AND lang_id='.fixDb(LANG_ID);

if(ROLE_ID != ROLE_ADMIN)
{
	$sql .= ' AND is_hidden=0'; 
}
$res = $db->getArray($sql);
if($res === false)
{
	$sql = 'SELECT * FROM content WHERE '.
		'lang_id='.fixDb(LANG_ID).' AND is_first_page=1';
	$res = $db->getArray($sql);
}

if($res !== false)
{
	$page = $res[0];
	$http->set('page_id', $page['content_id']);
	$tmpl->set('body', $page['content']);
}

/*
*/
#header('Location: index.php?act=login');//suuname kasutaja pealehele
#exit;

#$sql = "select * from s";

$sess->checkSession();
if(!empty($sess->user_data['kasutaja_nimi'])) {
	$main_tmpl->set('sisu', "sisse logitud nagu " . $sess->user_data['kasutaja_nimi']);
}

?>