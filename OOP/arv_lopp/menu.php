<?php
$menu = new Template('tmpl/menu/menu.html');
$menu->set('menu_elemendid', false); //kui kasutaja ei ole sisseloogitud, siis menüüd ta ei näe
$menuu_element = new Template('tmpl/menu/element.html');


	$link = $http->getLink();
	$menuu_element->set('link', $link);
	$menuu_element->set('menuu_nimetus', 'Pealeht');
	$menu->add('menuu_elemendid', $menuu_element->parse());

	
	$link = $http->getLink(array('act' => 'logout'));
	$menuu_element->set('link', $link);
	$menuu_element->set('menuu_nimetus', 'Logout');
	$menu->add('menuu_elemendid', $menuu_element->parse());
?>