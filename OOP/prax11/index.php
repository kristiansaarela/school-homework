<?php
//index.php
//sessioonide kasutamise n�ited

echo '
	<form method="get" action="login.php">
		Kasutaja nimi <input type="text" name="kasutaja_nimi"><br />
		Parool <input type="password" name="parool"><br />
		<input type="submit" value="Sisene"><br />
	</form>
	<a href="new_user.php">Registreeri kasutajaks</a><br />
';

?>