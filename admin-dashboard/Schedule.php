<?php
require_once 'connection.php';
session_start();
if($_SESSION['isloggedinadmin']!=1){
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Schedule</title>
    <link href="index.css" rel="stylesheet">
    <meta charset="UTF-8">
    <link href="css/navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
   
</head>
<div class="main-cont">
<div class="container" id="container">
    <div class="brand">
        <h3>Dashboard</h3>
        <a href="#" id="toggle"><ion-icon name="menu"></ion-icon></a>
    </div>
    <div class="navbar">
<ul>
            <li><a href="Schedule.php"><div class="icon-image"><img src="images/calendar-schedule-svgrepo-com.svg"></div><span>Schedule</span></a></li>
            <li><a href="showRegistered.php"><div class="icon-image"><img src="images/form.svg"></div><span>Registered</span></a></li>

            <li class="dropdown">
                <a href="classesedited.php"><div class="icon-image"><img src="images/pen-solid.svg"></div><span>Schedule Edited</span></a>
                <div class="dropdown-content">
					<ul>
                    <li><a href="PbcSchedule.php">Public Schedule Edited</a></li>
                    <li><a href="PrvSchedule.php">Private Schedule Edited</a></li>
				    </ul>
                </div>
            </li>
            <li class="dropdown">
                <a href="Shop.php" class="dropbtn"><div class="icon-image"><img src="images/shop-solid.svg"></div><span>Shop</span></a>
                <div class="dropdown-content">
					<ul>
                    <li><a href="ShopAddItemsForm.php">Add Items</a></li>
                    <li><a href="ShopViewItems.php">View Items</a></li>
                    <li><a href="Modification.php">Modifications</a></li>
				    </ul>
                </div>
            </li>
            <li><a href="Points.php"><div class="icon-image"><img src="images/plus-solid.svg"></div><span>Points</span></a></li>
			<li class="dropdown">
            <a href="Users.php" class="dropbtn"><div class="icon-image"><img src="images/user-solid (1).svg"></div><span>Users</span></a>
			<div class="dropdown-content">
					<ul>
                    <li><a href="Clients.php">Clients</a></li>
                    <li><a href="AddTrainer.php">Add Trainers</a></li>
                    <li><a href="ViewTrainers.php">View Trainers</a></li>
                    <li><a href="Admins.php">Admins</a></li>
				    </ul>
                </div>
		    </li>
            <li class="dropdown">
			<a href="Orders.php" class="dropbtn"><div class="icon-image"><img src="images/cart-shopping-solid (1).svg"></div><span>Orders</span></a>
			<div class="dropdown-content">
					<ul>
                    <li><a href="assignordersform.php">Assign</a></li>
                    <li><a href="waitingordersform.php">Waiting Delivery</a></li>
                    <li><a href="completedordersform.php">Completed</a></li>
				    </ul>
                </div>
		    </li>
            <li class="dropdown">
				<a href="Ratings.php" class="dropbtn"><div class="icon-image"><img src="images/star-solid.svg"></div><span>Ratings</span></a>
				<div class="dropdown-content">
					<ul>
                    <li><a href="TrainersRating.php">Trainers Rating</a></li>
                    <li><a href="ItemsRating.php">Items Rating</a></li>
				    </ul>
                </div>
			</li>
            <li><a href="workouts.php"><div class="icon-image"><img src="images/youtube.svg"></div><span>Workouts</span></a></li>
            <li><a href="Logout.php"><div class="icon-image"><img src="images/arrow-right-from-bracket-solid.svg"></div><span>Logout</span></a></li>
        </ul>
    </div>
</div>
    <div class="schedule adminside">
                <div class="classtime-table">

                    <table border="5" class="">
    <thead>
        <tr>
            <th><a href="resetschedule.php">RESET</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
            <th>Sunday</th>
        </tr>
    </thead>
    <tbody>
  <?php  
function formatTime($startTime, $duration) {
    $endTime = $startTime + floor($duration / 60) . ':' . str_pad($duration % 60, 2, '0', STR_PAD_LEFT);
    return "$startTime:00 - $endTime";// explained in fitness site the function in prvschedule
}

$c = 10; // Initial time set to 10:00
for ($i = 1; $i <= 6; $i++) {
    echo "<tr>";
    echo "<td class='workout-time'>$c:00</td>";

    for ($j = 1; $j <= 7; $j++) {
        $sessionID = "$j.$i";
        $query = "SELECT * FROM publicclasses WHERE pbC_ID = '$sessionID'";
        $result = $con->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($row['pbCStatus'] == 'exists') {
                $duration = $row['pbCDuration'];

                $timeslot = formatTime($c, $duration);

                // Fetch trainer's name
                $trainerQuery = "SELECT t_FirstName, t_LastName FROM trainers WHERE t_ID = '{$row['t_ID']}'";
                $trainerResult = $con->query($trainerQuery);
                $trainerName = '';
                
                if ($trainerResult && $trainerResult->num_rows > 0) {
                    $trainerRow = $trainerResult->fetch_assoc();
                    $trainerName = $trainerRow['t_FirstName'] . ' ' . $trainerRow['t_LastName'];
                }

                // Fetch enrollment count
                $enrollmentQuery = "SELECT COUNT(*) AS enrolled FROM pbcregistrations WHERE pbC_ID = '$sessionID'";
                $enrollmentResult = $con->query($enrollmentQuery);
                $enrolled = 0;
                
                if ($enrollmentResult && $enrollmentResult->num_rows > 0) {
                    $enrollmentRow = $enrollmentResult->fetch_assoc();
                    $enrolled = $enrollmentRow['enrolled'];
                }

                // Display session details
                echo "<td class='hover-bg ts-item'>";
                echo "<a href='editschedule.php?session=$sessionID' class='scheduleheader'>" . $row['pbCName'] . "</a>";
                echo "<span>$timeslot</span>";
                echo "<h6>Trained by: $trainerName</h5>";
                echo "<h6>Enrolled: $enrolled/{$row['capacity']}</h5>";
                echo "<h6>Price: \${$row['pbCPrice']}</h5>";
                echo "<h6>Room: {$row['pbCRoomNum']}</h5>";
                echo "</td>";

            } else {
                // Display "No Session" if pbCStatus is not "exists"
                echo "<td class='hover-bg ts-item'>";
                echo "<a href='editschedule.php?session=$sessionID' class='scheduleheader'>$sessionID</a>";
                echo "<span>No Session</span>";
                echo "</td>";
            }
        } else {
            // Display "no session" if no session data exists
            echo "<td class='hover-bg ts-item'>";
            echo "<a href='editschedule.php?session=$sessionID'>$sessionID</a>";
            echo "<span>No Session</span>";
            echo "</td>";
        }
    }

    echo "</tr>";
    $c += 2; // Increment the time by 2 hours
}
?>
</tbody>
</table>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="js/main.js"></script>
        </div>
    </div>
</div>
    </body>
</html>

