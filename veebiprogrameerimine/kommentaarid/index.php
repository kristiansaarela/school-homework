<?php

/**
 * @author Kristian Saarela
 * @description veebiprogrameerimise tunnitöö
 **/

session_start();

function cleanup($value)
{
	return trim(addslashes(strip_tags($value)));
}

$dbh = mysql_pconnect('localhost', 'root', 'usbw') or die(mysql_error());
mysql_select_db('kommentaarium', $dbh) or die(mysql_error());

$error = "";

if(isset($_GET['logout']))
{
	session_destroy();
	header("Location: index.php");
}

if(isset($_POST['login']))
{
	$user = (!empty($_POST['user'])) ? cleanup($_POST['user']) : false;
	$pass = (!empty($_POST['pass'])) ? $_POST['pass'] : false;
	
	if($user && $pass)
	{
		$sql = "SELECT id, user FROM users WHERE user = '" . $user . "' AND pass = '" . sha1($pass) . "' AND active = 1";
		$res = mysql_query($sql) or die(mysql_error());
		
		if(mysql_num_rows($res) > 0)
		{
			$row = mysql_fetch_array($res);
			$_SESSION['user'] = array(
				'id' => $row['id'],
				'name' => $row['user']
			);
			header("HTTP/1.1 303 See Other");
			header("Location: index.php");
		}
	}
}

if(isset($_GET['v']))
{
	$vote = $_GET['v'][0]; // p || m
	$what = $_GET['v'][2]; // c || r
	$id   = $_GET['v'][4];
	
	if(isset($vote, $what, $id))
	{
		$rating = $vote == 'p' ? 'pros' : 'cons';
		$wut    = $what == 'c' ? 'c_id' : 'r_id';
		
		$rat = 'UPDATE ratings SET ' . $rating . ' = ' . $rating . ' + 1 WHERE ' . $wut . ' = ' . $id;
		$res = mysql_query($rat) or die(mysql_error());
		
		if(mysql_affected_rows())
		{
			echo 'Voted!';
		}
		else
		{
			$insert = "INSERT INTO ratings ($wut, $rating) VALUES ($id, 1)";
			mysql_query($insert);
			echo 'Voted!';
		}
	}
	
	exit();
}

if(isset($_POST['add']) || isset($_POST['reply']))
{
	$name = (isset($_POST['name']) && strlen($_POST['name']) > 2 && strlen($_POST['name']) < 15) ? cleanup($_POST['name']) : FALSE;
	$comment = (isset($_POST['comment']) && strlen($_POST['comment']) > 3) ? cleanup($_POST['comment']) : FALSE;
	
	if($name && $comment)
	{
		if($_POST['reply'])
		{
			$comment_id = (isset($_POST['cid'])) ? cleanup($_POST['cid']) : FALSE;
			
			if($comment_id)
				$sql = 'INSERT INTO replies (c_id, name, reply) VALUES ("' . $comment_id . '", "' . $name . '", "' . $comment . '")';
		}
		else
			$sql = 'INSERT INTO comments (name, comment) VALUES ("' . $name . '", "' . $comment . '")';
		
		if(mysql_query($sql))
		{
			header("Location: " . $_SERVER['PHP_SELF']);
		}
		else
			$error = mysql_error();
	}
}

// comment m/p-c-id  /  reply m/p-r-id
$sql = '
SELECT
	c.c_id AS id, 
	c.name AS name,
	c.comment AS comment, 
	DATE_FORMAT(c.added, "%d.%m.%Y %H:%i") AS time, 
	r.v_id, 
	r.c_id, 
	r.r_id, 
	r.cons AS cons, 
	r.pros AS pros
FROM
	comments c
LEFT JOIN
	ratings AS r 
ON c.c_id = r.c_id
ORDER BY added ASC';

