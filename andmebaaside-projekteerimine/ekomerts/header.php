<?php # Script 17.2 - header.html
// This page begins the session, the HTML page, and the layout table.

session_start(); // Start a session.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title><?php echo (isset($page_title)) ? $page_title : 'Welcome!'; ?></title>
</head>
<body>
<table cellspacing="0" cellpadding="0" border="0" align="center" width="600">
	<tr>
		<td align="center" colspan="3"><img src="images/title.jpg" width="600" height="61" border="0" alt="title" /></td>
	</tr>
	<tr>
		<td>
			<a href="index.php"><img src="images/home.jpg" width="200" height="39" border="0" alt="home page" /></a>
		</td>
		<td>
			<a href="browse_prints.php"><img src="images/prints.jpg" width="200" height="39" border="0" alt="view the prints" /></a>
		</td>
		<td>
			<a href="view_cart.php"><img src="images/cart.jpg" width="200" height="39" border="0" alt="view your cart" /></a>
		</td>
	</tr>
	<tr>
		<td align="left" colspan="3" bgcolor="#ffffcc"><br />