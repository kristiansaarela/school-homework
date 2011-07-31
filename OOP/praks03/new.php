<?php
$x0f = "\150\x65\141\x64er"; // header
echo $x0f;
$x10 = "my\x73q\x6c_\x65\162\162n\x6f";
$x11 = "\155ys\161\154\x5f\x66\145t\143\x68\x5f\x61s\x73o\143";
$x12 = "\155\x79\x73q\154\x5f\161u\145r\171";
$x13 = "\155\171\163\x71\154\x5f\x6e\x75m_\x72\x6f\167\x73";

include('connection.php');
$x0b = (isset($_GET['install'])) ? $_GET['install'] : '';

if($x0b == 'success') echo '<p>Tabelid on edukalt loodud.</p>';
$x0c = 'SELECT nimi, k.id AS id, autori_id, kommentaar, parent_id FROM users u, kommentaarid k WHERE u.id = k.autori_id';
$x0d = $x12($x0c); 
if($x10() == 1146){
	$x0f("L\x6fca\x74\151o\156\072\040i\156\x73\x74\141\x6cl.\x70h\x70\077in\x73t\141\x6c\x6c=\164ru\145");
} else if(!$x10()){
	if($x13($x0d) == 0) {
		echo '<p>Kommentaarid puuduvad.</p>'; 
	} else { 
		while($x0e = $x11($x0d))
		{ 
			'<p><b>' . $x0e['nimi'] . '</b> ütles: ' . $x0e['kommentaar'] . '</p>';
		} 
	}
}
?>