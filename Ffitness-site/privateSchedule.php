<?php
session_start();
require_once('connection.php');
if($_SESSION['isloggedin'] != 1){
    header("Location:login.php");
}
if (isset($_SESSION['user'])) {
    $c_ID = $_SESSION['user'];
}else{
    header("Location:login.php");
}

$t_ID = $_GET['t_ID'];

function formatTime($startTime, $duration) {
    // the functions works as follows: str_pad pads the string in which the first parm is the input
    // the second is how many places (indice) the 0 eza aana 1 digit w hye 2  places bthat 0 l str_pad_left puts the 0 on left
    // durationn=125 duration%60=5 5 i want 2 spaces and give 0 to left then 05
    $endTime = $startTime + floor($duration / 60) . ':' . str_pad($duration % 60, 2, '0', STR_PAD_LEFT);
    return "$startTime:00 - $endTime";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">
        <!--the user icon-->
        <script src="https://kit.fontawesome.com/8abbb8059b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trainer Schedule</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <style>
            body {
                background-color: black; /* Change background color to pink */
            }
            .table-container {
                display: flex;
                justify-content: center; /* Center the table horizontally */
                padding: 20px;
            }
            table {
                border-collapse: collapse;
                width: 80%; /* Adjust table width as needed */
            }
            table, th, td {
                border: 2px solid black; /* Change border style as needed */
            }
            th, td {
                padding: 10px;
                text-align: center;
            }

            .privateshedulealign{
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 150px;
            }
            #mobile-menu-wrap {
    display: none; /* or 'none', depending on the default state you want */
    height: 40px;
}

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
$query2 = "SELECT * FROM clients WHERE c_ID ='$c_ID'";
$res = $con->query($query2);
$row = $res->fetch_assoc();
echo $row['c_FirstName'];
?></p>
                                    </div>
                                </li>
                                <li style="color: #ff5e24;">
                                    BALANCE:<?php
                                            $query = "SELECT * FROM clients WHERE c_ID ='$c_ID'";
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

         <div class="privateshedulealign">
        <div class="row">
            <div class="classtime-table">
                <table border="5" align="center">
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
                        $start_time = 10;
                        for ($i = 1; $i <= 6; $i++) {
                            echo "<tr>";
                            echo "<td class='workout-time'>$start_time:00</td>";

                            for ($j = 1; $j <= 7; $j++) {
                                $session_id = "$j.$i";

                                // Check for public classes firstly
                                $queryPublic = "SELECT pbCName, pbCRoomNum, pbCDuration FROM publicclasses WHERE pbC_ID = '$session_id' AND t_ID = '$t_ID'";
                                $resultPublic = mysqli_query($con, $queryPublic);
                                $rowPublic = mysqli_fetch_assoc($resultPublic);

                                if ($rowPublic) {
                                    $availability = "<a href='enrollClass.php?pbC_ID=$session_id' class='scheduleheader'>ENROLL " . $rowPublic['pbCName'] . "</a>";
                                    $room_num = "Room: " . $rowPublic['pbCRoomNum'];
                                    $duration = $rowPublic['pbCDuration'];
                                    $time_slot = formatTime($start_time, $duration);
                                    echo "<td><h6>$availability</h6><span>$room_num</span><p>$time_slot</p></td>";
                                } else {
                                    // Check for private classes if no public class is found bel $j.$i
                                    $queryPrivate = "SELECT * FROM privateclasses WHERE prvC_ID = '$session_id' AND t_ID = '$t_ID'";
                                    $resultPrivate = mysqli_query($con, $queryPrivate);
                                    $rowPrivate = mysqli_fetch_assoc($resultPrivate);

                                    if ($rowPrivate['prvCStatus'] != 'Available') {
                                        if ($rowPrivate['c_ID'] == $c_ID) {
                                            // Class is booked by the logged user
                                            $room_num = "Room: " . $rowPrivate['prvCRoomNum'];
                                            $duration = $rowPrivate['prvCDuration'];
                                            $time_slot = formatTime($start_time, $duration);
                                            echo "<td><h6>Booked by you</h6><span>$room_num</span><p>$time_slot</p></td>";
                                        } else {
                                            // Class is not available and not booked by you  so empty td 
                                             echo "<td></td>";
                                        }
                                    } else {
                                        // Class is available for booking
                                        echo "<td><a href='book-appointment.php?prvC_ID=$session_id&t_ID=$t_ID'>Book appointment</a></td>";
                                    }
                                }
                            }
                            echo "</tr>";
                            $start_time += 2;
                        }
                        ?>  
                    </tbody>
                </table>
            </div>
        </div>
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
                            <a href="https://www.facebook.com/search/top?q=facebook" class="social-icon"><i class="fa fa-facebook"></i></a>
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
    </body>
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
            <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/jquery.magnific-popup.min"></script>
        <script src="js/jquery.nice-select.min.js"></script>
        <script src="js/jquery.slicknav.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/main.js"></script>
</html>