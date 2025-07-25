<?php
require_once 'connection.php';
session_start();

if (isset($_POST['firstname']) && $_POST['firstname'] != "" 
        && isset($_POST['lastname']) && $_POST['lastname'] != "" 
        && isset($_POST['email']) && $_POST['email'] != "" 
        && isset($_POST['password']) && $_POST['password'] != "" 
        && isset($_POST['DOB']) && $_POST['DOB'] != "" 
        && isset($_POST['phonenumber']) && $_POST['phonenumber'] != "" 
        && isset($_POST['gender']) && $_POST['gender'] != "" 
        && isset($_POST['address']) && $_POST['address'] != ""
) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phonenumber'];
    $DOB = $_POST['DOB'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $checkquery = "SELECT * FROM clients WHERE c_Email = '$email'";
    $res = $con->query($checkquery);
    if ($res) {
        if ($res->num_rows > 0) {
            header('Location:login.php');
            $_SESSION['signuperror'] = "User already exists";
        } else {
            $_SESSION['email'] = $email;
            $_SESSION['signuperror'] = '';
            $insertquery = "INSERT INTO `clients` (`c_ID`, `c_Email`, `c_FirstName`, `c_LastName`, `c_PhoneNumber`, `c_Gender`, `c_Address`, `c_UserPassword`, `c_LastLogin`, `c_RegistrationDate`, `c_DOB`, `c_Balance`) VALUES (NULL, '$email', '$firstname', '$lastname', '$phonenumber', '$gender', '$address', '$password', NOW(), NOW(), '$DOB', '0')";
            $con->query($insertquery);
            $_SESSION['isloggedin']=1;
            $user = $con->insert_id;
            $_SESSION['user'] = $user;
            header("Location:index.php");
    }

}else{
    $_SESSION['signuperror'] = 'Error Adding account';
    header("Location:signup.php");
}    
} else {
        $_SESSION['signuperror'] = 'Missing Info';
        header("Location:signup.php");
    }
?>