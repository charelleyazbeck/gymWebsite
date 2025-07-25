<?php
session_start();
require_once('connection.php');
if ($_SESSION['isloggedin'] != 1) {
    header("Location:login.php");
}
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
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

        <script src="https://kit.fontawesome.com/8abbb8059b.js" crossorigin="anonymous"></script>
        <style>
            /* Style for the trainer section */
            .trainer-section {
                position: relative;
                overflow: hidden;
                padding: 20px;
            }

            .trainer-category {
                padding: 0 10vw;
                font-size: 30px;
                font-weight: 500;
                margin-bottom: 40px;
                text-transform: capitalize;
            }

            .trainer-container {
                padding: 0 10vw;
                display: flex;
                overflow-x: auto;
                scroll-behavior: smooth;
            }

            .trainer-container::-webkit-scrollbar {
                display: none;
            }

            .trainer-card {
                flex: 0 0 auto;
                width: 250px;
                height: 450px;
                margin-right: 40px;
            }

            .trainer-image {
                width: 100%;
                height: 350px;
                overflow: hidden;
            }

            .trainer-thumb {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .trainer-info {
                width: 100%;
                height: 100px;
                padding-top: 10px;
            }

            .trainer-name {
                text-transform: uppercase;
                color: white;
            }

            .trainer-name a {
                color: red;
                text-decoration: none;
                transition: color 0.3s ease;
            }

            .trainer-name a:hover {
                color: white;
            }

            .trainer-description {
                opacity: 0.5;
                text-transform: capitalize;
                margin: 5px 0;
            }

            /* Star Rating Style */
            .star {
                font-size: 20px;
                cursor: pointer;
                color: #ddd;
                transition: color 0.2s ease-in-out;
            }

            .star.active {
                color: rgb(255, 215, 0); /* Gold color for filled stars */
            }

            /* Navigation Buttons */
            .pre-btn,
            .nxt-btn {
                border: none;
                width: 10vw;
                height: 100%;
                position: absolute;
                top: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, #fff 100%);
                cursor: pointer;
                z-index: 8;
            }

            .pre-btn {
                left: 0;
                transform: rotate(180deg);
            }

            .nxt-btn {
                right: 0;
            }

            .pre-btn img,
            .nxt-btn img {
                opacity: 0.2;
            }

            .pre-btn:hover img,
            .nxt-btn:hover img {
                opacity: 1;
            }

            .modal {
                display: none;
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
                display: flex;
            }

            .modal-content {
                background-image: url('img/img6.jpg');
                background-size: cover;
                background-position: center;
                padding: 20px;
                border-radius: 5px;
                width: 80%;
                max-width: 500px;
                position: relative;
                color: black;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
            }

            .close {
                color: #aaa;
                position: absolute;
                top: 10px;
                right: 20px;
                font-size: 28px;
                font-weight: bold;
                cursor: pointer;
            }

            .close:hover,
            .close:focus {
                color: black;
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
            /* Style for the footer ends*/




        </style>
        <!-- Css Styles -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
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
                                <li><a href="./index.php">Home</a></li>
                                <li class="active"><a href="./about-us.php">About us</a></li>
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
        <!-- Header End -->

        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg spad" data-setbg="img/about-bread.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <h2>About Us</h2>
                            <div class="breadcrumb-controls">
                                <a href="index.php"><i class="fa fa-home"></i> Home</a>
                                <span>About Us</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb End -->

        <!-- Aboutus Section Begin -->
        <section class="aboutus-section spad">
            <div class="container">
                <div class="aboutus-page-text">
                    <div class="row">
                        <div class="col-xl-9 col-lg-10 m-auto">
                            <div class="section-title">
                                <h2>Who We Are & What We Do</h2>
                                <p>Activitar is a leader in innovative fitness training, empowering individuals to achieve their peak performance through strength, endurance, and mental resilience. Our mission is to transform lives, one workout at a time.</p>
                            </div>
                        </div>
                    </div>
                    <img src="img/about-us.jpg" alt="">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-us">
                                <h4>ABOUT US</h4>
                                <p>At Activitar, we believe in the power of fitness to change lives. Our programs are designed to challenge and inspire, helping our members to push past their limits and discover their true potential. We are more than just a gym; we are a community that supports and motivates each other to be the best versions of ourselves.</p>
                                <p>Whether you're a beginner or a seasoned athlete, our state-of-the-art facilities, expert trainers, and supportive environment provide the perfect setting for your fitness journey. Join us and be part of a movement that is redefining fitness.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-quality">
                                <h4>OUR QUALITY</h4>
                                <p>Quality is at the heart of everything we do. From our meticulously crafted workout programs to our top-notch facilities, we ensure that every aspect of your fitness experience is of the highest standard.</p>
                                <ul>
                                    <li><i class="fa fa-check-circle-o"></i>Expert trainers with years of experience and certifications.</li>
                                    <li><i class="fa fa-check-circle-o"></i>Cutting-edge equipment and facilities to support your fitness goals.</li>
                                    <li><i class="fa fa-check-circle-o"></i>A welcoming and inclusive community that fosters growth and success.</li>
                                    <li><i class="fa fa-check-circle-o"></i>Comprehensive programs tailored to all fitness levels, from beginners to pros.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Aboutus Section End -->


        <!-- Trainer Section End -->
        <section id="tsection" class="trainer-section">
            <h2 class="trainer-category">Our Trainers</h2>
            <button class="pre-btn"><img src="img/trainer/arrow.png" alt="Previous"></button>
            <button class="nxt-btn"><img src="img/trainer/arrow.png" alt="Next"></button>
            <div class="trainer-container">
                <?php
                // fetch trainers and put them into the container
                $sql = "SELECT 
                    t.t_ID,
                    t.t_FirstName, 
                    t.t_LastName, 
                    t.t_Gender, 
                    t.t_PhoneNumber, 
                    t.t_Email, 
                    t.t_DOB,
                    t.t_Speciality, 
                    IFNULL(AVG(rt.tRating), 0) AS avgRating
                FROM 
                    trainers t
                LEFT JOIN
                    ratingtrainers rt ON t.t_ID = rt.t_ID
                GROUP BY 
                    t.t_ID";

                $result = $con->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $id = $row['t_ID'];
                    $name = $row['t_FirstName'] . " " . $row['t_LastName'];
                    $dob = $row['t_DOB'];
                    $age = date_diff(date_create($dob), date_create('today'))->y;
                    $gender = $row['t_Gender'];
                    $phone = $row['t_PhoneNumber'];
                    $email = $row['t_Email'];
                    $speciality = $row['t_Speciality'];
                    $avgRating = round($row['avgRating']);
                    $profile_picture = strtolower($gender) == 'female' ? "img/trainer/femalepfp.jpg" : "img/trainer/malepfp.jpg";

                    echo "<div class='trainer-card'>
                <div class='trainer-image'>
                    <img src='$profile_picture' class='trainer-thumb' alt='$name'>
                </div>
                <div class='trainer-info'>
                    <h2 class='trainer-name'>
                        <a href='#tsection' class='open-modal' 
                           data-id='$id'
                           data-name='$name' 
                           data-age='$age' 
                           data-gender='$gender' 
                           data-phone='$phone' 
                           data-email='$email' 
                           data-speciality='$speciality'>$name</a>
                    </h2>";

                    //nbayin trainer rating 
                    echo "<div class='trainer-rating'>";
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $avgRating) {
                            echo "<i class='fas fa-star' style='color: gold;'></i>";
                        } else {
                            echo "<i class='fas fa-star' style='color: lightgray;'></i>";
                        }
                    }
                    echo "</div>";

                    echo "</div></div>";
                }

                $con->close();
                //mnskir con for security
                ?>
            </div>
        </section>

        <!-- Trainer Section End -->

        <!-- Modal Structure Begin -->
        <div id="trainerModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 id="modalName"></h2>
                <p><strong>Age:</strong> <span id="modalAge"></span></p>
                <p><strong>Gender:</strong> <span id="modalGender"></span></p>
                <p><strong>Phone:</strong> <span id="modalPhone"></span></p>
                <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                <p><strong>Speciality:</strong> <span id="modalSpeciality"></span></p>

                <!-- Rating System -->
                <div id="ratingSystem">
                    <i class="fas fa-star star" data-value="1"></i>
                    <i class="fas fa-star star" data-value="2"></i>
                    <i class="fas fa-star star" data-value="3"></i>
                    <i class="fas fa-star star" data-value="4"></i>
                    <i class="fas fa-star star" data-value="5"></i>
                    <button id="submitRating">Submit Rating</button>
                </div>
                <div id="ratingMessage" style="margin-top: 20px; font-size: 16px; display: none;"></div>


                <div id="ratingMessage" style="margin-top: 20px; font-size: 16px; display: none;"></div>
                <br
                    ><a id='viewschedulelink'href="privateSchedule.php?t_ID="><button id="viewSchedule" class="footer-button">View Schedule</button></a>
            </div>
        </div>
        <!-- Modal Structure End -->
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
                                    const trainerContainers = [...document.querySelectorAll('.trainer-container')];
                                    const nxtTrainerBtn = [...document.querySelectorAll('.trainer-section .nxt-btn')];
                                    const preTrainerBtn = [...document.querySelectorAll('.trainer-section .pre-btn')];

                                    trainerContainers.forEach((item, i) => {
                                        let containerDimensions = item.getBoundingClientRect();
                                        let containerWidth = containerDimensions.width;

                                        nxtTrainerBtn[i].addEventListener('click', () => {
                                            item.scrollLeft += containerWidth;
                                        });

                                        preTrainerBtn[i].addEventListener('click', () => {
                                            item.scrollLeft -= containerWidth;
                                        });
                                    });



                                    var modal = document.getElementById("trainerModal");
                                    var span = document.getElementsByClassName("close")[0];

