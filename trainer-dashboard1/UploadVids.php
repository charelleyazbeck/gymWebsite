<link href="css/navbar.css" rel="stylesheet">
<?php 
session_start();
require_once 'connection.php';
if($_SESSION['isloggedintrainer']!=1){
    header("Location:index.php");
}
if(isset($_POST['Wtitle']) &&  isset($_FILES['Wvideo']) && isset($_POST['Wdescription']) && isset($_POST['Wtype'])){
    $title = $_POST['Wtitle'];
    $video = $_FILES['Wvideo'];
    $description = $_POST['Wdescription'];
    $wtype = $_POST['Wtype'];
    $email = $_SESSION['temail'];
    $query = "SELECT t_ID FROM trainers WHERE t_Email='$email'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $user = $row['t_ID'];
} else {
    echo "Trainer not found.";
    exit();
}

    $date = date("Y/m/d");
    // el path taba3 l videos
    $target_dir = "workoutvids/";
    $file_name = $video['name'];
    $target_file = $target_dir.$file_name;
    $file_tmp_name = $video['tmp_name'];
    
    
    $filetype = $video['type'];

    $allowed_extensions = array("webm", "mp4", "ogv");
    $file_name_temp = explode(".", $file_name);
    $extension = end($file_name_temp);
    $file_size_max = 2147483648;
    if (($filetype == "video/webm") || ($filetype == "video/mp4") || ($filetype == "video/ogv") &&
            ($file_size < $file_size_max) && in_array($extension, $allowed_extensions)){
                if (move_uploaded_file($file_tmp_name, $target_file)) {
                    // zid l video 3al database
                    $sql = "INSERT INTO workouts VALUES('','$title','$wtype','$description','$target_file','$user')";
                    $res = $con->query($sql);
                    if ($res) {
                        $msg = "Video Uploaded successfully";
                        echo "<body>
                        <div class='message-cont'>
                                <div class='message-image-cont'>
                            <img src='images/check.svg'>
                        </div>
                        <h3>
                        $msg
                        </h3>
                        </div>
                        </body>";//show message, go to form page;
                                echo "<script type='text/javascript'>
                                        setTimeout(function(){
                                            window.location.href = 'UploadVidsForm.php';
                                        }, 3000);
                                      </script>";
                    } else {
                        $msg = 'Error during upload';
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
                                            window.location.href = 'UploadvidsForm.php';
                                        }, 3000);
                                      </script>";
                    }
                } else {
                   $_SESSION['wuploaderror'] = "There was an error uploading your file.";
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
                                            window.location.href = 'UploadvidsForm.php';
                                        }, 3000);
                                      </script>";
                }
            }
}
?>
