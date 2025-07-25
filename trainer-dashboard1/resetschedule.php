<?php session_start();
require_once 'connection.php';
if($_SESSION['isloggedintrainer']!=1){
    header("Location:index.php");
}
$query="UPDATE privateclasses SET prvCName='',prvCDate='',pbCstartTime='',pbCendTime='',prvCRoom_Num ='',capacity='',pbCPrice=''";
$con->query($query);
header("Location:PrivateSchedule.php");

?>