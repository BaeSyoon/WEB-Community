<?php
session_start();

// db.php 파일을 불러와서 $pdo 객체를 사용. __DIR__은 현재 php 파일이 있는 디렉토리(.)- 현재 파일 경로를 기준으로 db.php를 찾음
require_once __DIR__ . "/db.php";


// 입력값 존재 확인 (POST 배열에 임시 저장)
if(!(isset($_POST['user_id']) && isset($_POST['user_pw']))) {
    echo "ID와 PW가 전달되지 않았습니다.";
    exit;
}

// 로컬 변수로 저장
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];


$sql = "SELECT * FROM users WHERE user_id = '$user_id' AND user_pw = '$user_pw'";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("SQL failed: " . mysqli_error($conn));
}

$user = mysqli_fetch_assoc($result);

if(!$user) {
    echo "Login failed";
    exit;
}

$_SESSION['user_id'] = $user['user_id'];
$_SESSION['user_name'] = $user['user_name'];

// main.php로 이동
header("Location: index.php");
exit;