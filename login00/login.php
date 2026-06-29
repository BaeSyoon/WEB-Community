<?php 
session_start(); # 세션 쓰겠다. (세션 아이디(브라우저에게 쿠키 형태로 주어진 값)로 로그인 상태를 저장하기 위한 서버 측 저장공간)

if (isset($_SESSION['user_id'])) { # 로그인한 사용자는 메인 페이지로 이동. 근데 user_id는 전역변수? 세션 변수? 뭘 보고 확인하는거지?
    header("Location: index.php"); # 응답 헤더에 Location 메세지를 추가해서 이동시키도록 함. 근데 이거 없애면 어케되는데? 이거 말고 다른 방법은 없나?
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
    <!--
        폼 태그: 사용자가 입력한 값을 서버로 전송할 때 사용하는 HTML 태그
        1. 메소드 포스트: (입력값을 hhtp 요청 메세지에 넣겠다는 의미)
            로그인 요청을 post가 아닌 get으로 해버리면 url에 담아서 넣어야 하고 값이 노출되어 버리므로 post를 사용하는게 좋음.
             POST /login-test/login_ok.php HTTP/1.1
             Host: localhost
             Content-Type: application/x-www-form-urlencoded
             
             user_id=admin&user_pw=1234

        2. 액션: 입력값을 처리할 php 파일 (어느 서버 파일로 보낼지)
            근데 입력값은 어디에 넣는데여?
            form 태그 안의 input 태그의 값(서버에서 값을 꺼낼 때 name값을 사용하여 꺼냄- 그럼 id는 왜한거야?)
            
            input type="text" name="user_id">
            $user_id = $_POST['user_id'];
            
        3. 용어 설명
            form     : 입력값을 서버로 전송하는 영역
            method   : GET 또는 POST 중 어떤 방식으로 보낼지 결정
            action   : 어느 PHP 파일로 보낼지 결정
            input    : 사용자가 값을 입력하는 칸
            name     : 서버에서 값을 꺼낼 때 사용하는 이름
            submit   : form 전송 버튼

            id="user_pw"
            → label, CSS, JavaScript가 입력칸을 찾기 위해 사용 (개발자 편의, 서버와 노상관)

            name="user_pw"
            → 서버 PHP가 $_POST['user_pw']로 값을 꺼내기 위해 사용 (없으면 서버에 저장이 안돼요~)
    -->
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