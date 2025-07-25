<?php
session_start();
require_once("connection.php");

if (isset($_POST['email']) && $_POST['email'] != "" 
    && isset($_POST['password']) && $_POST['password'] != "") {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM trainers WHERE t_Email='$email' AND t_UserPassword='$password'";
    $result = mysqli_query($con, $query);
    
    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['t_FirstName'];

        $_SESSION['isloggedintrainer'] = 1;
        $_SESSION['name'] = $name;
        $_SESSION['temail'] = $email;  
        
        header("Location: TrainerDashboard.php");
        exit();
    } else {
        $_SESSION['trainerloginerror'] = "Incorrect email or password";
        header("Location: Index.php");
        exit();
    }
}
