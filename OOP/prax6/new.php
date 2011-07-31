<?php

$a = 5;

function kuup($a) {
	return $a * $a * $a;
}

function k($a) {
	if(empty($a)) {
		$asd =  'täida väljad';
	}else {

	}
}

function aste($a, $b) {
	return round(pow(
}

echo kuup($a) . "<hr>";

echo '<form method="post" action="new.php">
<TABLE>
<TR >
	<TD>esimene</TD>
	<TD><INPUT TYPE="text" NAME="a"></TD>
</TR>
<TR >
	<TD>teine</TD>
	<TD><INPUT TYPE="text" NAME="b"></TD>
</TR>
<TR>
	<TD><INPUT TYPE="submit" value="+" name="liitmine"></TD>
	<TD><INPUT TYPE="submit" value="-" name="lahutamine"></TD>
	<TD><INPUT TYPE="submit" value="*" name="korrutamine"></TD>
	<TD><INPUT TYPE="submit" value="/" name="jagamine"></TD>
</TR>
<TR>
	<TD><INPUT TYPE="submit" value="sqr" name="sitt"></TD>
	<TD><INPUT TYPE="submit" value="^2" name="ei"></TD>
	<TD><INPUT TYPE="submit" value="^3" name="toota"></TD>
	<TD><INPUT TYPE="submit" value="a^b" name="rsk"></TD>
</TR>
</TABLE>
</form>';

if($_POST['liitmine']) {
	echo $_POST['a'] + $_POST['b'];
}
if($_POST['lahutamine']) {
	echo $_POST['a'] - $_POST['b'];
}
if($_POST['korrutamine']) {
	echo $_POST['a'] * $_POST['b'];
}
if($_POST['jagamine']) {
	echo $_POST['a'] / $_POST['b'];
}
if($_POST['sitt']) {
	echo sqrt($_POST['a']) ."<br>";
	echo sqrt($_POST['b']) ."<br>";
}
if($_POST['ei']) {
	echo $_POST['a'] * $_POST['a'] ."<br>";
	echo $_POST['b'] * $_POST['b'] ."<br>";
}
if($_POST['toota']) {
	echo $_POST['a'] * $_POST['a'] * $_POST['a'] ."<br>";
	echo $_POST['b'] * $_POST['b'] * $_POST['b'] ."<br>";
}
if($_POST['rsk']) {
	for($i = 0; $i >= $_POST['b']; $i++) {
		$asd = $_POST['a'] * $_POST['b'];
	}
	echo $asd ."<br>";
}


?>