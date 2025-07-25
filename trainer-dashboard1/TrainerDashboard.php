<?php 
session_start();
require_once 'connection.php';
if($_SESSION['isloggedintrainer']!=1){
    header("Location:Index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer dashboard home</title>
    <link href="css/navbar.css" rel="stylesheet">
</head>
<body>
    <div class="main-cont">
    <div class="container" id="container">
    <div class="brand">
        <h3>Dashboard</h3>
        <a href="#" id="toggle"><ion-icon name="menu"></ion-icon></a>
    </div>
    <div class="navbar">
        <ul>
            <li><a href="PrivateSchedule.php"><div class="icon-image"><img src="images/calendar-schedule-svgrepo-com.svg"></div><span>Schedule</span></a></li>
            <li><a href="showRegistered.php"><div class="icon-image"><img src="images/form.svg"></div><span>Registered</span></a></li>
            <li><a href="UploadVidsForm.php"><div class="icon-image"><img src="images/upload-solid.svg"></div><span>Upload Videos</span></a></li>
            <li><a href="workouts.php"><div class="icon-image"><img src="images/youtube.svg"></div><span>Your Workouts</span></a></li>
            <li><a href="Logout.php"><div class="icon-image"><img src="images/arrow-right-from-bracket-solid.svg"></div><span>Logout</span></a></li>
        </ul>
    </div>
</div>
<div>
    <h1 style="color: white;margin-left:2px"><?php
    /*Get trainer name bel main page*/
    $email = $_SESSION['temail'];
    $query = "SELECT * FROM trainers WHERE t_Email='$email'";
    $res = $con->query($query);
    if($res){
        if($res->num_rows>0){
            $row = $res->fetch_assoc();
                echo "Welcome $row[t_FirstName] ";
                echo "$row[t_LastName]";
        }
    }    
    ?></h1>
</div>
</div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="js/main.js"></script>
</body>
</html>
