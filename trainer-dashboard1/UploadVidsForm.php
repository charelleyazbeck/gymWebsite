<?php 
session_start();
require_once 'connection.php';
if($_SESSION['isloggedintrainer']!=1){
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">

    <title>Upload</title>
</head>
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
    <form action="UploadVids.php" method="post" enctype="multipart/form-data" class="form1">
        <table >
            <tr><td>Upload:</td><td><input type="file" name="Wvideo"></td></tr>
            <tr><td>Title:</td><td><input type="text" name="Wtitle" placeholder="Enter Workout title"></td></tr>
            <tr><td>Description:</td><td><textarea rows="3" cols="50" name="Wdescription"></textarea></td></tr>
            <tr><td>Workout type:</td>
            <td>
            <select name="Wtype">
                <option value="crossfit">crossfit</option>
                <option value="pilates">pilates</option>
                <option value="zumba">zumba</option>
                <option value="resistance">resistance</option>
                <option value="atHome">At Home Workouts</option>
            </select></td>
        </tr>
            <tr><td colspan="2"><input type="submit" value="Upload"></td></tr>
        </table>
        <h2> <?php
            if(isset($_SESSION['wuploaderror'])){
                if($_SESSION['wuploaderror'] != ''){
                echo "<h2>".$_SESSION['wuploaderror']."</h2>";
                $_SESSION['wuploaderror'] = '';
            }
            }
          ?></h2>
    </form>
</div>
        </div>
</body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="js/main.js"></script>
</html>
<?php 
?>