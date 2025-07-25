<link rel="stylesheet" href="css/navbar.css">
<?php  
session_start();

if (!isset($_SESSION['isloggedinadmin']) || $_SESSION['isloggedinadmin'] != 1) {
    header("Location: index.php");
    exit();
}

require_once 'connection.php';

$sessionnumber = $_POST['sessionnumber'];

if (isset($_POST['SessionName']) && $_POST['SessionName'] != ""
    && isset($_POST['SessionDuration']) && $_POST['SessionDuration'] != ""
    && isset($_POST['Trainerid']) && $_POST['Trainerid'] != ""
    && isset($_POST['Capacity']) && $_POST['Capacity'] != ""
    && isset($_POST['Price']) && $_POST['Price'] != ""
    &&  isset($_POST['RoomNumber']) && $_POST['RoomNumber'] != "") {
    
    $pbCName = $_POST['SessionName'];
    $pbCDuration = $_POST['SessionDuration'];
    $pbCPrice = $_POST['Price'];
    $capacity = $_POST['Capacity'];
    $t_ID = $_POST['Trainerid'];
    $pbCRoomNum = $_POST['RoomNumber'];

    $gettrainerspeciality = "SELECT * FROM trainers WHERE t_ID='$t_ID'";
    $specialityres = $con->query($gettrainerspeciality);
    if($specialityres){
        if($specialityres->num_rows>0){
            $specialityrow = $specialityres->fetch_assoc();
            $speciality = $specialityrow['t_Speciality'];

            if($speciality != $pbCName){
                $msg = "Error: Trainer speciality and session name doesnt match.";
                echo "
                    <body>
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
                          exit();

            }
        }
    }

    $checktrainer = "SELECT * FROM trainers WHERE t_ID='$t_ID'";
    $checktrainerresult = $con->query($checktrainer);
    if($checktrainerresult->num_rows == 0){
        $msg = "Error:Trainer Do Not Exist.";
                echo "
                    <body>
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
                          exit();
    }

    // Retrieve the current status and data from the db to adjust it and log them
    $query = "SELECT pbCName, pbCDuration, pbCRoomNum, pbCPrice, capacity, t_ID, pbCStatus 
              FROM publicclasses 
              WHERE pbC_ID = '$sessionnumber'";
    $result = $con->query($query);

    if ($result && $result->num_rows > 0) {
        $status_row = $result->fetch_assoc();
        $status = $status_row['pbCStatus'];

        // Initialize the message variable
        $msg = '';

        if ($status === 'exists') {
            // Check for changes and log them
            if ($pbCName != $status_row['pbCName']) {
                $msg .= "Session Name: {$status_row['pbCName']} -> $pbCName; ";
            }
            if ($pbCDuration != $status_row['pbCDuration']) {
                $msg .= "Duration: {$status_row['pbCDuration']} -> $pbCDuration; ";
            }
            if ($pbCRoomNum != $status_row['pbCRoomNum']) {
                $msg .= "Room Number: {$status_row['pbCRoomNum']} -> $pbCRoomNum; ";
            }
            if ($pbCPrice != $status_row['pbCPrice']) {
                $msg .= "Price: {$status_row['pbCPrice']} -> $pbCPrice; ";
            }
            if ($capacity != $status_row['capacity']) {
                $msg .= "Capacity: {$status_row['capacity']} -> $capacity; ";
            }
            if ($t_ID != $status_row['t_ID']) {
                $msg .= "Trainer ID: {$status_row['t_ID']} -> $t_ID; ";
            }

            // If no changes were detected
            if ($msg === '') {
                $msg = 'No change';
            } else {
                $msg = 'Edited: ' . $msg;
            }

        } elseif ($status === 'nosession') {
            $msg = 'Added the session';
        }


        // Update table
        $query = "UPDATE publicclasses 
                  SET pbCName = '$pbCName', pbCStatus = 'exists', pbCDuration = '$pbCDuration', 
                      pbCRoomNum = '$pbCRoomNum', pbCPrice = '$pbCPrice', capacity = '$capacity', t_ID = '$t_ID'
                  WHERE pbC_ID = '$sessionnumber'";

        if ($con->query($query) === TRUE) {
            // Now update the privateclasses table where t_ID matches
            $prvCStatus = 'Booked';
            $queryPrivate = "UPDATE privateclasses 
                             SET prvCStatus = '$prvCStatus'
                             WHERE t_ID = '$t_ID' AND prvC_ID = '$sessionnumber'";
            
            if ($con->query($queryPrivate) === TRUE) {
                // Insert into pbceditedbyadmin for logs
                
                $admin_id = $_SESSION['adminuser'];
                echo $admin_id;
                $insertLog = "INSERT INTO pbceditedbyadmin
                              VALUES ('','$admin_id', '$sessionnumber', '$msg', NOW())";

                if ($con->query($insertLog) === TRUE) {
                    unset($_SESSION['error']);
                    $msg = "Schedule Updated Succesfully";
                    echo "
                    <body>
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
                    $msg = "Error logging the edit: " . $con->error;
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
                window.location.href = 'editschedule.php?session=$sessionnumber';
            }, 3000);
          </script>";

                }
            } else {
                $msg = "Error updating private session: " . $con->error;
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
                window.location.href = 'editschedule.php?session=$sessionnumber';
            }, 3000);
          </script>";
            }
        } else {
            $msg = "Error updating public session: " . $con->error;
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
                window.location.href = 'editschedule.php?session=$sessionnumber';
            }, 3000);
          </script>";
        }

    } else {
        $msg = "Session not found.";
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
                window.location.href = 'editschedule.php?session=$sessionnumber';
            }, 3000);
          </script>";
    }
} else {
    $msg = "Please fill in all required fields.";
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
                window.location.href = 'editschedule.php?session=$sessionnumber';
            }, 3000);
          </script>";
}

$con->close();
?>
