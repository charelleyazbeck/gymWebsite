<?php
session_start();
if ($_SESSION['isloggedinadmin'] != 1) {
    header("Location:index.php");
} else {
    require_once 'connection.php';
}

if(isset($_SESSION['message'])){
    $msg = $_SESSION['message'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>
    <div class="message-cont">
        <div class="message-image-cont">
        <img src="images/check.svg">
    </div>
        <h3>
            Error 
        </h3>
    </div>

</body>
</html>