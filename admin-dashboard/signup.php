<?php
session_start();
require_once("connection.php");
if(isset($_POST['username']) && $_POST['username'] != "" 
&& isset($_POST['fullname']) && $_POST['fullname'] != ""
&& isset($_POST['email']) && $_POST['email'] != ""
&& isset($_POST['password']) && $_POST['password'] != ""
&& isset($_POST['DOB']) && $_POST['DOB'] != ""
&& isset($_POST['phonenumber']) && $_POST['phonenumber'] != ""
&& isset($_POST['gender']) && $_POST['gender'] != ""
&& isset($_POST['address']) && $_POST['address'] != ""
){
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phonenumber'];
    $DOB = $_POST['DOB'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $startingdate = date("d/m/Y H:m:s");
    $lastLogin = date("d/m/Y H:m:s");
    //bel database fi first w last name, bas bel form fi fullname fa 3meltella split.
    $fullnamearray = explode(" ",$fullname);
    $firstname = $fullnamearray[0];
    $lastname = $fullnamearray[1];

    $checkquery = "SELECT * FROM admins WHERE a_id = '$username' OR a_Email = '$email'";
    $res = $con->query($checkquery);
    if($res){
        if($res->num_rows>0){
            header('Location:Adminindex2.php');
            $_SESSION['signuperror'] = "User already exists";
        }else{
            $_SESSION['adminuser'] = $username;
            $_SESSION['signuperror'] = '';
            $insertquery = "INSERT INTO admins VALUES('$username','$email','$firstname','$lastname','$phonenumber','$gender','$DOB','$address','$password','$lastLogin','$startingdate')";
            $con->query($insertquery);
            header('Location:AdminHome.php');
            $_SESSION['isloggedinadmin'] = 1;
        }
    }
}else{
    $_SESSION['signuperror'] = 'Missing Info';
    header("Location:AdminIndex2.php");
}
?>























?>