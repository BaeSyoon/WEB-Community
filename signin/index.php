<!doctype html>
<?php session_start(); ?>
<html lang='ko'>
<head>
        <meta charset='utf-8'>
        <title>Session Sign in</title>
</head>
<body>
        <h1>index.php</h1>
        <?php
                if(!(isset($_SESSION['user_id']) && isset($_SESSION['user_name']))) {
                        echo "<p>Sign in, please. <a href=\"login.php\">[Sign in]</a></p>";
                } else {
                        $user_id = $_SESSION['user_id'];
                        $user_name = $_SESSION['user_name'];
                        echo "<p>Hello, <strong>$user_name</strong>($user_id).";
                        echo "<a href=\"logout.php\">[Sign out]</a></p>";
                }
        ?>
        <hr />
</body>
</html>

