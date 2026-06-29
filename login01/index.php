<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
?>

<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>Main Page</title>
</head>
<body>
    <h1>Main Page</h1>
    <p>
        Welcome, <?php echo "$user_name ($user_id)"; ?>
    </p>
    <a href="logout.php">Log out</a>
</body>
</html>
