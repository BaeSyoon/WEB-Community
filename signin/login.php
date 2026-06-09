<!doctype html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8" />
	<title>Session Sign in</title>
</head>
<body>
	<div class="container">
		<h1>login.php</h1>
	<?php
		if(!(isset($_SESSION['user_id']) && isset($_SESSION['user_name']))) {
	?>
			<form method="post" action="login_ok.php">		
				<p>ID: <input type="text" name="user_id"/></p>
				<p>PW: <input type="password" name="user_pw"/></p>
				<p><input type="submit" value="Sign in"/></p>
			</form>
	<?php
		} else {
			$user_id = $_SESSION['user_id'];
			$user_name = $_SESSION['user_name'];
			echo "<p><strong>$user_name</strong>($user_id) is already signed in.";
			echo "<a href=\"index.php\">[Back]</a></p>";
		}
	?>
</body>
</html>
