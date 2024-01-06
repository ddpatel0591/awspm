<?php 
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}
unset($_SESSION['login-btn']);
session_destroy();

header("location:login.php");
die();
?>