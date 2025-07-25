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

$category = isset($_GET['category']) ? $_GET['category'] : 'all';
$price = isset($_GET['price']) ? $_GET['price'] : 'price_asc';

$order = 'iPrice ASC'; // Default sorting order

if ($price === 'price_asc') {
    $order = 'iPrice ASC';
} elseif ($price === 'price_desc') {
    $order = 'iPrice DESC';
}

$sql = "SELECT * FROM items";
if ($category !== 'all') {
    $sql .= " WHERE iType='$category'";
}
$sql .= " ORDER BY $order";

$result = $con->query($sql);
?>
<div class="store-container" id="storeItems">
    <div class="listproducts">

        <?php
        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $title = $row['iName'];
                    $image = $row['item_image_src'];
                    $desc = $row['iDescription'];
                    $price = $row['iPrice'];
                    $type = $row['iType'];
                    $id = $row['i_ID'];
                    $instock = $row['iQuantityInStock'];

                    // Fetch the rating for each item
                    $rating = 0;

                    $query2 = "SELECT * FROM ratingitems WHERE i_ID='$id'";
                    $res2 = $con->query($query2);
                    if ($res2) {
                        if ($res2->num_rows > 0) {
                            $i = 0;
                            while ($row2 = $res2->fetch_assoc()) {
                                $rating += $row2['iRating'];
                                $i++;
                            }
                            $rating = intval($rating / $i);
                        }
                    }
                    ?>

                    <!-- Output the product HTML -->
                    <?php
                    echo "
                <div class='item store-item $type' data-id='$id'>
                    <a href='itemInfo.php?i_id=$id'>
                        <img src='/projectweb/admin-dashboard/$image' alt='itemimage' class='items_images'>
                        <div class='item-info'>
                            <h4 class='item-title'>$title</h4>
                            <p class='item-desc'>$desc</p>
                            <div class='price-add'>
                                <p class='price'>$price$</p>
                                </a>";
                    if ($instock == 0) {
                        echo "<input type='submit' class='out-of-stock' value='Out Of Stock'>";
                    } else {
                        echo "<form action='addtocart.php?id=$id' method='post'>
                        
                        <input type='submit' class='add-to-cart' value='Add to Cart'>
                        </form>";
                    }
                    echo "<div class='stars' data-rating='$rating'>
                        <span class='star'>★</span>
                        <span class='star'>★</span>
                        <span class='star'>★</span>
                        <span class='star'>★</span>
                        <span class='star'>★</span>
                    </div>
                </div>
            </div></div>";
                }
            }
        }
        ?>
    </div>
</div>
