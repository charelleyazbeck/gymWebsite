<?php session_start();
require_once 'connection.php';
if($_SESSION['isloggedinadmin']!=1){
    header("Location:index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/navbar.css">
<?php

if(isset($_POST['FirstName']) && $_POST['FirstName'] != ''
&& isset($_POST['LastName']) && $_POST['LastName'] != ''
&& isset($_POST['Email']) && $_POST['Email'] != ''
&& isset($_POST['DOB']) && $_POST['DOB'] != ''
&& isset($_POST['PhoneNumber']) && $_POST['PhoneNumber'] != ''
&& isset($_POST['Gender']) && $_POST['Gender'] != ''
&& isset($_POST['Address']) && $_POST['Address'] != ''
&& isset($_POST['password']) && $_POST['password'] != ''
&& isset($_POST['RegDate']) && $_POST['RegDate'] != ''
&& isset($_POST['room'])&&$_POST['room']!=''
&& isset($_POST['price'])&& $_POST['price']!=''
&& isset($_POST['Speciality'])&& $_POST['Speciality']!=''


){
    $firstname = $_POST['FirstName'];
    $lastname = $_POST['LastName'];
    $email = $_POST['Email'];
    $dob = $_POST['DOB'];
    $phonenumber = $_POST['PhoneNumber'];
    $gender = $_POST['Gender'];
    $address = $_POST['Address'];
    $password = $_POST['password'];
    $regdate = $_POST['RegDate'];
    $room=$_POST['room'];
    $price=$_POST['price'];
    $speciality = $_POST['Speciality'];

    $query = "SELECT * FROM trainers WHERE t_Email ='$email'";
    $res = $con->query($query);
    if($res){
        if($res->num_rows>0){
            $_SESSION['T_add_error'] = 'Trainer already exists';
            $msg = "Error adding Trainer: $_SESSION[T_add_error]";
            echo "<body>
    <div class='message-cont'>
            <div class='message-image-cont'>
        <img src='images/error.svg'>
    </div>
    <h3>
    $msg
    </h3>
    </div>
    </body>";
            echo "<script type='text/javascript'>
                    setTimeout(function(){
                        window.location.href = 'AddTrainer.php';
                    }, 3000);
                  </script>";
        }else{
            //insert trainer
            $sql = "INSERT INTO trainers VALUES('','$email','$firstname','$lastname','$phonenumber','$gender','$dob','$address','$speciality','$password','','$regdate')";
            $result = $con->query($sql);
            $t_id = $con->insert_id;
            

            $status="Available";
            for ($i = 1; $i <= 6; $i++) {           
                for ($j = 1; $j <= 7; $j++) {
                    $query2 = "INSERT INTO privateclasses VALUES('$j.$i','$speciality','$status','$room',90,'$price',NULL,NULL,'$t_id')";
                    $con->query($query2);
                }
            }
            
            $_SESSION['T_add_error'] = 'Trainer added succesfully';
            $msg = "$_SESSION[T_add_error]";
            echo "<body>
    <div class='message-cont'>
            <div class='message-image-cont'>
        <img src='images/check.svg'>
    </div>
    <h3>
    $msg
    </h3>
    </div>
    </body>";

            echo "<script type='text/javascript'>
                    setTimeout(function(){
                        window.location.href = 'AddTrainer.php';
                    }, 3000);
                  </script>";
        }
    }
}else{
    $_SESSION['T_add_error'] = "Missing informations";
    $msg = "Error adding Trainer: $_SESSION[T_add_error]";
    echo "<body>
    <div class='message-cont'>
            <div class='message-image-cont'>
        <img src='images/error.svg'>
    </div>
    <h3>
    $msg
    </h3>
    </div>
    </body>";
    echo "<script type='text/javascript'>
            setTimeout(function(){
                window.location.href = 'AddTrainer.php';
            }, 3000);
          </script>";
}
?>























?>