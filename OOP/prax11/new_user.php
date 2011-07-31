<?php
//new_user.php

echo '
	<form method="get" action="register.php">
		Kasutaja nimi <input type="text" name="kasutaja_nimi"><br />
		Parool <input type="password" name="parool"><br />
		Parool uuesti <input type="password" name="parool_1"><br />
		Email<input type="text" name="email"><br />
		<input type="submit" value="Registreeri"><br />
	</form>
';
?>