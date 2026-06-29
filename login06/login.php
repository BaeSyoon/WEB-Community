<?php 
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!doctype html> 
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>Login 1</title> 
</head> 
<body>
    <h1>Login Page</h1>

    <form method="post" action="login_proc.php">
        <div>
            <label for="user_id">아이디</label>
            <input type="text" id="user_id" name="user_id">
        </div>

        <div>
            <label for="user_pw">비밀번호</label>
            <input type="password" id="user_pw" name="user_pw">
        </div>

        <button type="submit">로그인</button>
    </form>
</body>
</html>