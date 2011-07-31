<?php
//act.php
//konfigureerimine
define('CLASS_DIR', './classes/');
require_once(CLASS_DIR.'template.php');
require_once(CLASS_DIR.'httpp.php');
require_once(CLASS_DIR.'linkobject.php');

//koostame uue Httpp ja Linkobject objekti
$http = new LinkObject;


//saame tegevuse väärtuse kätte
$act = $http->get('act');

//tegevused asuvad kataloogis acts
define('ACTS_DIR', './acts/');
$fn = ACTS_DIR.$act.'.php'; //tegevuse faili täistee koostamine

//kontroll
//kas mingi tegevus on antud kaasa
if(file_exists($fn) and is_file($fn) and is_readable($fn))
{
	//kui on kõik korras, töötame selle failiga
	require_once($fn);
}

//juhul kui ei ole, siis käivitatakse vaikimisi määratud tegevus
else
{
	$fn = ACTS_DIR.'default.php';
	$http->set('act', DEFAULT_ACT);
	require_once $fn;
}

?>