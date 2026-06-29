<?php
session_start();

// 세션에 user_id 없으면 (로그인 안되어있으면) 로그인 창으로 바이바이
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// 로컬 변수에다 아이디, 이름 저장
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

    <!-- 이름과 아이디 출력
    단순히 echo #user_name 으로 해도 되지만,
    htmlspecialchars(출력할_문자열, 변환_옵션, 문자_인코딩) <- HTML 특수문자를 안전하게 바꿔줌. XSS 방지해 주는데 나중에 배우겠지..
    하여튼, SQLi처럼 실행되지 않게, 브라우저가 스크립트로 실행하지 않고 일반 문자로 보여주는 것. (ex. <script>alert(1)</script>)
    -->
    <p>
        Welcome, <?php echo htmlspecialchars($user_name, ENT_QUOTES, 'UTF-8'); ?>
    </p>

    <p>
        ID:
        <?php echo htmlspecialchars($user_id, ENT_QUOTES, 'UTF-8'); ?>
    </p>

    <!-- 로그아웃 -->
    <a href="logout.php">Log out</a>
</body>
</html>
