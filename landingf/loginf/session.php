<?php
//DB 연결
$connection = mysql_connect("localhost", "root", "apmsetup");
//DB 선택
$db = mysql_select_db("company", $connection);
session_start();//세션 시작
//세션 저장
$user_check=$_SESSION['login_user'];
//유저 정보 불러오기
$ses_sql=mysql_query("select username from login where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysql_close($connection); //커넥션 종료
header('Location: login_index.php');
}
?>
