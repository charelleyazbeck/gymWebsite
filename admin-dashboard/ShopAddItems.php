
<link href="css/navbar.css" rel="stylesheet">

<?php 
session_start();

// Redirect if not logged in
if ($_SESSION['isloggedinadmin'] != 1) {
    header("Location: index.php");
    exit();
}

// Include connection file and set variables
require_once 'connection.php';
$adminId = $_SESSION['adminuser'];

if (!empty($_POST['ItemName']) && !empty($_POST['ItemDescription']) && 
    !empty($_POST['ItemQuantity']) && !empty($_POST['ItemPrice']) && 
    !empty($_POST['category']) && !empty($_FILES['ItemImage']['tmp_name'])) {

    $itemname = $_POST['ItemName'];
    $itemdesc = $_POST['ItemDescription'];
    
    $quantity = $_POST['ItemQuantity'];
    $price = $_POST['ItemPrice'];
    $category = $_POST['category'];
    $image = $_FILES['ItemImage'];
    if($category == 'Equipment'){
        $expdate = NULL;
    }else{
        $expdate = $_POST['Expdate'];
    }
    $allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG);

    $mime = exif_imagetype($image['tmp_name']);
    if (!in_array($mime, $allowedTypes)) {
        $msg = 'The uploaded file is not a valid image.';
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
                    window.location.href = 'ShopAddItemsForm.php';
                }, 3000);
              </script>";
        exit();
    }

    if ($image['size'] > 5000000) { // 5MB
        $msg = "Sorry, your image is too large.";
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
                    window.location.href = 'ShopAddItemsForm.php';
                }, 3000);
              </script>";
        exit();
    }

    $upload_dir = "ItemImage/";
    $image_name = basename($image['name']);
    $image_path = $upload_dir . $image_name;

    if (!move_uploaded_file($image['tmp_name'], $image_path)) {
        $msg = "Failed to upload the image.";
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
                    window.location.href = 'ShopAddItemsForm.php';
                }, 3000);
              </script>";
        exit();
    }

    // Insert item into the items table
    $sql = "INSERT INTO items (iName, iType, iDescription, iPrice, iExpdate, item_image_src, iQuantityInStock) 
            VALUES ('$itemname', '$category', '$itemdesc', '$price', '$expdate', '$image_path', '$quantity')";

    if ($con->query($sql) === TRUE) {
        $lastInsertedId = mysqli_insert_id($con);
        $modify="ADDED $lastInsertedId";
        $modifiesSql = "INSERT INTO `modifiesitems` (`Modification_ID`, `a_ID`, `i_ID`, `changes`, `Modificationtime`)
                        VALUES (NULL, '$adminId', '$lastInsertedId', '$modify', NOW())";

        if ($con->query($modifiesSql) === TRUE) {
            $msg = "Item added successfully.";
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
                        window.location.href = 'ShopAddItemsForm.php';
                    }, 3000);
                  </script>";
        } else {
            // Capture and display the error for debugging
            $msg = "Error adding modification record: " . $con->error;
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
                        window.location.href = 'ShopAddItemsForm.php';
                    }, 3000);
                  </script>";
        }
    } else {
        // Capture and display the error for debugging
        $msg = "Error adding item: " . $con->error;
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
                    window.location.href = 'ShopAddItemsForm.php';
                }, 3000);
              </script>";
    }

} else {
    $msg = "Error adding item: Missing data.";
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
                window.location.href = 'ShopAddItemsForm.php';
            }, 3000);
          </script>";
}
?>
