<?php
session_start();
if($_SESSION['isloggedintrainer'] != 1){
    header("Location:index.php");
    exit();
} else {
    require_once("connection.php");
}

$email = $_SESSION['temail'];
$query = "SELECT t_ID FROM trainers WHERE t_Email='$email'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['t_ID'];

    $day = $_GET['day'];
    $status = "NOT AVAILABLE";

    // Check if there is any booked sessions on the selected day
    $checkQuery = "SELECT COUNT(*) AS booked_count 
                   FROM privateclasses 
                   WHERE t_ID = '$id' 
                   AND LEFT(prvC_ID, 1) = '$day'
                   AND prvCStatus = 'booked'";
    $checkResult = mysqli_query($con, $checkQuery);
    $checkRow = mysqli_fetch_assoc($checkResult);

    if ($checkRow['booked_count'] > 0) {
        // If any session is booked, notify the user that the day cannot be taken off
        header("Location:PrivateSchedule.php");
    } else {
        // If no booked sessions exist, update the status to not AVAILABLE
        $updateQuery = "UPDATE privateclasses 
                        SET prvCStatus = '$status' 
                        WHERE t_ID = '$id' 
                        AND LEFT(prvC_ID, 1) = '$day'";
        
        if ($con->query($updateQuery)) {
            header("Location:PrivateSchedule.php");
        } 
    }
} 

$con->close();
?>
