<?php
//vajaliku h��lestused

//eesti s�tted
setlocale(LC_TIME, 'Estonia');

//vajalikud konstandid - kataloogide m��ramiseks

define('CLASS_DIR', BASE_DIR.'classes/');
define('TMPL_DIR', BASE_DIR.'tmpl/');
define('ACTS_DIR', BASE_DIR.'acts/');


define('DEFAULT_ACT', 'default'); //vaikimisi defineeritud tegevused
//kasutajate tegevused on kataloogis user, lehe muutused on kataloogis page jne - see on mugav
//ennem tuleb valmistada loogikat, kuidas tegevus �lesehitada
//selleks on eraldi fail - act.php
//----------------------------------------

//impordime vajalikud klassid
require_once(CLASS_DIR.'template.php');
require_once(CLASS_DIR.'http.php');
require_once(CLASS_DIR.'mysql.php');
require_once(CLASS_DIR.'linkobject.php');
require_once(CLASS_DIR.'session.php');


//require_once(BASE_DIR.'dbconf.php');
define('DB_HOST', 'localhost');
define('DB_USER', 'kristian.saarela');
define('DB_PASS', 'asdasd');
define('DB_NAME', 'kristiansaarela');

$db = new MySQL(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$http = new LinkObject;
$sess = new Session($http, $db);

?>