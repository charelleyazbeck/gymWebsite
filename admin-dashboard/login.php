<?php

session_start();
require_once("connection.php");
if (isset($_POST['username']) && $_POST['username'] != "" && isset($_POST['password']) && $_POST['password'] != "") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM  Admins where a_ID='$username' AND a_UserPassword='$password'";
    $result = mysqli_query($con, $query);
    $nbrrows = mysqli_num_rows($result);
    $_SESSION['loginerror'] = '';

    if ($nbrrows == 0) {
        $_SESSION['loginerror'] = "Incorrect username or password";
        header("Location:Index.php");
    } else if ($nbrrows == 1) {

        $_SESSION['isloggedinadmin'] = 1;
        $_SESSION['adminuser'] = $username;
        $utcDateTime = new DateTime('now', new DateTimeZone('UTC'));
        $utcDateTime->modify('+3 hours');
        $datelastlogin = $utcDateTime->format('Y-m-d H:i:s');
        header("Location:AdminHome.php");
        $query = "UPDATE `admins` SET `a_LastLogIn`='$datelastlogin'  WHERE `admins`.`a_ID`='$username'";
    } $result = mysqli_query($con, $query);
}
?>
