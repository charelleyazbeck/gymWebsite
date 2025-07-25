<?php 
session_start();
require_once('connection.php');

if ($_SESSION['isloggedin'] != 1) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];
} else {
    header("Location: login.php");
    exit();
}
if(isset($_GET['t_ID'])){
    $t_ID= $_GET['t_ID'];
}

if (!isset($_SESSION['email'])) {
    echo "Session email is not set.";
    exit();
}

// Get the client ID
$query = "SELECT * FROM clients WHERE c_Email='$email'";
$result = mysqli_query($con, $query);
if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result); 
    $c_ID = $row['c_ID'];
    $balance = $row['c_Balance'];
} else {
    echo "Client not found.";
    exit();
}

// get prvID mn url by get
$prvC_ID = isset($_GET['prvC_ID']) ? $_GET['prvC_ID'] : null;

if ($prvC_ID) {
    $query = "SELECT * FROM privateclasses WHERE prvC_ID = '$prvC_ID' AND t_ID='$t_ID'";

    $result = mysqli_query($con, $query);
    $class = mysqli_fetch_assoc($result);

    if ($class) {
        if ($class['prvCStatus'] == 'Available') {
            $price = $class['prvCPrice'];
            if($balance < $price){
                $message = "Insuffient Balance";
                $icon = "warning";?>
                    <script>
        // Use SweetAlert2 to display the message the script message li mas2ole aan tbyin 
        //the msg  
        Swal.fire({
            title: '<?php echo addslashes($message); ?>',
            icon: '<?php echo $icon; ?>'
        }).then(function() {
            window.location.href = 'privateSchedule.php?t_ID=<?php echo $t_ID;?>';
        });
    </script><?php
                exit;
            }
            // update query nkhliha booked (status taaita) bs check money b4 already done above
            $updateQuery = "UPDATE privateclasses SET prvCStatus = 'Booked', c_ID = '$c_ID',prvCRegistrationDate=NOW() WHERE prvC_ID = '$prvC_ID' && t_ID='$t_ID'";
            if (mysqli_query($con, $updateQuery)) {
                
                $newBalance = $balance - $price;
                
                $updateBalanceQuery = "UPDATE clients SET c_Balance = '$newBalance' WHERE c_ID = '$c_ID'";
                if (mysqli_query($con, $updateBalanceQuery)) {
                    $message = "Class successfully booked!";
                    $icon = "success";
                } else {
                    $message = "Error: Could not update balance. Please try again later.";
                    $icon = "error";
                }
            } else {
                $message = "Error: Could not book the class. Please try again later.";
                $icon = "error";
            }
        } else {
            $message = "Class is not available for booking.";
            $icon = "warning";
        }
    } else {
        $message = "Class not found.";
        $icon = "error";
    }
} else {
    $message = "Invalid class ID.";
    $icon = "error";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Status</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
        // Use SweetAlert2 to display the message
        Swal.fire({
            title: '<?php echo addslashes($message); ?>',
            icon: '<?php echo $icon; ?>'
        }).then(function() {
            window.location.href = 'privateSchedule.php?t_ID=<?php echo $t_ID;?>';
        });
    </script>
</body>
</html>