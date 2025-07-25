<?php
session_start();
if($_SESSION['isloggedintrainer']!=1){
    header("Location:index.php");
}
else{
require_once("connection.php");
}
$sessionnbr=$_GET['session'];

$email = $_SESSION['temail'];
$query = "SELECT t_ID FROM trainers WHERE t_Email='$email'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['t_ID'];

$status="NOT AVAILABLE";
if (empty($sessionnbr) || empty($id)) {
    echo "Session number or user ID is missing.";
    exit();
}
/*8ayer l status to not available(off)*/
$query="UPDATE privateclasses set prvCStatus='$status' where t_ID='$id' AND prvC_ID='$sessionnbr'";
if($con->query($query)){
    header("Location:PrivateSchedule.php");
}else{
        echo "ERROR";
        
}

}