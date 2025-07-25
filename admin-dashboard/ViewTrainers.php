<?php
session_start();
if ($_SESSION['isloggedinadmin'] != 1) {
    header("Location:index.php");
} else {
    require_once 'connection.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Trainers</title>
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

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="js/main.js"></script>
<?php
$query = "SELECT * FROM trainers";
$res = $con->query($query);

echo "<table class='viewtable' >
<thead>
<tr>
<th>Trainer ID</th>
<th>Email</th>
<th>First Name</th>
<th>Last Name</th>
<th>Phone Number</th>
<th>Gender</th>
<th>DOB</th>
<th>Address</th>
<th>Speciality</th>
<th>Last Login</th>
<th>Starting Date</th>
<th>Delete Trainer</th>
</tr>
</thead>
<tbody>
";
if($res){
    if($res->num_rows>0){
        
        while($row = $res->fetch_assoc()){
            echo "<tr>";
            echo "<td style='width:100px;height:120px'>$row[t_ID]</td>";
            echo "<td>$row[t_Email]</td>";
            echo "<td>$row[t_FirstName]</td>";
            echo "<td>$row[t_LastName]</td>";
            echo "<td>$row[t_PhoneNumber]</td>";
            echo "<td>$row[t_Gender]</td>";
            echo "<td>$row[t_DOB]</td>";
            echo "<td>$row[t_Address]</td>";
            echo "<td>$row[t_Speciality]</td>";
            echo "<td>$row[t_LastLogin]</td>";
            echo "<td>$row[t_StartingDate]</td>";
            echo "<td><a href='deletetrainer.php?t_ID=$row[t_ID]'><img src='deleteicon.png' width='45' height='40' alt='Delete'></a></td>";
            echo"</tr>";
        }
        
    }
    echo "</tbody></table>";
}
?>
    </div>
<style>
td,th{
	border: 1px solid #ddd;
}
</style>