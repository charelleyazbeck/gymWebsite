<?php  session_start();
if($_SESSION['isloggedinadmin']!=1){
    header("Location:Index.php");
}
else{
require_once 'connection.php';
if(isset($_GET['ItemId'])){
    $id = $_GET['ItemId'];
    $query="SELECT * FROM items WHERE i_ID=$id";
    $result = $con->query($query);
}
if($result){
$row=mysqli_fetch_assoc($result);
}else{echo "DATABASE INTERNAL ERROR"; }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Items</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script><link href="index.css" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css">
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
    
    
    <form method="post" action="ShopEditItems2.php" enctype="multipart/form-data" class="form1">
        <h3>Edit Items</h3>
        <table>
            <tr><td>Item Name:&nbsp</td><td><input type="text" placeholder="Enter Item Name" name="ItemName" value="<?php echo "$row[iName]"?>"></td></tr>
              <tr><td>Item Id:&nbsp</td><td><input type="text" placeholder="Enter Item Id" name="ItemId" value="<?php echo "$row[i_ID]"?>" readonly></td></tr>
              <tr><td>Item Description:&nbsp</td><td><input type="text" placeholder="Enter Item Id" name="ItemDescription" value="<?php echo "$row[iDescription]"?>"></td></tr>
             <tr><td>Item Image:&nbsp</td><td><input type="file"  name="ItemImage1" ></td><td><div style="width: 80px;height:80px"><img src="<?php echo "$row[item_image_src]"?>" class="image-css"></div></td></tr>
             <tr><td>Item Expiry Date:&nbsp</td><td><input type="date"  name="Expdate" value="<?php echo "$row[iExpDate]"?>"></td></tr>
             <tr><td>Category:&nbsp</td><td>Equipment<input type="radio" name="category" value="Equipment">&nbsp Supplements<input type="radio" name="category" value="Supplements"></td></tr>
             <tr><td>Item Price:&nbsp</td><td><input type="text" placeholder="Enter Item Price" name="ItemPrice" value="<?php echo "$row[iPrice]"?>"></td></tr>
              <tr><td>Item quantity:&nbsp</td><td><input type="text" placeholder="Enter quantity" name="ItemQuantity" value="<?php echo "$row[iQuantityInStock]"?>"></td></tr>
              <input type="hidden" name="ItemImage2" value="<?php echo "$row[item_image_src]"?>">
          <tr><td><input type="submit" value="Update"></td></tr>
        </table>
        <?php
        if(isset($_SESSION['editerror'])){
            if($_SESSION['editerror'] !=''){
                echo "<h2>".$_SESSION['editerror']."</h2>";
            }
        }
        ?>
      </form>
</div>
    </div>
</body>
</html>
<style>
        .image-css{
            object-fit: contain;
            width: 100%;
            height: 100%;
        }
    </style>