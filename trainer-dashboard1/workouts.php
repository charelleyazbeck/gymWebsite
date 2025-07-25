<?php
session_start();
if ($_SESSION['isloggedintrainer'] != 1) {
    header("Location:index.php");
} else {
    require_once 'connection.php';
}
if(isset($_SESSION['temail'])){
    $email = $_SESSION['temail'];
    $getusername = "SELECT * FROM trainers WHERE t_Email='$email'";
    $res2 = $con->query($getusername);
    if($res2){
        if($res2->num_rows>0){
            $row1 = $res2->fetch_assoc();
            $t_ID = $row1['t_ID'];
        }
    }
}else{
    header("Location:Index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workouts</title>
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
<table border="1" bold style="margin-left: 2px;" class="viewtable">
    <thead>
        <tr>
            <th>Workout ID</th>
            <th>Workout Name</th>
            <th>Workout Description</th>
            <th>Workout Type</th>
            <th>Traienr ID</th>
            <th>Video</th>
            <th>Delete</th>
        </tr>
    </thead><tbody>
    <tbody>
        <?php 
        $query = "SELECT * FROM workouts WHERE t_ID='$t_ID'";
        $res = $con->query($query);
        if($res){
            if($res->num_rows>0){
                while($row = $res->fetch_assoc()){
                echo "<tr>";
                echo "<td>$row[w_ID]</td>";
                echo "<td>$row[wName]</td>";
                echo "<td>$row[wType]</td>";
                echo "<td>$row[wDescription]</td>";
                echo "<td>$row[t_ID]</td>";
                echo "<td><video width='160' height='120' controls>
                      <source src='/projectweb/trainer-dashboard1/workoutvids/$row[wSource]'>
                      Your browser does not support the video tag.
                      </video></td>";
                echo "<td><a href='WorkoutDelete.php?Wid=$row[w_ID]'><image src='deleteicon.png' width=45px height=40px></a></td>";
            }
            }else{
                echo "<tr><td colspan='7'>No Workouts Found</td></tr>";
        }

            }
        ?>
    </tbody>
    </table>
<div>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="js/main.js"></script>
</div>
    </body>

</html>
