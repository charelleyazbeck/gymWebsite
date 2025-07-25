<?php session_start();
if($_SESSION['isloggedinadmin']!=1){
    header("Location:index.php");
}
else{
require_once 'connection.php';}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="css/navbar.css" rel="stylesheet">
</head>
<body>
    <div class="main-cont">
    <div class="dashboard-buttons">
    <table>
        <tr>
        <td><a href="Clients.php"><button>Clients</button></a></td>
        <td><a href="AddTrainer.php"><button>Add Trainers</button></a></td>
        <td><a href="ViewTrainers.php"><button>View Trainers</button></a></td>
        <td><a href="Admins.php"><button>Admins</button></a></td>
        </tr>
    </table>
</div>
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
</div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="js/main.js"></script>