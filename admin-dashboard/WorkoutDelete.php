<?php
session_start();
if ($_SESSION['isloggedinadmin'] != 1) {
    header("Location:index.php");
} else {
    require_once 'connection.php';
}

if(isset($_GET['Wid'])){
    $wid = $_GET['Wid'];
    $query = "DELETE FROM workouts WHERE w_ID='$wid'";
    $con->query($query);
    header("Location:workouts.php");
}
