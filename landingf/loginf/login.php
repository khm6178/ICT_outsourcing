<?php
session_start(); // 세션 시작
$error='';
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])){
$error = "유효하지 않은 ID 혹은 비밀번호입니다.";
}
else
{
//ID, 비밀번호 받아오기
$username=$_POST['username'];
$password=$_POST['password'];
//DB 연결
$connection = mysql_connect("localhost", "root", "apmsetup");

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
//DB 선택
$db = mysql_select_db("company", $connection);
//유효성 체크
$query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; //세션 초기화
header("location: profile.php");
}
mysql_close($connection); //커넥션 종료
}
}
?>
