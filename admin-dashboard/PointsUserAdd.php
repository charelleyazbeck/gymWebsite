<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/navbar.css" rel="stylesheet">
</head>
<body>
    
</body>
</html>
<?php
session_start();
if($_SESSION['isloggedinadmin']!=1){
    header("Location:index.php");
}
else{
require_once 'connection.php';
}

if(isset($_POST['PointsUserId']) && isset($_POST['PointsAmount'])){
    $userId = $_POST['PointsUserId'];
    $amount = $_POST['PointsAmount'];
    $checkquery = "SELECT * FROM clients WHERE c_ID = '$userId'";
    $res = $con->query($checkquery);
    if($res){
        if($res->num_rows == 0){
            header("Location:Points.php");
            $msg = "User doesnt exist";
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
                        window.location.href = 'Points.php';
                    }, 3000);
                  </script>";
        }else{
            $row = $res->fetch_assoc();
            $getamount = $row['c_Balance'];

            $amount = $amount + $getamount;
            $updatequery = "UPDATE clients SET c_balance = '$amount' WHERE c_ID = '$userId'";
            $con->query($updatequery);
            $msg = "Points Added successfully";
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
                        window.location.href = 'Points.php';
                    }, 3000);
                  </script>";
        }
    }else{
        header("Location:points.php");
        $msg = "Error in execution";
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
                    window.location.href = 'Points.php';
                }, 3000);
              </script>";
    }
}else{
    header("Location:points.php");
    $msg = "Error in execution";
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
                window.location.href = 'Points.php';
            }, 3000);
          </script>";
}






?>