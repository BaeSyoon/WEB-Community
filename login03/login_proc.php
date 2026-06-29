<?php
session_start();

require_once __DIR__ . "/db.php";

if(!(isset($_POST['user_id']) && isset($_POST['user_pw']))) {
    echo "ID와 PW가 전달되지 않았습니다.";
    exit;
}

$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];

$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("SQL failed: " . mysqli_error($conn));
}

$user = mysqli_fetch_assoc($result);

if(!$user || $user['user_pw'] !== $user_pw) {
    echo "Login failed";
    exit;
}

$_SESSION['user_id'] = $user['user_id'];
$_SESSION['user_name'] = $user['user_name'];

header("Location: index.php");
exit;