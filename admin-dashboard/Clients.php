<?php
session_start();
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
    <title>Clients</title>
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

    <form method="post" action="clientsSearch.php" class="form1">
        <h3>What information to search about this client:</h3><!-- the logic here is to search for specific info-->
        <table>

            <tr><td><input type="text" size="48" name="users" placeholder="Enter an id or just hit search for all users" class="user-txt"></td></tr>
            <tr>
                <td>First Name &nbsp<input type="checkbox" name="usersearch[]" value="c_FirstName"></td>
                <td>Last Name &nbsp<input type="checkbox" name="usersearch[]" value="c_LastName"></td>
                <td>Email &nbsp<input type="checkbox" name="usersearch[]" value="c_Email"></td>
                <td>DOB &nbsp<input type="checkbox" name="usersearch[]" value="c_DOB"></td>
            </tr>
            
            <tr>
                <td>PhoneNumber &nbsp<input type="checkbox" name="usersearch[]" value="c_PhoneNumber"></td>
                <td>Gender &nbsp<input type="checkbox" name="usersearch[]" value="c_Gender"></td>
                <td>Address &nbsp<input type="checkbox" name="usersearch[]" value="c_Address"></td> 
                
            </tr>
            
            <tr>
                <td>Balance &nbsp<input type="checkbox" name="usersearch[]" value="c_balance"></td>
                <td>Registration Date &nbsp<input type="checkbox" name="usersearch[]" value="c_RegistrationDate"></td>
            </tr>
            <tr>
                <td>Last Login &nbsp<input type="checkbox" name="usersearch[]" value="c_LastLogIn"></td>
            </tr>
            <tr><td><input type="submit" value="Search"></td></tr>
        </table>
        
    </form>
    </div>
</body>
</html>