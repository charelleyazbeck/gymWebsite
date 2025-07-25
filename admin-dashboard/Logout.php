<?php session_start();
if($_SESSION['isloggedinadmin']!=1){
    header("Location:index.php");
}
else{
require_once 'connection.php'

;}

session_destroy();
header("Location:Index.php");
?>

