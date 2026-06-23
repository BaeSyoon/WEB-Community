<?php
session_start();

// 입력값 존재 확인 (POST 배열에 임시 저장)
if(!(isset($_POST['user_id']) && isset($_POST['user_pw']))) {
    echo "ID와 PW가 전달되지 않았습니다.";
    exit;
}

// 로컬 변수로 저장
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];

// 야매 DB
$members = [
    'admin' => [
        'password' => '1234',
        'name' => 'administrator'
    ],
    'bsy00n' => [
        'password' => '0000',
        'name' => 'Soyoon'
    ]
];

// 식별
if (!isset($members[$user_id])) { // 변수가 존재하고 값이 null이 아닐 때 true 반환
    echo "존재하지 않는 사용자입니다.";
    exit;
}

// 인증
if ($members[$user_id]['password'] !== $user_pw) {
    echo "비밀번호가 틀렸습니다.";
    exit;
}

/* 
세션에 저장. 로그인 상태 기억! ($_POST: 현재 요청에서만 사용 & $_SESSION: 다음 요청에서도 사용)
SessionID: abc123
$_SESSION = [
    "user_id" => "admin",
    "user_name" => "administrator"
]
*/
$_SESSION['user_id'] = $user_id;
$_SESSION['user_name'] = $members[$user_id]['name'];

// main.php로 이동
header("Location: index.php");
exit;