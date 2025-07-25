
<!DOCTYPE html>
<?php  session_start();
if($_SESSION['isloggedinadmin']!=1){
    header("Location:index.php");
}
else{
require_once 'connection.php';

$query1="SELECT * FROM  items";
$result1 = $con->query($query1);
$nbr = mysqli_num_rows($result1);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Items</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
<div >
   <table border="1" bold style="margin-left: 2px;" class="viewtable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Item Description</th>
            <th>Image</th>
            <th>Expiry date</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>     
            <th style="width: 70px; height:70px">Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        

            
        for($i=0;$i<$nbr;$i++){
            while($row = $result1->fetch_assoc()){
                $query= "
            SELECT m.a_ID, m.Modificationtime
            FROM modifiesitems m
            WHERE m.i_ID = '$row[i_ID]'
            ORDER BY m.Modificationtime DESC
            LIMIT 1";
        $result = $con->query($query);
        $row1 = $result->fetch_assoc();
            echo"<tr>";
            echo"<td>$row[i_ID]</td>";
            echo"<td>$row[iName]</td>";
            echo"<td>$row[iDescription]</td>";
            echo"<td><div class='img-cont'><img src='$row[item_image_src]' class='image-css'></div></td>";
            echo"<td>$row[iExpDate]</td>";
            echo"<td>$row[iType]</td>";
            echo"<td>$row[iPrice]</td>";
            echo"<td>$row[iQuantityInStock]</td>";
            echo "<td><a href='ShopEditItems.php?ItemId=$row[i_ID]'><image src='editicon.png' width=45px height=40px></td>";
            echo "<td><a href='ShopDeleteItems.php?ItemId=$row[i_ID]'><image src='deleteicon.png' width=45px height=40px></a></td>";
            echo "</tr>";
            }
        }
        ?>
    </tbody>
    </table>
</div>

</div>
 
    </body>
    <style>
        .img-cont{
            width: 70px;
            height: 70px;
        }
        .image-css{
            object-fit: contain;
            width: 100%;
            height: 100%;
        }
        td,th{
	border: 1px solid #ddd;
}
 </style>