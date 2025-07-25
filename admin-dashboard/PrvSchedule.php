<?php session_start();
if($_SESSION['isloggedinadmin']!=1){
    header("Location:index.php");
    exit;
}
else{
require_once 'connection.php';
}
$query = "SELECT * FROM privateclasses ORDER BY t_ID";
$result = $con->query($query);

if (!$result) {
    die("Query failed: " . $con->error); 
}

$nbr = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard home</title>
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
<div>
    <table border="1" bold style="margin-left: 2px; height:100%;width:100%" class="viewtable"><thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Room Num</th>
            <th>Duration</th>
            <th>Price</th>
            <th>Client</th>
            <th>Date</th>
            <th>Trainer ID</th>
            
        </tr>
        </thead>
        <tbody>
        <?php 
    // Check if there are any rows in the result
    if ($nbr > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>'; 
            echo '<td>' . htmlspecialchars($row['prvC_ID'] ?? '') . '</td>';
            echo '<td>' . htmlspecialchars($row['prvCName'] ?? '') . '</td>';
            echo '<td>' . htmlspecialchars($row['prvCStatus'] ?? '') . '</td>';
            echo '<td>' . htmlspecialchars($row['prvCRoomNum'] ?? '') . '</td>';
            echo '<td>' . htmlspecialchars($row['prvCDuration'] ?? '') . '</td>';
            echo '<td>' . htmlspecialchars($row['prvCPrice'] ?? '') . '</td>';
            echo '<td>' . htmlspecialchars($row['c_ID'] ?? '') . '</td>';
            echo '<td>' . htmlspecialchars($row['prvCRegistrationDate'] ?? '') . '</td>';
            echo '<td>' . htmlspecialchars($row['t_ID'] ?? '') . '</td>';
            echo '</tr>'; 
        }
    } else {
        echo '<tr><td colspan="8">No data available</td></tr>'; // Handle no data case
    }
    ?>
        </tbody>
    </table>
</div>
</div>
</body>

</html>