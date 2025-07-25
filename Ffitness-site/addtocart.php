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

    // Fetch item details
    $sql = "SELECT * FROM items WHERE i_ID='$id'";
    $itemres = $con->query($sql);

    if ($itemres && $itemres->num_rows > 0) {
        $iteminfo = $itemres->fetch_assoc();

        // Default quantity to add aatul 1
        $quantity = 1;
        
        $getcartId = "SELECT cart_ID FROM carts WHERE c_ID='$user'";
        $res1 = $con->query($getcartId);

        if ($res1->num_rows == 0) {
            $createcart = "INSERT INTO carts (cart_ID, cartCreationDate, c_ID) VALUES (NULL, NOW(), '$user')";
            $con->query($createcart);
        }
        //cart exist? eza ee kafe eza laa aatine error
        $res2 = $con->query($getcartId);
        $row = $res2->fetch_assoc();
        $cartid = $row['cart_ID'];

        // check if item exist bel cart
        $checkitem = "SELECT * FROM cartitems WHERE i_ID='$id' AND cart_ID='$cartid'";
        $result = $con->query($checkitem);

        if ($result && $result->num_rows > 0) {
            // If yes, update
            $row = $result->fetch_assoc();
            $newQuantity = $row['quantityAdded'] + $quantity;

            // check quantity<stock quanityt eza stock asghar max value btkon l iteminfo
            if ($newQuantity > $iteminfo['iQuantityInStock']) {
                $newQuantity = $iteminfo['iQuantityInStock'];
            }

            $sql2 = "UPDATE cartitems SET quantityAdded = '$newQuantity' WHERE i_ID='$id' AND cart_ID='$cartid'";
            $con->query($sql2);
        } else {
            //eza doesnt exist yet zida aal cart
            $query2 = "INSERT INTO cartitems (cart_ID, i_ID, quantityAdded, AddedDate) VALUES ('$cartid', '$id', '$quantity', NOW())";
            $con->query($query2);
        }

        // store again la nzid gheir items eza shi
        header("Location: store.php");
        exit();
    }
}
?>