$res = mysql_query($sql) or die(mysql_error()); $content = ""; $comment = '';
if(mysql_num_rows($res))
{
	while($row = mysql_fetch_assoc($res))
	{
		if(isset($_GET['reply']))
		{
			if($_GET['reply'] == $row['id'])
			{
				$comment = $row['comment'];
			}
		}
		
		$cons = (empty($row['cons'])) ? '0' : $row['cons'];
		$pros = (empty($row['pros'])) ? '0' : $row['pros'];
		$content .= '<li>
				<div>
					<h2>' . $row['name'] . '</h2>
					<p>' . $row['time'] . '</p>
				</div>
				<p>' . $row['comment'] . '</p>
				<p>
					<label for="m-c-' . $row['id'] . '">-' . $cons . '</label>
					<input type="radio" name="vote" id="m-c-' . $row['id'] . '">
					<input type="radio" name="vote" id="p-c-' . $row['id'] . '">
					<label for="p-c-' . $row['id'] . '">+' . $pros . '</label>
					<a href="index.php?reply=' . $row['id'] . '" title="Lisa kommentaarile vastus">Vasta</a>
				</p>';
		
		$sql2 = '
		SELECT 
			c.r_id AS r_id, 
			c.name AS name, 
			c.reply AS reply, 
			DATE_FORMAT(c.added, "%d.%m.%Y %H:%i") AS time,
			r.cons AS cons, 
			r.pros AS pros
		FROM replies c
		LEFT JOIN
			ratings AS r 
			ON c.r_id = r.r_id
		WHERE c.c_id = "' . $row['id'] . '" 
		ORDER BY added DESC';
		$res2 = mysql_query($sql2) or die(mysql_error());
		
		if(mysql_num_rows($res2))
		{
			$content .= '<ul>';
			
			while($row2 = mysql_fetch_assoc($res2))
			{
				$cons2 = (empty($row2['cons'])) ? '0' : $row2['cons'];
				$pros2 = (empty($row2['pros'])) ? '0' : $row2['pros'];
				$content .= '<li>
					<div>
						<h2>' . $row2['name'] . '</h2>
						<p>' . $row2['time'] . '</p>
					</div>
					<p>' . $row2['reply'] . '</p>
					<p>
						<label for="m-r-' . $row2['r_id'] . '">-' . $cons2 . '</label>
						<input type="radio" name="vote" id="m-r-' . $row2['r_id'] . '">
						<input type="radio" name="vote" id="p-r-' . $row2['r_id'] . '">
						<label for="p-r-' . $row2['r_id'] . '">+' . $pros2 . '</label>
					</p>
				</li>';
			}
			
			$content .= '</ul>';
		}
		
		$content .= '</li>';
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Kommentaarid</title>
	
	<link rel="stylesheet" type="text/css" href="reset.css">
	<link rel="stylesheet" type="text/css" href="general.css">
	
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<script type="text/javascript">
	
	google.load("jquery", "1.5.1");
	google.setOnLoadCallback(function() {
		$('input:radio').click(function() {
			var id = $(this).attr('id');
			
			$.ajax({
				url: 'index.php',
				data: 'v=' + id,
				success: function(data) {
					alert(data);
				}
			});
		});
		
		$("#toggleLogin").click(function () {
			$("#login").slideToggle("slow");
		});
	});
	
	</script>
</head>

<body>
	<div id="wrapper">
		<div id="login">
			<?php if(isset($_SESSION['user'])) : ?>
			<p>
				Hello <?php echo $_SESSION['user']['name'] ?>.
				<a href="?logout=true">Logout</a>
			</p>
			<?php else : ?>
			<form action="index.php" method="POST">
				<p>
					<label for="user">User</label>
					<input type="text" name="user" id="user">
				</p>
				<p>
					<label for="pass">Pass</label>
					<input type="password" name="pass" id="pass">
				</p>
				<p>
					<input type="submit" name="login">
				</p>
			</form>
			<?php endif; ?>
		</div>
		<p id="toggleLogin">Login</p>
	<h1>Kommentaarid</h1>
	<ul>
		<?php echo $content; ?>
	</ul>
	<p id="error"><?php echo $error; ?></p>
	<?php if(isset($_GET['reply'])) : ?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<h1>Vasta kommentaarile</h1>
		
		<blockquote>
			<p><?php echo (strlen($comment) > 180) ? substr($comment, 0, 180) . '&hellip;' : $comment; ?></p>
		</blockquote>
		
		<p>
			<label for="name">Nimi</label>
			<input type="text" id="name" name="name">
		</p>
		<p>
			<label for="content">Sisu</label>
			<textarea cols="18" rows="4" id="content" name="comment"></textarea>
			<input type="hidden" id="cid" name="cid" value="<?php echo $_GET['reply']; ?>" />
		</p>
		<p><input type="submit" value="Vasta kommentaarile" name="reply"></p>
	</form>
	<?php else :?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<h1>Lisa kommentaar</h1>
		<p>
			<label for="name">Nimi</label>
			<input type="text" id="name" name="name">
		</p>
		<p>
			<label for="content">Sisu</label>
			<textarea cols="18" rows="4" id="content" name="comment"></textarea>
		</p>
		<p><input type="submit" value="Lisa kommentaar" name="add"></p>
	</form>
	<?php endif; ?>
	<div><img src="stop.gif" alt="Stop" /></div>
</div>
</body>

</html>