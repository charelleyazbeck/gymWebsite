<?php
require_once 'connection.php';
session_start();
if ($_SESSION['isloggedin'] != 1) {
    header("Location:login.php");
}
$email = $_SESSION['email'];
$user = $_SESSION['user'];
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Css Styles -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <style>
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
            /* Style for the footer ends*/

        </style>
    </head>

    <body> 
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

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

        <!-- Hero Section Begin -->
        <section class="hero-section">
            <div class="hero-items owl-carousel">
                <div class="single-hero-item set-bg" data-setbg="img/hero-slider/hero-1.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hero-text">
                                    <h2>Join Us Now</h2>
                                    <h1>FITNESS & SPORT</h1>
                                    <a href="index.php#timetable" class="primary-btn">SEE PROGRAM</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-hero-item set-bg" data-setbg="img/hero-slider/hero-3.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hero-text">
                                    <h2>Join Us Now</h2>
                                    <h1>REGISTER</h1>
                                    <a href="index.php#gpTraining" class="primary-btn">CHOOSE CLASSES</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-hero-item set-bg" data-setbg="img/hero-slider/hero-2.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hero-text">
                                    <h2>Join Us Now</h2>
                                    <h1>CLASSES AVAILABLE</h1>
                                    <a href="index.php#classSection" class="primary-btn">PUBLIC CLASSES</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero End -->

        <!-- Feature Section Begin -->
        <section id="gpTraining" class="feature-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="feature-item set-bg" data-setbg="img/feature/feature-1.jpg">
                            <h3>GROUP CLASSES</h3>
                            <p>The Sopranos manages to address the biases<br /> and benefits of therapy</p>
                            <a href="#timetable" class="primary-btn f-btn">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item set-bg" data-setbg="img/feature/feature-2.jpg">
                            <h3>PERSONAL TRAINING</h3>
                            <p>Strep throat is very common during the flu<br /> seasons and it can be preceded</p>
                            <a href="about-us.php#tsection" class="primary-btn f-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Feature Section End -->

        <!-- About Section Begin -->
        <section class="home-about spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-text">
                            <h2>WELCOME TO CROSSFIT</h2>
                            <p class="short-details">CrossFit is a cutting-edge functional fitness system that can help
                                everyday men.</p>
                            <p class="long-details">Success isn’t really that difficult. There is a significant portion of
                                the population here in North America, that actually want and need success to be hard! For
                                those of you who are serious about having more, doing more, giving more and being more.</p>
                            <a href="about-us.php" class="primary-btn about-btn">Learn More</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="img/home-about.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Section End -->

        <!-- Classes Section Begin -->
        <section id="classSection" class="classes-section">
            <div class="class-title set-bg" data-setbg="img/classes-title-bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 m-auto text-center">
                            <div class="section-title pl-lg-4 pr-lg-4 pl-0 pr-0">
                                <h2>Choose Your Program</h2>
                                <p>Our Crossfit experts can help you discover new training techniques and exercises that offer a dynamic and efficient full-body workout.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="classes-item set-bg" data-setbg="img/classes/class-1.jpg">
                            <h4>CrossFit</h4>
                            <p style='height: 100px'>is a relentless pursuit of fitness, blending strength, endurance, and community to push beyond limits and achieve personal growth.</p>
                            <a href="class1.php" class="primary-btn class-btn">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="classes-item set-bg" data-setbg="img/classes/class-2.jpg">
                            <h4>Pilates</h4>
                            <p style='height: 100px'>strengthens the body, improves flexibility, and deepens the mind-body connection.</p>
                            <a href="class2.php" class="primary-btn class-btn">Read More</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="classes-item set-bg" data-setbg="img/classes/class-3.jpg">
                            <h4>Zumba</h4>
                            <p style='height: 100px'>combines energetic dance with fitness, making exercise fun and rhythmic</p>
                            <a href="class3.php" class="primary-btn class-btn">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="classes-item set-bg" data-setbg="img/classes/class-4.jpg">
                            <h4>Resistance</h4>
                            <p style='height: 100px'>builds strength and muscle by challenging your body with weights or resistance bands.</p>
                            <a href="class4.php" class="primary-btn class-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Classes Section End -->

        <!-- Class Time Section Begin -->
        <section id="timetable" class="classtime-section class-time-table spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Classtime Table</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="timetable-controls">
                            <ul>
                                <li class="active" data-tsfilter="all">all class</li>
                                <li data-tsfilter="crossfit">crossfit</li>
                                <li data-tsfilter="pilates">pilates</li>
                                <li data-tsfilter="zumba">zumba</li>
                                <li data-tsfilter="resistance">resistance</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="classtime-table">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                                <th>Sunday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            function formatTime($startTime, $duration) {
                                $endTime = $startTime + floor($duration / 60) . ':' . str_pad($duration % 60, 2, '0', STR_PAD_LEFT);
                                return "$startTime:00 - $endTime";
                            }

                            $c = 10; // Initial time set to 10:00
                            for ($i = 1; $i <= 6; $i++) {
                                echo "<tr>";
                                echo "<td class='workout-time'>$c:00</td>";

                                for ($j = 1; $j <= 7; $j++) {
                                    $sessionID = "$j.$i";
                                    $query = "SELECT * FROM publicclasses WHERE pbC_ID = '$sessionID'";
                                    $result = $con->query($query);

                                    if ($result && $result->num_rows > 0) {
                                        $row = $result->fetch_assoc();

                                        if ($row['pbCStatus'] == 'exists') {
                                            // Calculate end time based on duration
                                            $duration = $row['pbCDuration'];
                                            $timeslot = formatTime($c, $duration);

                                            // Fetch trainer's name
                                            $trainerQuery = "SELECT t_FirstName, t_LastName FROM trainers WHERE t_ID = '{$row['t_ID']}'";
                                            $trainerResult = $con->query($trainerQuery);
                                            $trainerName = '';

                                            if ($trainerResult && $trainerResult->num_rows > 0) {
                                                $trainerRow = $trainerResult->fetch_assoc();
                                                $trainerName = $trainerRow['t_FirstName'] . ' ' . $trainerRow['t_LastName'];
                                            }

                                            // Fetch enrollment count
                                            $enrollmentQuery = "SELECT COUNT(*) AS enrolled FROM pbcregistrations WHERE pbC_ID = '$sessionID'";
                                            $enrollmentResult = $con->query($enrollmentQuery);
                                            $enrolled = 0;

                                            if ($enrollmentResult && $enrollmentResult->num_rows > 0) {
                                                $enrollmentRow = $enrollmentResult->fetch_assoc();
                                                $enrolled = $enrollmentRow['enrolled'];
                                            }

                                            $placesLeft = $row['capacity'] - $enrolled;

                                            // Display session details
                                            echo "<td class='hover-bg ts-item' data-tsmeta=" . $row['pbCName'] . ">";
                                            echo "<a href='enrollClass.php?pbC_ID=$sessionID' class='scheduleheader'>ENROLL " . $row['pbCName'] . "</a>";
                                            echo "<span>$timeslot</span>";
                                            echo "<h6>Trained by: $trainerName</h6>";
                                            echo "<h6>Places left: $placesLeft</h6>";
                                            echo "<h6>Price: \${$row['pbCPrice']}</h6>";
                                            echo "<h6>Room: {$row['pbCRoomNum']}</h6>";
                                            echo "</td>";
                                        } else {
                                            // Display "No Session" if pbCStatus is not "exists"
                                            echo "<td>";
                                            echo '';
                                            echo "</td>";
                                        }
                                    } else {
                                        // Display "No Session" if no session data exists
                                        echo "<td>";
                                        echo '';
                                        echo "</td>";
                                    }
                                }

                                echo "</tr>";
                                $c += 2; // Increment the time by 2 hours
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- Class Time Section End -->



        <!-- top 3 sItems Section Begin -->
        <section class="price-section spad set-bg" data-setbg="img/price-bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>TOP 3 SOLD ITEMS</h2>
                            <p>These are the top-selling items on our platform, selected based on popularity and customer satisfaction.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    // Query to get the top 3 sold items
                    $sql = "
                SELECT 
                    items.i_ID,
                    items.iName, 
                    items.item_image_src, 
                    items.iDescription, 
                    items.iPrice, 
                    items.Quantitysold, 
                    AVG(ratingitems.iRating) AS average_rating
                FROM 
                    items
                LEFT JOIN 
                    orderitems ON items.i_ID = orderitems.i_ID
                LEFT JOIN 
                    ratingitems ON items.i_ID = ratingitems.i_ID
                GROUP BY 
                    items.i_ID
                ORDER BY 
                    items.Quantitysold DESC
                LIMIT 3
            ";

                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Check if the item has been rated
                            if ($row["average_rating"] !== null) {
                                // Calculate the number of full, half, and empty stars
                                $fullStars = floor($row["average_rating"]);
                                $halfStar = ($row["average_rating"] - $fullStars >= 0.5) ? 1 : 0;
                                $emptyStars = 5 - $fullStars - $halfStar;

                                // Create the stars HTML with gold color
                                $starsHtml = str_repeat('<i class="fa fa-star" style="color: gold;"></i>', $fullStars) .
                                        str_repeat('<i class="fa fa-star-half-o" style="color: gold;"></i>', $halfStar) .
                                        str_repeat('<i class="fa fa-star-o" style="color: gold;"></i>', $emptyStars);
                            } else {
                                $starsHtml = "No ratings";
                            }
                            echo '
    <div class="col-lg-4">                  
        <div class="single-price-plan" style="background-image: url(\'/phpProject1/admin-dashboard/' . $row["item_image_src"] . '\'); background-size: cover; background-position: center; color: white;">
            <h4>' . $row["iName"] . '</h4>
            <div class="price-plan">
                <h2>' . $row["iPrice"] . ' <span>$</span></h2>
                <p>Sold: ' . $row["Quantitysold"] . '</p>
                <p>Rating: ' . $starsHtml . '</p>
            </div>
            <div class="item-description" style="background: rgba(0, 0, 0, 0.6); padding: 10px; border-radius: 5px;">
                <p>' . $row["iDescription"] . '</p>
            </div>
            <br>
            <a href="itemInfo.php?i_id=' . $row['i_ID'] . '" class="primary-btn price-btn">View item</a>
        </div>
    </div>
';
                        }
                    } else {
                        echo "<p>No items found.</p>";
                    }

                    $con->close();
                    ?>
                </div>
            </div>
        </section>
        <!-- top 3 sItems Section End -->

        <!-- Map Section Begin -->
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.8140473389603!2d35.49126327487317!3d33.868682873226696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f16df7ffe34b7%3A0x5a4ab5ef01d02004!2sCnam%20Liban!5e0!3m2!1sen!2slb!4v1724502956115!5m2!1sen!2slb"
                    style="width: 100%; height: 500px; border: 0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <!-- Map Section End -->

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
                            <a href="https://www.facebook.com/facebook" class="social-icon"><i class="fa fa-facebook"></i></a>
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
    </body>

</html>