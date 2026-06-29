<?php

$config = require_once __DIR__ . '/config.php'; // __DIR__ : 현재 디렉토리

// config 파일에서 정보 가져옴
$db_host = $config['db_host'];
$db_name = $config['db_name'];
$db_user = $config['db_user'];
$db_pass = $config['db_pass'];
$charset = $config['db_charset'];

// mysqli_connect() 방식
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// 이걸로 Error-Based SQLi 사용할 수 있을까?
if (!$conn) {
    die("DB 연결 실패: " . mysqli_connect_error());
}

mysqli_set_charset($conn, $charset);


/* 처음에 알려준 버전

<?php

// pdo(php data objects)를 사용 - php에서 db 접속 시 자주 사용되는 방식 (또 뭐있지?)

$host = $config['db_host']; // MySQL 서버가 동일한 컴퓨터에 있음. (IP 적는 공간인건가?)
$dbname = $config['db_name'];
$dbuser = $config['db_user'];
$dbpass = $config['db_pass'];
$charset = $config['db_charset']; // 문자셋은 왜 자꾸 넣어줘야 됨?

// db 접속 주소 같은 것
$dsn = "mysql:hst={$host};dbname={$dbname};charset={$charset}";

// 옵션
$options = [
    PDO::ATTR_ERRMORE => PDO::ERRMORE_EXCEPTION, // db 오류나면 예외를 발생시켜라
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 조회 결과를 연관 배열로 받겠다
]; // ex. 이렇게 옴. $user['user_id']; $user['user_name'];

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass, $options);
} catch (PDOException $e) {
    exit('DB connection fail');
}
*/