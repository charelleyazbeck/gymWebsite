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

if (isset($_GET['totalprice'])) {
    $totalprice = $_GET['totalprice'];

    if($totalprice == 0){
        $_SESSION['ordermsg'] = 'No Items Found';
        header("Location:cart.php");
        exit;
    }

    $query = "SELECT * FROM clients WHERE c_ID='$user'";
    $res = $con->query($query);
    $row = $res->fetch_assoc();
    $balance = $row['c_Balance'];
//check awal shi l balance maa l price
    if ($balance < $totalprice) {
        $_SESSION['ordermsg'] = 'No Enough Balance';
        header('Location:cart.php');
    } else {
        $orderstatus = "pending";
        $sql2 = "SELECT * FROM carts WHERE c_ID='$user'";
        $res2 = $con->query($sql2);
        $row2 = $res2->fetch_assoc();
        $cart_id = $row2['cart_ID'];

        $balance = $balance - $totalprice;
        $updatebalancequery = "UPDATE clients SET c_Balance='$balance' WHERE c_ID='$user'";
        $con->query($updatebalancequery);
        // null value since no admin assigned order yet w '' for auto increment 
        $sql3 = "INSERT INTO orders VALUES('',NOW(),'$totalprice','$orderstatus','$user','$cart_id',NULL)";
        $con->query($sql3);

        $orderid = $con->insert_id;

        $sql4 = "SELECT * FROM cartitems WHERE cart_ID='$cart_id'";
        $res3 = $con->query($sql4);
        if ($res3) {
            if ($res3->num_rows > 0) {
                while ($row3 = $res3->fetch_assoc()) {
                    $i_id = $row3['i_ID'];
                    $quantity = $row3['quantityAdded'];
                    $sql5 = "SELECT * FROM items WHERE i_ID='$i_id'";
                    $res5 = $con->query($sql5);
                    $row4 = $res5->fetch_assoc();
                    $itemprice = $row4['iPrice'];
                    $itemquantity = $row4['iQuantityInStock'];
                    $newquantity = (int) $itemquantity - (int) $quantity;
                    $sold = $row4['Quantitysold'] + (int) $quantity;

                    $sql6 = "INSERT INTO orderitems VALUES('$orderid','$i_id','$quantity','$itemprice')";
                    $con->query($sql6);
                    //update store quantity (old-li shtaraha)
                    $quantityupdatequery = "UPDATE items SET iQuantityInStock='$newquantity' WHERE i_ID='$i_id'";
                    $con->query($quantityupdatequery);

                    $soldupdatequery = "UPDATE items SET Quantitysold='$sold' WHERE i_ID='$i_id'";
                    $con->query($soldupdatequery);

                    $sql7 = "DELETE FROM cartitems WHERE cart_ID='$cart_id'";
                    $con->query($sql7);
                    $_SESSION['ordermsg'] = 'Checkout complete';
                    header("Location:cart.php");
                }
            }
        }
    }
}
