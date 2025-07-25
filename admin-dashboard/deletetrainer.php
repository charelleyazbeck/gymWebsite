<?php
session_start();
require_once("connection.php");

if(isset($_GET['t_ID'])) {
    $t_ID = $_GET['t_ID'];
    $query = "DELETE FROM trainers WHERE t_ID='$t_ID'";
    $con->query($query);
    header("Location:viewtrainers.php");
}