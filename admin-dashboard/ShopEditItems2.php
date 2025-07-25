<link rel="stylesheet" href="css/navbar.css">
<?php

session_start();
if ($_SESSION['isloggedinadmin'] != 1) {
    header("Location: Index.php");
    exit();
}

require_once 'connection.php';
$admin_id = $_SESSION['adminuser'];

if (isset($_POST['ItemId'])) {
    $itemid = $_POST['ItemId'];
    $msg = "$itemid edit: ";
}

if (
    isset($_POST['ItemName']) && isset($_POST['ItemDescription']) &&
    isset($_POST['Expdate']) && isset($_POST['ItemQuantity']) &&
    isset($_POST['ItemPrice']) && isset($_POST['category'])
) {
    $itemname = $_POST['ItemName'];
    $itemdesc = $_POST['ItemDescription'];
    $expdate = $_POST['Expdate'];
    $quantity = $_POST['ItemQuantity'];
    $price = $_POST['ItemPrice'];
    $category = $_POST['category'];

    // Retrieve the current data from the database
    $query = "SELECT * FROM items WHERE i_ID = '$itemid'";
    $result = mysqli_query($con, $query);
    $currentData = mysqli_fetch_assoc($result);

    if (isset($_FILES['ItemImage1']) && !empty($_FILES['ItemImage1']['name'])) {
        $image = $_FILES['ItemImage1'];

        $mime = exif_imagetype($image['tmp_name']);
        $allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG);

        if (!in_array($mime, $allowedTypes)) {
            $msg1 = 'The uploaded file is not an image';
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
                        window.location.href = 'ShopEditItems.php?ItemId=$itemid';
                    }, 3000);
                  </script>";
        }

        if ($image['size'] > 5000000) { // 5MB
            $msg1 = "Sorry, your image is too large.";
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
                        window.location.href = 'ShopEditItems.php?ItemId=$itemid';
                    }, 3000);
                  </script>";
        }

        $image_temp = $image['tmp_name'];
        $image_name = basename($image['name']);
        $upload_dir = "ItemImage/";
        $image_path = $upload_dir . $image_name;

        if (!move_uploaded_file($image_temp, $image_path)) {
            $msg1 = "Failed to upload image.";
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
                        window.location.href = 'ShopEditItems.php?ItemId=$itemid';
                    }, 3000);
                  </script>";
        }
    } else {
        $image_path = $_POST['ItemImage2']; // No new image uploaded
    }

// error for changes
$changes = [];

if ($currentData['iName'] != $itemname) {
    $changes['iName'] = ['old_value' => $currentData['iName'], 'new_value' => $itemname];
}

if ($currentData['iDescription'] != $itemdesc) {
    $changes['iDescription'] = ['old_value' => $currentData['iDescription'], 'new_value' => $itemdesc];
}

// Handle the iExpDate field
if (!(
    ($currentData['iExpDate'] == '0000-00-00' && ($expdate == '0000-00-00' || empty($expdate))) ||
    (empty($expdate) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $currentData['iExpDate']))
)) {
    if ($currentData['iExpDate'] != $expdate) {
        $changes['iExpDate'] = ['old_value' => $currentData['iExpDate'], 'new_value' => $expdate];
    }
}

if ($currentData['iQuantityInStock'] != $quantity) {
    $changes['iQuantityInStock'] = ['old_value' => $currentData['iQuantityInStock'], 'new_value' => $quantity];
}

if ($currentData['iPrice'] != $price) {
    $changes['iPrice'] = ['old_value' => $currentData['iPrice'], 'new_value' => $price];
}

if ($currentData['iType'] != $category) {
    $changes['iType'] = ['old_value' => $currentData['iType'], 'new_value' => $category];
}

if ($currentData['item_image_src'] != $image_path) {
    $changes['item_image_src'] = ['old_value' => $currentData['item_image_src'], 'new_value' => $image_path];
}

    // Only proceed with the update if there are actual changes
    if (!empty($changes)) {
        $sql = "UPDATE items SET 
            iName='$itemname', 
            iDescription='$itemdesc', 
            item_image_src='$image_path',
            iExpDate='$expdate',
            iType='$category',
            iPrice='$price',
            iQuantityInStock='$quantity'
            WHERE i_ID='$itemid'";

        // Log the changes
        foreach ($changes as $field => $values) {
            $msg .= "$field: Old Value = {$values['old_value']}, New Value = {$values['new_value']} ";
        }

        $sql2 = "INSERT INTO modifiesitems (`Modification_ID`, `a_ID`, `i_ID`, `changes`, `Modificationtime`) 
                 VALUES (NULL, '$admin_id', '$itemid', '$msg', NOW())";

        if ($con->query($sql) === TRUE && 
                $con->query($sql2) === TRUE) {
                    $msg1 = "Item Edited Succefully";
                    echo "<body>
    <div class='message-cont'>
            <div class='message-image-cont'>
        <img src='images/check.svg'>
    </div>
    <h3>
    $msg1
    </h3>
    </div>
    </body>";
            echo "<script type='text/javascript'>
                    setTimeout(function(){
                        window.location.href = 'ShopViewItems.php';
                    }, 3000);
                  </script>";
        } else {
            $msg1 = 'Database error: ' . $con->error;
            echo "<body>
    <div class='message-cont'>
            <div class='message-image-cont'>
        <img src='images/error.svg'>
    </div>
    <h3>
    $msg1
    </h3>
    </div>
    </body>";
            echo "<script type='text/javascript'>
                    setTimeout(function(){
                        window.location.href = 'ShopEditItems.php?ItemId=$itemid';
                    }, 3000);
                  </script>";
        }
    } else {
        $msg1 = "No changes detected.";
        echo "<body>
    <div class='message-cont'>
            <div class='message-image-cont'>
        <img src='images/error.svg'>
    </div>
    <h3>
    $msg1
    </h3>
    </div>
    </body>";
            echo "<script type='text/javascript'>
                    setTimeout(function(){
                        window.location.href = 'ShopViewItems.php';
                    }, 3000);
                  </script>";
        exit();
    }
} else {
    $msg1 = 'Missing information';
    echo "<body>
    <div class='message-cont'>
            <div class='message-image-cont'>
        <img src='images/error.svg'>
    </div>
    <h3>
    $msg1
    </h3>
    </div>
    </body>";
            echo "<script type='text/javascript'>
                    setTimeout(function(){
                        window.location.href = 'ShopEditItems.php?ItemId=$itemid';
                    }, 3000);
                  </script>";
}
?>
