<?php
$host = "localhost";
$dbname = "web";
$username = "bsy00n";
$password = "ghksduddksgo1";

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

$pdo = new PDO($dsn, $username, $password);

$sql = "SELECT id, title, content FROM tests ORDER BY id ASC";

$stmt = $pdo->query($sql);

$tests = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>DB연결 동적페이지</title>
</head>
<body>
    <h1>글 목록</h1>

    <?php foreach ($tests as $test): ?>
        <div>
            <h2><?php echo $test["title"]; ?></h2>
            <p><?php echo $test["content"]; ?></p>
        </div>
        <hr>
    <?php endforeach; ?>
</body>
</html>
