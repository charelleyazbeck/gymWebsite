<?php

session_start();
require_once('connection.php');
if($_SESSION['isloggedin'] != 1){
    header("Location:login.php");
}
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}else{
    header("Location:login.php");
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $trainer_id = $_POST['trainer_id'];
    $rating = $_POST['rating'];

    // Check if rating for this user w trainer exists
    $query = "SELECT * FROM ratingtrainers WHERE c_ID='$user_id' AND t_ID='$trainer_id'";
    $result = $con->query($query);

    if ($result && $result->num_rows > 0) {
        // Update existing rating
        $update_query = "UPDATE ratingtrainers SET tRating='$rating' WHERE c_ID='$user_id' AND t_ID='$trainer_id'";
        if ($con->query($update_query)) {
            echo "Rating updated successfully!";
        } else {
            echo "Error updating rating.";
        }
    } else {
        // Insert new rating if no rating b4
        $insert_query = "INSERT INTO ratingtrainers (c_ID, t_ID, tRating, tRatingDateTime) VALUES ('$user_id', '$trainer_id', '$rating',NOW())";
        if ($con->query($insert_query)) {
            echo "Rating submitted successfully!";
        } else {
            echo "Error submitting rating.";
        }
    }
}

$con->close();
?>
