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
    $sql2 = "SELECT * FROM cartitems WHERE cart_ID='$cartid' AND i_ID='$id'";
    $res2 = $con->query($sql2);
    $row2 = $res2->fetch_assoc();
    $quantity = $row2['quantityAdded'] + 1;
    $sql4 = "SELECT iQuantityInStock FROM items WHERE i_ID='$id'";
    $res4 = $con->query($sql4);
    $row4 = $res4->fetch_assoc();
    $stock = $row4['iQuantityInStock'];
    if ($quantity > (int) $stock) {
        $quantity = $stock;
    }
    $sql3 = "UPDATE cartitems SET quantityAdded='$quantity' WHERE cart_ID='$cartid' AND i_ID='$id'";
    $con->query($sql3);

    // Return JSON response
    // we added json response la nkhliha tzid dynamically wihout location/refresh
    echo json_encode(['success' => true, 'quantity' => $quantity]);
}
?>
