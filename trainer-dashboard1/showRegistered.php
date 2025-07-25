<?php
session_start();
if ($_SESSION['isloggedintrainer'] != 1) {
    header("Location: index.php");
    exit;
} else {
    require_once 'connection.php';
}

$email = $_SESSION['temail'];

// Fetching the trainer's ID based on the email
$query = "SELECT t_ID FROM trainers WHERE t_Email='$email'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $t_ID = $row['t_ID'];

    // Query to get the session IDs and corresponding client IDs
    $query = "SELECT * FROM privateclasses WHERE t_ID='$t_ID' AND c_ID IS NOT NULL";
    
    $result = $con->query($query);

    if (!$result) {
        die("Query failed: " . $con->error);
    }

    $nbr = mysqli_num_rows($result);
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <li><a href="PrivateSchedule.php"><div class="icon-image"><img src="images/calendar-schedule-svgrepo-com.svg"></div><span>Schedule</span></a></li>
            <li><a href="showRegistered.php"><div class="icon-image"><img src="images/form.svg"></div><span>Registered</span></a></li>
            <li><a href="UploadVidsForm.php"><div class="icon-image"><img src="images/upload-solid.svg"></div><span>Upload Videos</span></a></li>
            <li><a href="workouts.php"><div class="icon-image"><img src="images/youtube.svg"></div><span>Your Workouts</span></a></li>
            <li><a href="Logout.php"><div class="icon-image"><img src="images/arrow-right-from-bracket-solid.svg"></div><span>Logout</span></a></li>
        </ul>
    </div>
</div>
<div>
<table border="1" style="margin-left: 2px;" class="viewtable"><thead>
    <tr>
        <th>Session ID</th>
        <th>Client ID</th>
        <th>Registeration</th>
        <th>Session Type</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    if ($nbr > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['prvC_ID'] ?? '') . '</td>';
            echo '<td>' . htmlspecialchars($row['c_ID'] ?? '') . '</td>';
            echo '<td>' . htmlspecialchars($row['prvCRegistrationDate']).'</td>';
            echo '<td>Private Session</td>';
            echo '</tr>';
        }
    }

    $query2 = "SELECT * FROM publicclasses WHERE t_ID='$t_ID' && pbCStatus='exists'";
    $result2 = $con->query($query2);
    if($result2){
        if($result2->num_rows>0){
            while($row2 = $result2->fetch_assoc()){
                $pbc_id = $row2['pbC_ID'];
                $query3 = "SELECT * FROM pbcregistrations WHERE pbC_ID='$pbc_id'";
                $result3 = $con->query($query3);
                if($result3){
                    if($result3->num_rows>0){
                        while($row3 = $result3->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>$row3[pbC_ID]</td>";
                            echo "<td>$row3[c_ID]</td>";
                            echo "<td>$row3[pbCRegistrationDate]</td>";
                            echo "<td>Public Session</td>";
                        }
                    }
                }
            }
        }
    }

    ?>
    </tbody>
</table>
</div></div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="js/main.js"></script>
</body>
</html>
