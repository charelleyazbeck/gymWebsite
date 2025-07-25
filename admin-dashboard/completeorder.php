<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="css/navbar.css" rel="stylesheet">
</head>

<?php
require_once 'connection.php';
session_start();

if ($_SESSION['isloggedinadmin'] != 1) {
    header("Location: index.php");
    exit();
}

// Debugging: Check if the order_id parameter is set ma ela aaze done bs eno fikon tetrkoha
if (!isset($_GET['order_id']) || empty($_GET['order_id'])) {
    $msg = "Order ID is not set or is empty!";
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
                window.location.href = 'completedordersform.php';
            }, 3000);
          </script>";
}

$order_id = intval($_GET['order_id']);


$query = "UPDATE `orders` SET `oStatus` = 'completed' WHERE `o_ID` = '$order_id'";

// Execute the query
if ($con->query($query) === TRUE) {
    header("Location: orders.php");
    echo "<body>
    <div class='message-cont'>
            <div class='message-image-cont'>
        <img src='images/check.svg'>
    </div>
    <h3>
    $msg
    </h3>
    </div>
    </body>";
    echo "<script type='text/javascript'>
            setTimeout(function(){
                window.location.href = 'completeordersform.php';
            }, 3000);
          </script>";
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
                window.location.href = 'completedordersform.php';
            }, 3000);
          </script>";
}

$con->close();
?>
