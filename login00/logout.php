<?php
session_start();

// 서버측 세션 배열 비우기
//session_destroy()가 서버 쪽 세션 저장소를 삭제하긴 하는데 현재 실행 중인 $_SESSION 배열 자체를 즉시 비우지는 않음. 동일한 요청 내에서 사용할 수 있기 때문에 배열부터 비워줌.
$_SESSION = [];

// 브라우저 쿠키 삭제
// ini_get(): php의 설정값을 알려줌, session.use_cookies: 세션ID를 쿠키로 관리하는지 여부
// 즉, php가 세션ID를 쿠키로 사용하고 있다면, 브라우저의 세션 쿠키도 삭제하는 코드
if (ini_get("session.use_cookies")) {
    // 현재 세션 쿠키의 설정값을 가져오는 함수. 왜 이게 필요하냐면 쿠키를 삭제할 때, 생성할 때와 동일한 path/domain 조건으로 삭제해야하므로.
    // 예시) $params = ["lifetime"(쿠키 유지시간) => 0, "path"(쿠키가 적용되는 경로) => "/", "domain"(쿠키가 적용되는 도메인) => "", "secure"(HTTPS에서만 전송할지의 여부) => false, "httponly"(자바스크립트에서 쿠키 접근을 막을지 여부) => true];
    $params = session_get_cookie_params();

    setcookie(
        session_name(), // 대체로 "PHPSESSID". 현재 php 세션 쿠키 이름을 가져오는 함수
        '', // 쿠키 값을 빈 문자열로 설정하겠다. 세션ID 값을 비우겠다.
        time() - 1000, // 현재시간보다 1000만큼 과거로 설정하면 쿠키 만료시간이 과거가 되므로 브라우저는 쿠키를 삭제하게 됨.
        $params["path"], // 쿠키가 적용되는 경로 ('/'이면 사이트 전체에서 쿠키 사용)
        $params["domain"], // 쿠키가 적용되는 도메인 (로컬은 빈 값이기도 함)
        $params["secure"], // https에서만 쿠키 보낼지 여부 (로컬에서 테스트할때 설정해두면 가끔 쿠키가 설정 안되기도 하나봄)
        $params["httponly"], //  자바스크립트에서 쿠키 못 읽게 XSS 방지
    );
}

session_destroy(); // 서버측 세션 데이터(저장소) 삭제 (사실 얘만 해줘도 로그아웃은 됨)

header("Location: login.php");
exit;