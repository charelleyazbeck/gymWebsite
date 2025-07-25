<?php
session_start();
require_once("connection.php");

if(isset($_GET['c_ID']) && isset($_GET['pbc_ID'])) {
    $c_ID = $_GET['c_ID'];
    $pbc_ID = $_GET['pbc_ID'];
    $query = "DELETE FROM pbcregistrations WHERE c_ID='$c_ID' AND pbc_ID='$pbc_ID'";
    $con->query($query);
    header("Location:showRegistered.php");
}