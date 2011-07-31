<?php
define('BASE_DIR', ''); // define('BASE_DIR', '../');
require_once(BASE_DIR.'conf.php');

//peatemplate
$main_tmpl = new Template('tmpl/main.html');

//tegevuste importimine
require_once(BASE_DIR.'act.php');

$main_tmpl->set('pealkiri', 'M&auml;rkmik');

$main_tmpl->set('aeg', utf8_encode(strftime('%A, %d.%B %Y %H:%M')));

$main_tmpl->set('nimetus', 'M&auml;rkmik');

$main_tmpl->set('rega', '<a href="index.php?act=add_user">Registreeri kasutajaks</a>');

echo $main_tmpl->parse();

//$sess->flush();
?>