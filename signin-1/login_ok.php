<?php
	if(!(isset($_POST['user_id']) && isset($_POST['user_pw']))) {
		header("Content-Type:text/html; charset=UTF-8");
		echo "<script>alert('Input ID/PW');";
		echo "window.location.replace('login.php');</script>";
		exit;
	}
	$user_id = $_POST['user_id'];
	$user_pw = $_POST['user_pw'];
	$members = array(
		'admin'  => array('password' => '1234', 'name' => 'administrator'),
		'bsy00n' => array('password' => '0000', 'name' => 'Soyoon')
	);

	if(!isset($members[$user_id]) || $members[$user_id]['password']!=$user_pw) {
		header("Content-Type:text/html; charset=UTF-8");
		echo "<script>alert('ID/PW is wrong.');";
		echo "window.location.replace('login.php');</script>";
		exit;
	}
	
	session_start();
	$_SESSION['user_id'] = $user_id;
	$_SESSION['user_name'] = $members[$user_id]['name'];
?>
<meta http-equiv="refresh" content="0;url=index.php" />	
