<?php
session_start();

 // __DIR__ : 현재 파일이 있는 '디렉토리' 즉, login01
 // php에서 문자열 붙이는 연산자는 '.'
// db.php 파일을 현재 파일에 불러오는 것. 그래서 밑에서 $conn을 쓸 수 있나봄.. 근데 어디서는 변수에 넣던데 여기는 그냥 쓰네.. 뭐가 다르지?
// require vs require_once: 전자는 매번 불러오는거고 후자는 한번만 불러옴. 중복으로 불렀을 때 문제가 생길 수 있어서 보통 후자 사용.
require_once __DIR__ . "/db.php";

if(!(isset($_POST['user_id']) && isset($_POST['user_pw']))) {
    echo "ID와 PW가 전달되지 않았습니다.";
    exit;
}

$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];

$sql = "SELECT * FROM users WHERE user_id = '$user_id' AND user_pw = '$user_pw'";

// mysqli_query(DB연결, SQL문장): mysql에 쿼리를 보내서 실행하는 함수!
// $result에는 조회 결과의 객체가 들어감. mysqli_result()의 결과 묶음 객체에서 한 줄씩 꺼내려면 mysqli_fetch_assoc() 사용
$result = mysqli_query($conn, $sql);

// 조회의 객체가 없거나 false면 실패(문법이 틀렸거나 테이블이 없거나 컬럼이 없거나.. sql 실행이 안되는 경우)
if (!$result) {
    // 에러 메세지를 가져와서 출력하고 php 실행 종료(exit)
    // 운영 시에는 에러를 사용자 화면에 보여주면 보안 털림;
    die("SQL failed: " . mysqli_error($conn));
}

// sql은 실행됐는데, 이제 로그인 결과를 보자!
// mysqli_fetch_assoc(): sql 조회 결과에서 한줄씩 가져와 연관 배열로 만들어줌.
// 연관 배열(associative array): 이름으로 값을 꺼낼 수 있는 배열
// $user = [
//  "id" => "1",
//  "user_id" => "admin",
//  "user_pw" => "1234",
//  "user_name" => "administrator"
// ];
// $user['id'] 이런식으로 꺼낼 수 있음.
$user = mysqli_fetch_assoc($result);

// 결과가 없다면 로그인 실패!
if(!$user) {
    echo "Login failed";
    exit;
}

$_SESSION['user_id'] = $user['user_id'];
$_SESSION['user_name'] = $user['user_name'];

header("Location: index.php");
exit;