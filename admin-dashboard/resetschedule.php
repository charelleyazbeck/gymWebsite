<link href="css/navbar.css" rel="stylesheet">
<?php
require_once 'connection.php';
session_start();

// Check if user is logged in
if ($_SESSION['isloggedinadmin'] != 1) {
    header("Location: index.php");
    exit();
}

$msg = "";

// Update public classes table
$queryclasses = "UPDATE publicclasses SET "
    . "pbCName=NULL, "
    . "pbCRoomNum=NULL, "
    . "pbCDuration=NULL, "
    . "capacity=NULL, "
    . "pbCPrice=NULL, "
    . "pbCStatus='nosession',"
        . "t_ID=NULL";

$classesSuccess = $con->query($queryclasses);
if ($classesSuccess === TRUE) {
    $msg = "Public schedule reset successfully";
} else {
    $msg = "Error clearing public classes table: " . $con->error;
}

// Truncate PublicClassRegistrations table
$querybooking = "TRUNCATE TABLE pbcregistrations";
$bookingSuccess = $con->query($querybooking);
if ($bookingSuccess === TRUE) {
    $msg .= "\n PublicClassRegistrations table cleared successfully";
} else {
    $msg .= "\n'Error clearing PublicClassRegistrations table: " . $con->error;
}

// Update private classes table
$queryPrivateClasses = "UPDATE privateclasses SET "
    . "prvCName=NULL, "
    . "prvCRoomNum=NULL, "
    ."prvCDuration=NULL,"
    . "c_ID=NULL,"
    . "prvCPrice=NULL, "
    . "prvCRegistrationDate=NULL,"
    . "prvCStatus='Available'";

$privateClassesSuccess = $con->query($queryPrivateClasses);
if ($privateClassesSuccess === TRUE) {
    $msg .= "\n Private schedule reset successfully";
} else {
    $msg .= "\n Error clearing private classes table: " . $con->error;
}


// Display messages and redirect if sucess or no sucess
if ($classesSuccess && $bookingSuccess && $privateClassesSuccess) {
    echo "<body>
    <div class='message-cont'>
            <div class='message-image-cont'>
        <img src='images/check.svg'>
    </div>
    <h3>
    $msg
    </h3>
    </div>
    </body>";
    echo "<script type='text/javascript'>
            setTimeout(function(){
                window.location.href = 'Schedule.php';
            }, 3000);
          </script>";
} else {
    echo "<body>
    <div class='message-cont'>
            <div class='message-image-cont'>
        <img src='images/error.svg'>
    </div>
    <h3>
    $msg
    </h3>
    </div>
    </body>";
    echo "<script type='text/javascript'>
            setTimeout(function(){
                window.location.href = 'Schedule.php';
            }, 3000);
          </script>";
}
?>
