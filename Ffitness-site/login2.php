<?php
session_start();
require_once('connection.php');


if(isset($_POST['email']) && $_POST['email'] != ''
&& isset($_POST['password']) && $_POST['password'] != ''
){
$email = $_POST['email'];
$password1 = $_POST['password'];

$query = "SELECT * FROM clients WHERE c_Email='$email' AND c_UserPassword='$password1'";
$result = $con->query($query);
if($result){
    if($result->num_rows > 0){
        $_SESSION['email'] = $email;
        $query = "SELECT c_ID FROM clients WHERE c_Email='$email'";
        $res = $con->query($query);
        if($res){
            if($res->num_rows>0){
                $row = $res->fetch_assoc();
                $user = $row['c_ID'];
                $_SESSION['isloggedin'] = 1;
                $_SESSION['user'] = $user;
                $Query = "UPDATE clients SET c_LastLogin = NOW() WHERE c_ID='$user'";
                $con->query($Query);
                header("Location:index.php");
            }
        }
    }else{
        $_SESSION['loginerror'] = 'Incorrect Email or Password';
        header("Location:login.php");
    }
}
}else{
    $_SESSION['loginerror'] = 'Missing Informations';
    header("Location:login.php");
}