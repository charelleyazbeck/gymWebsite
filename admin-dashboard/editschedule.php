<?php  
session_start();

// Check if the user is logged in
if (!isset($_SESSION['isloggedinadmin']) || $_SESSION['isloggedinadmin'] != 1) {
    header("Location: index.php");
    exit();
}

require_once 'connection.php';

// Retrieve the session number using get from url
$sessionnumber = isset($_GET['session']) ? $_GET['session'] : null;

if (!$sessionnumber) {
    // If no nbr error msg w redirect
    $_SESSION['error'] = "No session number provided.";
    header("Location: schedule.php"); // Redirect to the schedule menu
    exit();
}
?>
<body>
    <link rel="stylesheet" href="css/navbar.css">
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
    <form action="editschedule2.php" method="post" class="form1">
        <table>
            <tr><td>Currently editing session: <?php echo $sessionnumber ?></td></tr>
            <tr><td>Session Name: </td><td><select name="SessionName">
                <option value="crossfit">crossfit</option>
                <option value="pilates">pilates</option>
                <option value="zumba">zumba</option>
                <option value="resistance">resistance</option>
                <option value="atHome">At Home Workout</option>
            </select></td></tr>
            <tr><td>Session Duration in minutes: </td><td><input type="number" name="SessionDuration" min='1'></td></tr>
            <tr><td>Room Number: </td><td><input type="number" placeholder="Enter room number" name="RoomNumber" min='1'></td></tr>
            <tr><td>Trainer ID: </td><td>
                
                    <?php
                    $gettrainer = "SELECT * FROM trainers";
                    $result = $con->query($gettrainer);
                    if($result){
                        if($result->num_rows>0){
                            echo "<select name='Trainerid'>";
                            while($row = $result->fetch_assoc()){
                                echo "<option value='$row[t_ID]'>$row[t_ID]</option>";
                            }
                            echo "</select>";
                        }else{
                            echo "No current trainers";
                        }
                    }
?>
                
            </td></tr>
            <tr><td>Capacity: </td><td><input type="text" placeholder="Enter capacity" name="Capacity"></td></tr>
            <tr><td>Price: </td><td><input type="text" name="Price" placeholder="Enter session price"></td></tr>
            <!-- Passing the session number as a hidden input -->
            <input type="hidden" name="sessionnumber" value="<?php echo htmlspecialchars($sessionnumber); ?>">
            <tr><td><input type="submit" value="Insert"></td></tr>
        </table>
    </form>
</div></div>
</body>
<td><input type="text" placeholder="Enter trainer ID" name="Trainerid"></td>