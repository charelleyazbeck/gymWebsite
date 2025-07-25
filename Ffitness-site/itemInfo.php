<?php
session_start();
require_once('connection.php');

if (isset($_GET['i_id'])) {
    $id = $_GET['i_id'];
}
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    $user = '1000';
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
        .info-bg{
            /* The image used */
            background-image: url("css/gymequi2.jpg");
            /* Full height */
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: repeat;
            background-size: cover;
            font-size: large;
            font-weight: 700;

        }

        .info-container{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 100px;
        }
        .info-grid{
            display: grid;
            grid-template-columns: 150px 150px 150px 150px 150px 150px;
            grid-template-rows: 150px 150px 150px 150px 150px 150px ;
        }
        .image-container{
            grid-row: 1/3;
            grid-column: 1/3;
        }
        .image-container2{
            position: absolute;
            grid-row: 1/3;
            grid-column: 1/3;
            z-index: 1;
        }
        .item-info-container{
            grid-row: 1/6;
            grid-column: 4/7;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0); /* Semi-transparent white background */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* Smooth black shadow */
            border-radius: 8px; /* Optional: for rounded corners */
        }

        .item-info-container td{
            font-size: large;
            vertical-align: middle;
            padding-top: 15px;
        }
        .item-info-container table{
            margin-top: 10px;
        }
        .item-info-img{
            width: 300px;
            height: 300px;
            border-radius: 12px;
            border: 3px solid black;
            filter: drop-shadow(0 20px 20px #0009);

        }
        .outofstock{
            width: 300px;
            height: 300px;
        }

        hr{
            border: 1px solid white;
        }

        .star-rating{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }



        .one {
            color: rgb(255, 0, 0);
        }
        .two {
            color: rgb(255, 106, 0);
        }
        .three {
            color: rgb(251, 255, 120);
        }
        .four {
            color: rgb(255, 255, 0);
        }
        .five {
            color: rgb(24, 159, 14);
        }

        .addtocart-btn{
            background-color: #d9534f; /* Red background color */
            color: white; /* White text color */
            border: none; /* Remove default border */
            border-radius: 5px; /* Rounded corners */
            font-size: 16px; /* Font size */
            cursor: pointer; /* Pointer cursor on hover */
            transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transitions */
            margin-left:130px;
            width: 150px;
            height: 40px;
        }

        .addtocart-btn:hover {
            background-color: #c9302c; /* Darker red on hover */
            transform: scale(1.05); /* Slightly enlarge button on hover */
        }

        .addtocart-btn:active {
            background-color: #ac2925; /* Even darker red when clicked */
            transform: scale(0.95); /* Slightly shrink button on click */
        }

        .star {
            font-size: 40px;
            cursor: pointer;
        }

        .star.active {
            color: rgb(255, 215, 0); /* Gold color for filled stars */
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


    <body class="info-body">
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>
        <div class="info-bg">

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
                                    <li class="active"><a href="./index.php">Home</a></li>
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

            <?php
            $query = "SELECT * FROM items WHERE i_ID='$id'";
            $res = $con->query($query);
            $rating = 0;

            $query2 = "SELECT * FROM ratingitems WHERE i_ID='$id' AND c_ID='$user'";
            $res2 = $con->query($query2);
            if ($res2) {
                if ($res2->num_rows > 0) {
                    $row2 = $res2->fetch_assoc();
                    $rating = $row2['iRating'];
                } else {
                    $rating = 0;
                }
            }

            if ($res) {
                if ($res->num_rows > 0) {
                    $row = $res->fetch_assoc();
                    $image = $row['item_image_src'];
                    $instock = $row['iQuantityInStock'];

                    echo"

    <div class='info-container'>
        <div class='info-grid'>";
                    if ($instock == 0) {
                        echo "<div class='image-container2'><img src='css/outofstock (2).png' alt='Out Of Stock' class='outofstock'></div>";
                    }
                    echo" <div class='image-container'>
            <img src='/projectweb/admin-dashboard/$image' alt='itemimage' class='item-info-img'>";
                    echo "
    <div class='star-rating' data-rating='$rating'>
        <div class='stars' >
        <span data-rating='1''
              class='star'>★
        </span>
        <span data-rating='2''
              class='star'>★
        </span>
        <span data-rating='3''
              class='star'>★
        </span>
        <span data-rating='4''
              class='star'>★
        </span>
        <span data-rating='5''
              class='star'>★
        </span>
        <form action='addrating.php?i_id=$id' method='post' id='rating-form'>
        <input type='hidden' value='' id='output' name='rate'>
        </form>
    </div>";
                    echo" <script src='js/script.js'></script>
    </div>";
                    echo"   </div>
        <div class='item-info-container'>
            <table>
                <tr><th><h2>$row[iName]<hr></h2></th></tr>
                <tr><td>Description:</td><td>$row[iDescription]</td></tr>
                <tr><td>Price:</td><td>$row[iPrice]$</td></tr>
                <tr><td>Category:</td><td>$row[iType]</td></tr>
            </table>
            <table>";
                    if ($instock == 0) {
                        echo "<tr><td><input type='button' value='Out of Stock' class='addtocart-btn'>";
                    } else {
                        echo "<tr><td><a href='addtocart.php?id=$id'><input type='button' value='Add to cart' class='addtocart-btn'></a>";
                    }
                    echo"</table>
        </div>
        </div>
    </div>";
                }
            }
            ?>


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
            
            <!--Escape button js-->
            <script>
                // Define the URL to redirect to
                const redirectUrl = 'store.php'; // Replace with your desired URL

                // Function to handle the keydown event
                function handleKeyDown(event) {
                    if (event.key === 'Escape') {
                        window.location.href = redirectUrl;
                    }
                }

                // Add the event listener for keydown events
                document.addEventListener('keyup', handleKeyDown);


   // Function to handle star clicks
                function setRating(rating) {
                    // Update the hidden input field with the selected rating
                    document.getElementById('output').value = rating;

                    // Submit the form
                    document.getElementById('rating-form').submit();
                }

   // Add event listeners to star elements
                document.addEventListener('DOMContentLoaded', function () {
                    const stars = document.querySelectorAll('.star');
                    stars.forEach(star => {
                        star.addEventListener('click', function () {
                            const rating = this.getAttribute('data-rating');
                            setRating(rating);
                        });
                    });
                    initializeRating();
                });

                function initializeRating() {
                    const rating = document.querySelector('.star-rating').getAttribute('data-rating');
                    const stars = document.querySelectorAll('.star');
                    stars.forEach(star => {
                        if (parseInt(star.getAttribute('data-rating')) <= rating) {
                            star.classList.add('active'); // Add 'active' class or modify styles to show filled stars
                        }
                    });
                }

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
        </div>
    </body>
</html>