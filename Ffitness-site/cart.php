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
?>


<!DOCTYPE html>
<html lang="zxx">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Activitar Template">
        <meta name="keywords" content="Activitar, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Activitar | Template</title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">
        <!--the user icon-->
        <script src="https://kit.fontawesome.com/8abbb8059b.js" crossorigin="anonymous"></script>
        <!-- Css Styles -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="css/style1.css" >
    </head>
    <style>
        body{
            height: 100%;

        }
        .bg{
            /* The image used */
            background-image: url("css/dmbltxt.png");
            /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: repeat;
            background-size: cover;
            margin-bottom: -100px;
            margin-top: -200px;
        }

        .cart-section {
            margin-top: -200px;
            padding: 300px 0;
            margin-bottom: -150px;

        }

        .container1{
            margin-top: 200px;
        }


        .cart-container{
            width: 900px;
            max-width: 90vw;
            margin: auto;
            padding-top: 10px;
            text-align: center;
        }


        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 3px solid #000;
            font-size: large;
            font-weight: 200;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        th {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 10px;
        }
        /* Button styling */
        button, input[type="button"] {
            background-color: #d9534f; /* Red background color */
            color: white; /* White text color */
            border: none; /* Remove default border */
            border-radius: 5px; /* Rounded corners */
            padding: 10px 20px; /* Padding around the text */
            font-size: 16px; /* Font size */
            cursor: pointer; /* Pointer cursor on hover */
            transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transitions */
        }

        button:hover, input[type="button"]:hover {
            background-color: #c9302c; /* Darker red on hover */
            transform: scale(1.05); /* Slightly enlarge button on hover */
        }

        button:active, input[type="button"]:active {
            background-color: #ac2925; /* Even darker red when clicked */
            transform: scale(0.95); /* Slightly shrink button on click */
        }

        .cart-item-image{
            width: 70px;
            height: 70px;

        }



            /* Style for the footer begins*/
            .footer-button {
                background-color: transparent;
                color: #333;
                border: 2px solid #333;
                padding: 8px 12px;
                cursor: pointer;
                transition: background-color 0.3s, color 0.3s;
            }

            .footer-button:hover {
                background-color: #333;
                color: #fff;
            }

            /* Style for the footer columns */
            .footer-widget {
                margin-bottom: 20px;
            }

            .footer-widget h5 {
                margin-bottom: 15px;
                color: #fff;
            }

            /* Style for the list items */
            .footer-info li,
            .opening-hours li,
            .workout-program li {
                margin-bottom: 10px;
            }

            /* Social links styling */
            .social-icon {
                color: #FF4500;
                margin: 0 5px;
                transition: color 0.3s;
            }

            .social-icon:hover {
                color: #333;
            }

            /* Text colors */
            .footer-logo-item p,
            .footer-widget p {
                color: #fff;
            }

            .ct-inside {
                color: #fff;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .social-links {
                    text-align: center;
                }

                .footer-logo-item,
                .footer-widget {
                    text-align: center;
                }
            }
            .footer-paragraph {
                font-size: 14px; /* Standardize paragraph font size */
                line-height: 1.6;
                color: #fff;
            }

            .footer-button {
                font-size: 14px; /* Standardize button font size */
                padding: 10px 20px; /* Consistent padding */
                color: white;
                background-color: transparent;
                border: 2px solid white;
                transition: background-color 0.3s, color 0.3s;
                margin-top: 10px;
                text-align: center;
                display: inline-block; /* Align buttons */
                width: 100%;
                box-sizing: border-box;
            }

            .footer-button:hover {
                background-color: white;
                color: #000;
            }
            .footer-widget .footer-button {
                display: inline-block;
                width: auto;
            }

            .footer-widget p,
            .footer-widget ul.opening-hours li {
                font-size: 1.1em; /* Adjust this value to match your preferred size */
            }
            #mobile-menu-wrap {
    display: none; /* or 'none', depending on the default state you want */
}



    </style>


    <body class="cart-body">
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>
        <div class="bg">

            <!-- Header Section Begin -->
        <header class="header-section">
            <div class="container-fluid">
                <div class="logo">
                    <a href="./index.php">
                        <img src="img/logo.png" alt="">
                    </a>
                </div>
                <div class="container">
                    <div class="nav-menu">
                        <nav class="mainmenu mobile-menu">
                            <ul>
                                <li><a href="./index.php">Home</a></li>
                                <li><a href="./about-us.php">About us</a></li>
                                <li><a href="./scheduleClientSide.php">Schedule</a></li>
                                <li><a href="./store.php">Store</a></li>
                                <li><a href="./gallery.php">Gallery</a></li>
                                <li><a href="./workouts.php">Workouts</a></li> 
                                <li class="user-icon">
                                    <a href="UserProfile.php" id="user-icon"><i class="fa-solid fa-user" aria-hidden="true"></i><span class="sr-only">User Profile</span></a>
                                    <div id="user-popup" class="user-popup">
                                        <p>HELLO <?php
                                        $query2 = "SELECT * FROM clients WHERE c_ID ='$user'";
                                        $res = $con->query($query2);
                                        $row = $res->fetch_assoc();
                                        echo $row['c_FirstName'];
                                        ?></p>
                                    </div>
                                </li>
                                <li style="color: #ff5e24;">
                                    BALANCE:<?php
                                            $query = "SELECT * FROM clients WHERE c_ID ='$user'";
                                            $res = $con->query($query);
                                            $row = $res->fetch_assoc();
                                            echo $row['c_Balance'];
                                            ?>
                                </li>
                            </ul>

                        </nav>
                    </div>
                </div>
                <div id="mobile-menu-wrap"></div>
            </div>
        </header>
        <!-- Header End -->

            <br>
            <br>





            <div class="container1">
                <section class="cart-section bg-gray">
                    <div class="cart-container">
                        <div class="container">
                            <div class="section-title text-center">
                                <h2 class="store-word">YOUR CART</h2>
                            </div>

                            <div class="cart-container" >
                                <div class="cartlistproducts">
                                    <table class="itemstable">
                                        <tr><td>Item Name</td><td>Image</td><td>Quantity</td><td>Unit price</td><td>Total price</td><td>Remove From Cart</td></tr>
                                        <?php
                                        //view cart by getting id and mnhuta in a table
                                        $query = "SELECT * FROM carts WHERE c_ID='$user'";
                                        $res = $con->query($query);
                                        if ($res) {
                                            if ($res->num_rows == 0) {
                                                echo "<tr><td colspan='4'>No Cart Found</td></tr>";
                                            } else {
                                                $row = $res->fetch_assoc();
                                                $cartid = $row['cart_ID'];
                                                $query2 = "SELECT * FROM cartitems WHERE cart_ID='$cartid'";
                                                $res2 = $con->query($query2);
                                                $orderprice = 0;
                                                if ($res2) {
                                                    if ($res2->num_rows == 0) {
                                                        echo "<tr><td colspan='6'>No items Found</td></tr>";
                                                    } else {

                                                        while ($row = $res2->fetch_assoc()) {
                                                            $query3 = "SELECT * FROM items WHERE i_ID='$row[i_ID]'";
                                                            $result = $con->query($query3);
                                                            $row2 = $result->fetch_assoc();
                                                            $price = $row2['iPrice'];
                                                            echo "<tr>
                                                <td>$row2[iName]</td>
                                                <td><img src='/projectweb/admin-dashboard/$row2[item_image_src]' class='cart-item-image'></td>
                                                <td>
                                                <a href='subquant.php?id=$row[i_ID]' class='price-btn decrement'><input type='button' value='-'></a>
                                                <span class='quantity'>$row[quantityAdded]</span>
                                                <a href='addquant.php?id=$row[i_ID]' class='price-btn increment'><input type='button' value='+'></a>
                                                </td>
                                                <td class='unit-price'>$row2[iPrice] $</td>
                                                <td class='total-price'>";
                                                            $totalprice = (int) $row2['iPrice'] * (int) $row['quantityAdded'];
                                                            echo $totalprice;
                                                            echo '$';
                                                            $orderprice += $totalprice;
                                                            echo "</td>
                                                <td>
                                                <a href='removefromcart.php?id=$row[i_ID]'><button class='remove-btn'>Remove</button></a>
                                                    <input type='hidden' class='item-id' value='$row[i_ID]'>
                                                </td>
                                                
                                                </tr>";
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        ?>                        
                                        <tr>
                                            <td colspan="4">Order Price:</td>
                                            <td id="order-price" colspan="2"><?php echo $orderprice;
                                        echo'$'; ?></td>
                                        </tr>
                                    </table>
                                    <a href="addorder.php?totalprice=<?php echo $orderprice; ?>" id="checkout-btn">
                                        <input type="button" value="Checkout">
                                    </a>
                                    <?php
                                    if (isset($_SESSION['ordermsg'])) {
                                        if ($_SESSION['ordermsg'] != '') {
                                            echo "<h3>$_SESSION[ordermsg]</h3>";
                                            $_SESSION['ordermsg'] = '';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
    </div>
    <!-- Choseus Section Begin -->
<section class="chooseus-section spad" style="background-color:black">  
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Why People Choose Us</h2>
                            <p>Our sport experts and latest sports equipment are the winning combination.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="choose-item">
                            <img src="img/icons/chose-icon-1.png" alt="">
                            <h5>Support 24/24</h5>
                            <p>We offer round-the-clock support to ensure that you always have the assistance you need, whether you're booking a session or have questions about our services.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="choose-item">
                            <img src="img/icons/chose-icon-2.png" alt="">
                            <h5>Our Trainer</h5>
                            <p>Our trainers are certified experts who tailor fitness plans to meet your individual needs. They're here to guide you every step of the way on your fitness journey.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="choose-item">
                            <img src="img/icons/chose-icon-3.png" alt="">
                            <h5>Personalized Sessions</h5>
                            <p>We offer personalized sessions to ensure you achieve your specific goals, whether you're aiming for weight loss, muscle gain, or overall fitness.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="choose-item">
                            <img src="img/icons/chose-icon-4.png" alt="">
                            <h5>Our Equipment</h5>
                            <p>Our gym is equipped with state-of-the-art machines and tools to help you get the most out of your workout. Whether you're into cardio or strength training, we have it all.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="choose-item">
                            <img src="img/icons/chose-icon-5.png" alt="">
                            <h5>Classes Daily</h5>
                            <p>We offer a variety of classes every day, including yoga, pilates, Zumba, and more. No matter your fitness level, you'll find a class that suits your needs.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="choose-item">
                            <img src="img/icons/chose-icon-6.png" alt="">
                            <h5>Focus on Your Health</h5>
                            <p>Your health is our priority. We provide comprehensive fitness assessments and personalized advice to help you achieve and maintain a healthy lifestyle.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Choseus Section End -->



        <!-- Footer Section Begin -->
        <footer class="footer-section" style="background-color:black;">
            <div class="container">
                <div class="row">
                    <!-- 1st Column: Logo & Workouts Section -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h5>Workouts</h5>
                            <p class="footer-paragraph">Explore our wide range of workouts tailored to all fitness levels. Find the perfect workout for you!</p>
                            <a href="workouts.php#workouts">
                                <button class="footer-button">View Workouts</button>
                            </a>
                            <br>
                            <br>
                            <div class="f-logo mb-3">
                                <a href="#"><img src="img/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="footer-widget mt-4">
                            <ul class="footer-info mt-3">
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <span>Phone:</span> (12) 345 6789
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i>
                                    <span>Email:</span> Colorlib.info@gmail.com
                                </li>
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <span>Address:</span> Iris Watson, Box 283 8562, NY
                                </li>
                            </ul>
                        </div>
                        <div class="social-links mt-3">
                            <h6>Follow us</h6>
                            <a href="https://www.facebook.com/facebook/" class="social-icon"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com/instagram/" class="social-icon"><i class="fa fa-instagram"></i></a>
                            <a href="https://it.pinterest.com/pinterest/" class="social-icon"><i class="fa fa-pinterest"></i></a>
                            <a href="https://web.telegram.org/k/#777000" class="social-icon"><i class="fa fa-telegram"></i></a>
                            <a href="https://x.com/x" class="social-icon"><i class="fa fa-x"></i></a>
                        </div>
                    </div>

                    <!-- 2nd Column: Gym Opening Hours -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h5>Gym Opening Hours</h5>
                            <ul class="opening-hours list-unstyled">
                                <li class="mb-2"><strong style="color:white;">Weekdays:</strong> <span style="color: #ff5e24;">05:00 - 23:00</span></li>
                                <li class="mb-2"><strong style="color:white;">Saturday:</strong> <span style="color: #ff5e24;">07:00 - 21:00</span></li>
                                <li class="mb-2"><strong style="color:white;">Sunday:</strong> <span style="color: #ff5e24;">08:00 - 20:00</span></li>
                            </ul>
                            <br>
                            <a href="scheduleClientSide.php#timetable">
                                <button class="footer-button">View Schedule</button>
                            </a>
                        </div>
                    </div>

                    <!-- 3rd Column: Meet Our Trainers -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h5>Meet Our Trainers</h5>
                            <p class="footer-paragraph">Our certified trainers are here to help you achieve your fitness goals. Explore their profiles and find the perfect trainer for you.</p>
                            <a href="about-us.php#tsection">
                                <button class="footer-button">View All Trainers</button>
                            </a>
                        </div>
                    </div>

                    <!-- 4th Column: Program -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="footer-widget">
                            <h5>Program</h5>
                            <ul class="workout-program list-unstyled">
                                <li><a href="class1.php" class="program-button">Crossfit</a></li>
                                <li><a href="class2.php" class="program-button">Pilates</a></li>
                                <li><a href="class3.php" class="program-button">Zumba</a></li>
                                <li><a href="class4.php" class="program-button">Resistance</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="copyright-text">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="ct-inside">
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Function to update the checkout button URL
            function updateCheckoutUrl() {
                const orderPrice = parseFloat(document.getElementById('order-price').textContent);
                const checkoutBtn = document.getElementById('checkout-btn');
                checkoutBtn.href = `addorder.php?totalprice=${orderPrice}`;
            }

            // Handle quantity increment
            document.querySelectorAll('.increment').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const id = this.getAttribute('href').split('=')[1];
                    const quantityElement = this.closest('tr').querySelector('.quantity');

                    fetch(`addquant.php?id=${id}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    quantityElement.textContent = data.quantity;
                                    updateTotalPrice(this.closest('tr'));
                                }
                            });
                });
            });

            // Handle quantity decrement
            document.querySelectorAll('.decrement').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const id = this.getAttribute('href').split('=')[1];
                    const quantityElement = this.closest('tr').querySelector('.quantity');

                    fetch(`subquant.php?id=${id}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    quantityElement.textContent = data.quantity;
                                    updateTotalPrice(this.closest('tr'));
                                }
                            });
                });
            });

            function updateTotalPrice(row) {
                const unitPrice = parseFloat(row.querySelector('.unit-price').textContent);
                const quantity = parseInt(row.querySelector('.quantity').textContent);
                const totalPrice = unitPrice * quantity;
                row.querySelector('.total-price').textContent = totalPrice + '$';

                // Update order price
                let orderPrice = 0;
                document.querySelectorAll('.total-price').forEach(price => {
                    orderPrice += parseFloat(price.textContent);
                });
                document.getElementById('order-price').textContent = orderPrice + '$';

                // Update the checkout button URL
                updateCheckoutUrl();
            }

            document.querySelectorAll('.remove-btn').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const id = this.closest('tr').querySelector('.item-id').value;
                    const row = this.closest('tr');

                    fetch(`removefromcart.php?id=${id}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Remove the row from the table
                                    row.remove();

                                    // Update order price
                                    let orderPrice = 0;
                                    document.querySelectorAll('.total-price').forEach(price => {
                                        orderPrice += parseFloat(price.textContent);
                                    });
                                    document.getElementById('order-price').textContent = orderPrice + '$';

                                    // Update the checkout button URL
                                    updateCheckoutUrl();

                                    // If no rows left, show "No Cart Found" message
                                    if (document.querySelectorAll('.itemstable tr').length === 1) {
                                        document.querySelector('.itemstable').innerHTML = "<tr><td colspan='6'>No Cart Found</td></tr>";
                                    }
                                }
                            });
                });
            })
        });
    </script>
    <script>
        function adjustMobileMenu() {
    const zoomLevel = window.devicePixelRatio || 1;
    const mobileMenu = document.getElementById('mobile-menu-wrap');

    if (zoomLevel < 2.5) { // Adjust this value based on your needs
        mobileMenu.style.display = 'none';
    } else {
        mobileMenu.style.display = 'block';
    }
}

// Initial check
adjustMobileMenu();

// Add event listener for window resize to adjust menu on zoom change
window.addEventListener('resize', adjustMobileMenu);

    </script>






    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/main.js"></script>
</div>
</body>
</html>