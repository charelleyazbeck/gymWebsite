<?php
require_once('connection.php');
if($_SESSION['isloggedin'] != 1){
  header("Location:login.php");
}
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}else{
  header("Location:login.php");
}

session_start();
session_destroy();
header("Location:login.php");
?>