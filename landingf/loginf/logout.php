<?php
session_start();
if(session_destroy())
{
  header("Location: http://localhost/bi_web/landingf/landing.php");
}
 ?>