// Variable to store the current trainer ID
                                    var currentTrainerId = null;

// Open modal and populate trainer data
                                    document.querySelectorAll('.open-modal').forEach(function (element) {
                                        element.onclick = function () {
                                            // Fetch trainer data from the clicked element
                                            var name = this.dataset.name;
                                            var age = this.dataset.age;
                                            var gender = this.dataset.gender;
                                            var phone = this.dataset.phone;
                                            var email = this.dataset.email;
                                            var speciality = this.dataset.speciality;

                                            // Set the current trainer ID based on the clicked trainer
                                            currentTrainerId = this.dataset.id;

                                            // Populate modal with trainer data
                                            document.getElementById("modalName").innerText = name;
                                            document.getElementById("modalAge").innerText = age;
                                            document.getElementById("modalGender").innerText = gender;
                                            document.getElementById("modalPhone").innerText = phone;
                                            document.getElementById("modalEmail").innerText = email;
                                            document.getElementById("modalSpeciality").innerText = speciality;
                                            let url = document.getElementById('viewschedulelink');
                                            url.href = 'privateSchedule.php?t_ID=' + currentTrainerId;

                                            // Reset the rating system
                                            var stars = document.querySelectorAll('.star');
                                            stars.forEach(function (s) {
                                                s.classList.remove('active');
                                            });
                                            selectedRating = 0;

                                            // Show the modal
                                            modal.style.display = "flex";
                                        };
                                    });



                                    // Close Modal
                                    span.onclick = function () {
                                        modal.style.display = "none";
                                    };

                                    window.onclick = function (event) {
                                        if (event.target == modal) {
                                            modal.style.display = "none";
                                        }
                                    };
                                    // Handle Star Rating
                                    var stars = document.querySelectorAll('.star');
                                    var selectedRating = 0;

                                    stars.forEach(function (star, index) {
                                        star.addEventListener('click', function () {
                                            // Reset all stars
                                            stars.forEach(function (s) {
                                                s.classList.remove('active');
                                            });

                                            // Highlight selected stars up to the clicked star
                                            for (var i = 0; i <= index; i++) {
                                                stars[i].classList.add('active');
                                            }

                                            // Set the selected rating value
                                            selectedRating = star.getAttribute('data-value');
                                        });
                                    });
                                    // Submit Rating Button Click
                                    document.getElementById("submitRating").onclick = function () {
                                        if (!selectedRating || !currentTrainerId) {
                                            alert("Please select a rating and ensure the modal is open.");
                                            return;
                                        }

                                        // Create an AJAX request to submit the rating
                                        var xhr = new XMLHttpRequest();
                                        xhr.open("POST", "submit_rating.php", true);
                                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                                        xhr.onreadystatechange = function () {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                // Get the response text from the server
                                                var responseText = xhr.responseText;

                                                // Show the message in the ratingMessage div
                                                var ratingMessage = document.getElementById("ratingMessage");
                                                ratingMessage.style.display = "block";
                                                ratingMessage.style.color = "green"; // Or another color for success
                                                ratingMessage.innerText = responseText;

                                                // Optionally, hide the modal after a few seconds
                                                setTimeout(function () {
                                                    modal.style.display = "none";
                                                    ratingMessage.style.display = "none"; // Hide the message after closing the modal
                                                }, 2000); // Adjust timing as needed
                                            } else if (xhr.readyState === 4) {
                                                // Handle error case
                                                var ratingMessage = document.getElementById("ratingMessage");
                                                ratingMessage.style.display = "block";
                                                ratingMessage.style.color = "red"; // Set red color for errors
                                                ratingMessage.innerText = "Error submitting rating. Please try again.";
                                            }
                                        };

                                        // Send the selected rating, trainer ID, and user ID to the server
                                        xhr.send("rating=" + selectedRating + "&trainer_id=" + currentTrainerId + "&user_id=" + "<?php echo $user; ?>");
                                    };




        </script>

    </body>

</html>