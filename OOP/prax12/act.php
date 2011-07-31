<?php
//act.php
//konfigureerimine
define('CLASS_DIR', './classes/');
require_once(CLASS_DIR.'template.php');
require_once(CLASS_DIR.'httpp.php');
require_once(CLASS_DIR.'linkobject.php');

//koostame uue Httpp ja Linkobject objekti
$http = new LinkObject;


//saame tegevuse v��rtuse k�tte
$act = $http->get('act');

//tegevused asuvad kataloogis acts
define('ACTS_DIR', './acts/');
$fn = ACTS_DIR.$act.'.php'; //tegevuse faili t�istee koostamine

//kontroll
//kas mingi tegevus on antud kaasa
if(file_exists($fn) and is_file($fn) and is_readable($fn))
{
	//kui on k�ik korras, t��tame selle failiga
	require_once($fn);
}

//juhul kui ei ole, siis k�ivitatakse vaikimisi m��ratud tegevus
else
{
	$fn = ACTS_DIR.'default.php';
	$http->set('act', DEFAULT_ACT);
	require_once $fn;
}

?>