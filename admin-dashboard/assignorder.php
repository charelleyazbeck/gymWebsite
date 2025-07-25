<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/navbar.css">

<?php
require_once 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
session_start();

if (!isset($_SESSION['isloggedinadmin']) || $_SESSION['isloggedinadmin'] != 1) {
    header("Location: index.php");
    exit;
}

$orderid = $_GET['order_id'];
$adminid=$_SESSION['adminuser'];

// Fetch customer ID
$cidquery = "SELECT c_ID FROM orders WHERE o_ID='$orderid'";
$res = mysqli_query($con, $cidquery);

if ($res && mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $cid = $row['c_ID'];

    // Fetch customer details
    $customerDetailsQuery = "
        SELECT CONCAT(c_FirstName, ' ', c_LastName) AS fullName, 
               c_PhoneNumber, 
               c_Address 
        FROM clients 
        WHERE c_ID='$cid'
    ";
    $res1 = mysqli_query($con, $customerDetailsQuery);

    if ($res1 && mysqli_num_rows($res1) > 0) {
        $row1 = mysqli_fetch_assoc($res1);
        $customerName = $row1['fullName'];
        $customerPhone = $row1['c_PhoneNumber'];
        $customerAddress = $row1['c_Address'];
    } else {
        $msg = "Failed to retrieve customer details.";
        echo "<body>
    <div class='message-cont'>
            <div class='message-image-cont'>
        <img src='images/error.svg'>
    </div>
    <h3>
    $msg
    </h3>
    </div>
    </body>";
        echo "<script type='text/javascript'>
                setTimeout(function(){
                    window.location.href = 'assignordersform.php';
                }, 3000);
              </script>";
    }
} else {
    $msg = "Failed to retrieve order details.";
    echo "<body>
    <div class='message-cont'>
            <div class='message-image-cont'>
        <img src='images/error.svg'>
    </div>
    <h3>
    $msg
    </h3>
    </div>
    </body>";
    echo "<script type='text/javascript'>
            setTimeout(function(){
                window.location.href = 'assignordersform.php';
            }, 3000);
          </script>";
}

$orderNumber = $orderid;
$specialInstructions = "Please show us the order ID when you reach us.";

$to = "mahdiassaadmh@gmail.com";
$subject = "Order Ready for Delivery: $orderNumber";

// HTML message
$message = "
<html>
<head>
  <title>Order Ready for Delivery </title>
</head>
<body>
  <p>Dear Delivery Team,</p>
  <p>I hope this email finds you well. I am writing to inform you that we have an order ready for delivery to the following customer:</p>
  <p><strong>Customer Details:</strong></p>
  <ul>
    <li><strong>Name:</strong> " . htmlspecialchars($customerName) . "</li>
    <li><strong>Phone Number:</strong> " . htmlspecialchars($customerPhone) . "</li>
    <li><strong>Address:</strong> " . htmlspecialchars($customerAddress) . "</li>
  </ul>
  <p><strong>Order Information:</strong></p>
  <ul>
    <li><strong>Order Number:</strong> " . htmlspecialchars($orderNumber) . "</li>
    <li><strong>Special Instructions:</strong> " . htmlspecialchars($specialInstructions) . "</li>
  </ul>
  <p>Please let us know the estimated time for pickup and delivery. Should you require any additional information, feel free to contact us.</p>
  <p>Best regards,<br></p>
</body>
</html>
";

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'aliibrahimaigamer10@gmail.com';
    $mail->Password   = 'nllqbvvdbfohnfja';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('aliibrahimaigamer10@gmail.com', 'Activitar Gym');
    $mail->addAddress($to, 'Delivery Company');

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = "Dear Delivery Team,\n\nI hope this email finds you well. I am writing to inform you that we have an order ready for delivery to the following customer:\n\nCustomer Details:\nName: " . htmlspecialchars($customerName) . "\nPhone Number: " . htmlspecialchars($customerPhone) . "\nAddress: " . htmlspecialchars($customerAddress) . "\n\nOrder Information:\nOrder Number: " . htmlspecialchars($orderNumber) . "\nSpecial Instructions: " . htmlspecialchars($specialInstructions) . "\n\nPlease let us know the estimated time for pickup and delivery. Should you require any additional information, feel free to contact us.\n\nBest regards";

    if($mail->send()) {
        $query = "UPDATE `orders` SET `oStatus` = 'waiting', `a_ID` = '$adminid' WHERE `o_ID` = '$orderNumber'";
        if ($con->query($query) === TRUE) {
            header("Location: orders.php");
            exit();
        } else {
            $msg = "Error updating order status: " . $con->error;
            echo "<body>
    <div class='message-cont'>
            <div class='message-image-cont'>
        <img src='images/error.svg'>
    </div>
    <h3>
    $msg
    </h3>
    </div>
    </body>";
        echo "<script type='text/javascript'>
                setTimeout(function(){
                    window.location.href = 'assignordersform.php';
                }, 3000);
              </script>";
        }
    } else {
        $msg= "Failed to send email.";
        echo "<body>
    <div class='message-cont'>
            <div class='message-image-cont'>
        <img src='images/error.svg'>
    </div>
    <h3>
    $msg
    </h3>
    </div>
    </body>";
    echo "<script type='text/javascript'>
            setTimeout(function(){
                window.location.href = 'assignordersform.php';
            }, 3000);
          </script>";
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
