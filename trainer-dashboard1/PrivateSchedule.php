<?php
session_start();
if ($_SESSION['isloggedintrainer'] != 1) {
    header("Location:index.php");
} else {
    require_once("connection.php");
}
if (!isset($_SESSION['temail'])) {
    echo "Session email is not set.";
    header("Location:index.php");
}

$email = $_SESSION['temail'];
$query = "SELECT t_ID FROM trainers WHERE t_Email='$email'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $t_ID = $row['t_ID'];
}

function formatTime($startTime, $duration) {
    $endTime = $startTime + floor($duration / 60) . ':' . str_pad($duration % 60, 2, '0', STR_PAD_LEFT);
    return "$startTime:00 - $endTime";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trainer Schedule</title>
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <style>
            .changetext {
                position: relative; /* Ensure positioning for pseudo-elements */
                display: inline-block; /* Keep the link inline but allow for pseudo-element adjustments */
                color: inherit; /* Maintain the original color unless hovered */
            }

            .changetext::after {
                content: ''; /* Initially, no content */
                position: absolute; /* Position relative to the link */
                left: 0; /* Align it to the left of the link */
                top: 0; /* Align it to the top of the link */
                width: 100%; /* Cover the entire link width */
                height: 100%; /* Cover the entire link height */
                color: transparent; /* Make it invisible initially */
            }

            .changetext:hover::after {
                content: "Take OFF?"; /* Change the content on hover */
                color: red; /* The color of the new text */
                text-align: center; /* Center the text if necessary */
                display: inline-block; /* Ensure it stays inline */
                white-space: nowrap; /* Prevent wrapping */
            }

            .changetext:hover {
                color: transparent; /* Hide the original text by making it transparent */
            }

        </style>

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
<div class="schedule adminside">

        <div class="row">
            <div class="classtime-table">
                <table border="5">
                    <thead>
                        <tr>
                            <th></th>
                            <th><a href="takedayoff.php?day=1" class="changetext">Monday</a></th>
                            <th><a href="takedayoff.php?day=2"class="changetext">Tuesday</a></th>
                            <th><a href="takedayoff.php?day=3"class="changetext">Wednesday</a></th>
                            <th><a href="takedayoff.php?day=4"class="changetext">Thursday</a></th>
                            <th><a href="takedayoff.php?day=5"class="changetext">Friday</a></th>
                            <th><a href="takedayoff.php?day=6"class="changetext">Saturday</a></th>
                            <th><a href="takedayoff.php?day=7"class="changetext">Sunday</a></th>
                        </tr>
                    </thead>
                    <tbody>
<?php
$start_time = 10;
for ($i = 1; $i <= 6; $i++) {
    echo "<tr>";
    echo "<td class='workout-time'>$start_time:00</td>";

    for ($j = 1; $j <= 7; $j++) {
        $session_id = "$j.$i";

        // 7ot kel l sessions available (no session);
        $session_name = "No Session";
        $room_num = "Want a break?";
        $time_slot = "<a href='takesessionoff.php?session=$session_id'>Click here</a>";
        $contact_info = "";

        // Check public classes awal chi
        $queryPublic = "SELECT pbCName, pbCRoomNum, pbCDuration FROM publicclasses WHERE pbC_ID = '$session_id' AND t_ID = '$t_ID'";
        $resultPublic = mysqli_query($con, $queryPublic);
        $rowPublic = mysqli_fetch_assoc($resultPublic);

        if ($rowPublic) {
            $session_name = $rowPublic['pbCName'];
            $room_num = "Room: " . $rowPublic['pbCRoomNum'];
            $duration = $rowPublic['pbCDuration'];
            $time_slot = formatTime($start_time, $duration);
        }


        // check private classes
        $queryPrivate = "SELECT c_ID, prvCRoomNum, prvCDuration, prvCStatus FROM privateclasses WHERE prvC_ID = '$session_id' AND t_ID = '$t_ID'";
        $resultPrivate = mysqli_query($con, $queryPrivate);
        $rowPrivate = mysqli_fetch_assoc($resultPrivate);

        if ($rowPrivate) {
            if ($rowPrivate['prvCStatus'] === 'NOT AVAILABLE') {
                $session_name = "OFF";
                $room_num = "";
                $time_slot = "";
            } elseif ($rowPrivate['prvCStatus'] === 'Booked' && !is_null($rowPrivate['c_ID'])) {
                $client_id = $rowPrivate['c_ID'];
                $queryClient = "SELECT CONCAT(c_FirstName, ' ', c_LastName) AS c_Name, c_PhoneNumber FROM clients WHERE c_ID = '$client_id'";
                $resultClient = mysqli_query($con, $queryClient);
                $clientData = mysqli_fetch_assoc($resultClient);

                $session_name = $clientData['c_Name'];
                $room_num = "Room: " . $rowPrivate['prvCRoomNum'];
                $duration1 = $rowPrivate['prvCDuration'];
                $time_slot = formatTime($start_time, $duration1);
                $contact_info = $clientData['c_PhoneNumber'];
            }
        }
        //eche thhe td
        echo "<td class='hover-bg ts-item'>
                                <h6>$session_name</h6>
                                    <span>$contact_info</span>
                                    <span>$room_num</span>
                                <p>$time_slot</p>
                            </td>";
    }
    echo "</tr>";
    $start_time += 2;
}
?>
                    </tbody>
                </table>
            </div>
        </div>
</div>
</div>
    </body>
    <style>
    td,th{
        border: 1px solid #ddd;
    }
    </style>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="js/main.js"></script>
</html>
