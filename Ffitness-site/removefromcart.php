<?php

session_start();
require_once('connection.php');
if($_SESSION['isloggedin'] != 1){
    header("Location:login.php");
}
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}else{
    header("Location:login.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT cart_ID FROM carts WHERE c_ID='$user'";
    $res = $con->query($sql);
    $row = $res->fetch_assoc();
    $cartid = $row['cart_ID'];

    $sql2 = "DELETE FROM cartitems WHERE cart_ID='$cartid' AND i_ID='$id'";
    $con->query($sql2);

    // Return JSON response
    // json for dynamic change 
    echo json_encode(['success' => true]);
}
?>