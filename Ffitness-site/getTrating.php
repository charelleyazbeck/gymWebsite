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

if (isset($_GET['t_ID'])) {
    $id = $_GET['t_ID'];
    
    if (isset($_POST['Trate'])) {
        $rate = $_POST['Trate'];
        $query = "SELECT * FROM ratingitems WHERE c_ID='$user' AND t_ID='$id'";
        $res = $con->query($query);

        if ($res) {
            if ($res->num_rows > 0) {
                //set t rating
                $query = "UPDATE ratingtrainers SET tRating='$rate' WHERE c_ID='$user' AND t_ID='$id'";
                $con->query($query);
                header("Location:about-us.php?t_ID=$id");
            } else {
                //insert into db
                $query = "INSERT INTO ratingtrainers (c_ID, t_ID, tRating, ratedatetime) VALUES('$user','$id','$rate',NOW())";
                $con->query($query);
                header("Location:about-us.php?t_ID=$id");
            }
        }
    }
}
?>
