<?php

session_start();
require_once('connection.php');
if($_SESSION['isloggedin'] != 1){
    header("Location:login.php");
}
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}else{
    header("Location:login.php");
}

if (isset($_GET['i_id'])) {
    $id = $_GET['i_id'];
    if (isset($_POST['rate'])) {
        $rate = $_POST['rate'];
        $query = "SELECT * FROM ratingitems WHERE c_ID='$user' AND i_ID='$id'";
        $res = $con->query($query);

        if ($res) {
            if ($res->num_rows > 0) {
                $query = "UPDATE ratingitems SET iRating='$rate' WHERE c_ID='$user' AND i_ID='$id'";
                $con->query($query);
                header("Location:itemInfo.php?i_id=$id");
            } else {
                $ratedatetime = date("Y/m/d H:m:s");
                $query = "INSERT INTO ratingitems VALUES('$user','$id','$rate','$ratedatetime')";
                $con->query($query);
                header("Location:itemInfo.php?i_id=$id");
            }
        }
    }
}
?>