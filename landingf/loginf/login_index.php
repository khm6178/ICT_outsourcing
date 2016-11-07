<?php
include('login.php'); //로그인 스크립트 호출

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>BI Login</title>
<meta charset="utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="main">
<div class="login_content">
<div class="login">
<div class="box">
<form action="" method="post">
<input id="name" name="username" placeholder="I.D" type="text">
<input id="password" name="password" placeholder="Password" type="password">
<button name="submit" type="submit" class="btn__login">Sign in</button>
<span><?php echo $error; ?></span>
</form>
<p class="info">
문의사항이 있으신가요?
<br>
<a href="mailto:rainist@rainist">rainist@rainist</a>
또는
<a href="tel:+82234539300">02-3435-9300</a>
으로 연락바랍니다.
</div>
</div>
</div>
</body>
</html>
