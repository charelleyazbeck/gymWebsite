<?php

session_start();
if ($_SESSION['isloggedinadmin'] != 1) {
    header("Location:index.php");
} else {
    require_once 'connection.php';
}
$admin_id = $_SESSION['adminuser'];
$ItemId = $_GET['ItemId'];
$msg="DELETED $ItemId ";
$sql = "INSERT INTO `modifiesitems` (`Modification_ID`, `a_ID`, `i_ID`, `changes`, `Modificationtime`) VALUES (NULL, '$admin_id', '$ItemId', '$msg', NOW())";

$con->query($sql);
$query2 = "DELETE FROM items where i_ID='$ItemId'";
$con->query($query2);
header("location:ShopViewItems.php");
