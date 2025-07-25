<?php
session_start();
require_once('connection.php');

if ($_SESSION['isloggedin'] != 1) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    header("Location: login.php");
    exit();
}

$msg = "";

$pbC_ID = $_GET['pbC_ID'];
$c_Email = $_SESSION['email'];
$query1 = "SELECT * FROM clients WHERE c_Email='$c_Email'";
$result1 = $con->query($query1);

if ($result1->num_rows > 0) {
    $row = $result1->fetch_assoc();
    $c_ID = $row['c_ID'];
        $balance = $row['c_Balance'];

} else {
    // if no result error
    $msg = "Error enrolling in class: " . $con->error;
    $con->close();
    echo "<script>
        // Use SweetAlert2 to display the message
        Swal.fire({
            title: '<?php echo addslashes($msg); ?>',
            icon: '<?php echo ($msg === 'You have successfully enrolled in the class!') ? 'success' : 'error'; ?>'
        }).then(function() {
            window.location.href = 'scheduleClientside.php';
        });
    </script>";
}

$checkRegistrationQuery = "SELECT * FROM pbcregistrations WHERE c_ID = '$c_ID' AND pbC_ID = '$pbC_ID'";
$checkRegistrationResult = $con->query($checkRegistrationQuery);

if ($checkRegistrationResult->num_rows > 0) {
    $msg = "You are already registered for this class.";
    $icon = "warning";
} else {
    // check capacity inorder to enroll bel class
    $query2 = "SELECT * FROM publicclasses WHERE pbc_ID = '$pbC_ID'";
    $result2 = $con->query($query2);
    $row2 = $result2->fetch_assoc();
    $capacity = $row2['capacity'];
    $price=$row2['pbCPrice'];

    $query3 = "SELECT COUNT(*) as current_enrollment FROM pbcregistrations WHERE pbC_ID = '$pbC_ID'";
    $result3 = $con->query($query3);
    $row3 = $result3->fetch_assoc();
    $current_enrollment = $row3['current_enrollment'];
    // if there is place enroll is working perfecrtly 
   if ($capacity > $current_enrollment) {
       // Check if the client has enough balance
    if ($balance >= $price) {  
        $query = "INSERT INTO pbcregistrations (c_ID, pbC_ID, pbCRegistrationDate) VALUES ('$c_ID', '$pbC_ID', NOW())";
        $result = $con->query($query);
        //subtract balance mn l user
        if ($result) {
            $newBalance = $balance - $price;
            $updateBalanceQuery = "UPDATE clients SET c_Balance = '$newBalance' WHERE c_ID = '$c_ID'";
            if (mysqli_query($con, $updateBalanceQuery)) {
                $message = "Class successfully booked!";
                $icon = "success";
            } else {
                $message = "Error: Could not update balance. Please try again later.";
                $icon = "error";
            }
            $msg = "You have successfully enrolled in the class!";
            $icon = "success";
        } else {
            $msg = "Error enrolling in class:";
            $icon = "error";
        }
    } else {
        $msg = "Insufficient balance to book this class.";
        $icon = "error";
    }
} else {
    $msg = "Class is full. No available spaces.";
    $icon = "warning";
}
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
            title: '<?php echo addslashes($msg); ?>',
            icon: '<?php echo ($msg === "You have successfully enrolled in the class!") ? "success" : "error"; ?>'
        }).then(function() {
            window.location.href = 'scheduleClientside.php';
        });
    </script>
</body>
</html>