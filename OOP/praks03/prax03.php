<?php

// ühendus
include('connection.php');

// kontrollime get install olemasolu
$install = (isset($_GET['install'])) ? $_GET['install'] : '';

// kui install on tehtud siis kuva kasutajale sõnum
if($install == 'success') echo '<p>Tabelid on edukalt loodud.</p>';


// pärin kommentaaride kuvamiseks
$sql = 'SELECT nimi, k.id AS id, autori_id, kommentaar, parent_id FROM users u, kommentaarid k WHERE u.id = k.autori_id';
$res = mysql_query($sql);

// kui errori number on 1146 siis tähendab et mingi tabel on puudu. suuname edasi installi lehele
if(mysql_errno() == 1146)
{ // tabelid puuduvad.
	header("Location: install.php?install=true");
} // kui erroreid ei ole
else if(!mysql_errno())
{	// kui ei ole midagi kuvada
	if(mysql_num_rows($res) == 0)
	{
		echo '<p>Kommentaarid puuduvad.</p>';
	}
	else
	{	// kommentaarid on olemas, kuvame.
		while($row = mysql_fetch_assoc($res))
		{
			'<p><b>' . $row['nimi'] . '</b> ütles: ' . $row['kommentaar'] . '</p>';
		}
	}
}

?>