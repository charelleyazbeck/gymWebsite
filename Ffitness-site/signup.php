<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once 'connection.php';

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Form</title>
    <script src="https://kit.fontawesome.com/8abbb8059b.js" crossorigin="anonymous"></script>
    <style>
        /* config.css */
        :root {
            --baseColor: #000000;
        }

        .error{
	color: red;
	font-size: 25px;
	font-weight: 200;
}


        
        /* helpers/align.css */
        .align {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            background-image: url("back.jpg");
            background-size: cover;
            background-position: center;
        }

        .grid {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* helpers/hidden.css */
        .hidden {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        /* helpers/icon.css */
        :root {
            --iconFill: var(--baseColor);
        }

        .icons {
            display: none;
        }

        .icon {
            block-size: 1em;
            display: inline-block;
            fill: var(--iconFill);
            inline-size: 1em;
            vertical-align: middle;
        }

        /* layout/base.css */
        :root {
            --htmlFontSize: 100%;
            --bodyBackgroundColor: #000000;
            --bodyColor: var(--baseColor);
            --bodyFontFamily: "Open Sans";
            --bodyFontFamilyFallback: sans-serif;
            --bodyFontSize: 0.875rem;
            --bodyFontWeight: 400;
            --bodyLineHeight: 1.5;
        }

        * {
            box-sizing: border-box;
        }

        html {
            font-size: var(--htmlFontSize);
        }

        body {
            color: var(--bodyColor);
            font-family: var(--bodyFontFamily), var(--bodyFontFamilyFallback);
            font-size: var(--bodyFontSize);
            font-weight: var(--bodyFontWeight);
            line-height: var(--bodyLineHeight);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url("back.jpg");
            background-size: cover;
        }

        /* modules/anchor.css */
        :root {
            --anchorColor: #eee;
        }

        a {
            color: var(--anchorColor);
            outline: 0;
            text-decoration: none;
        }

        a:focus,
        a:hover {
            text-decoration: underline;
        }

        /* modules/form.css */
        :root {
            --formGap: 0.875rem;
        }

        input {
            background-image: none;
            border: 0;
            color: inherit;
            font: inherit;
            margin: 0;
            outline: 0;
            padding: 0;
            transition: background-color 0.3s;
        }

        input[type="submit"] {
            cursor: pointer;
        }

        input[type="password"],
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"] {
            color: #000000;
            padding: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #d30000;
            color: #eee;
            font-weight: 700;
            text-transform: uppercase;
            padding: 1rem;
            border-radius: 5px;
            border: none;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #da0000;
        }

        .form {
            display: grid;
            gap: var(--formGap);
        }

        .form__field {
            display: flex;
            flex-direction: column;
        }

        /* modules/login.css */
        .login label {
            display: flex;
            align-items: center;
            padding: 1rem;
            background-color: #363b41;
            border-radius: 5px;
            margin-bottom: 0.5rem;
            color: #fff;
        }

        .login input[type="text"],
        .login input[type="password"],
        .login input[type="email"],
        .login input[type="tel"],
        .login input[type="date"] {
            background-color: #ffffff;
            border-radius: 5px;
        }

        .login input[type="text"]:focus,
        .login input[type="password"]:focus,
        .login input[type="email"]:focus,
        .login input[type="tel"]:focus,
        .login input[type="date"]:focus {
            background-color: #f0f0f0;
        }

        .login input[type="submit"] {
            background-color: #d30000;
            color: #eee;
            font-weight: 700;
            text-transform: uppercase;
            padding: 1rem;
            border-radius: 5px;
            border: none;
        }

        .login input[type="submit"]:hover {
            background-color: #da0000;
        }

        /* modules/text.css */
        p {
            margin-block: 1.5rem;
        }

        .text--center {
            text-align: center;
        }

        /* Responsive layout */
        @media (max-width: 600px) {
            table {
                width: 100%;
            }

            tr {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            td {
                width: 100%;
                padding: 0.5rem 0;
                display: flex;
                justify-content: center;
            }

            td > .form__field {
                width: 100%;
            }

            .align {
                padding: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="align">
        <div class="grid">
            <form action="signup2.php" method="POST" class="form login">
                <table>
                    <!--Full Name-->
                    <tr>
                        <td>
                            <div class="form__field">
                                <label for="login__firstname"><svg class="icon">
                                        <use xlink:href="#icon-user"></use>
                                    </svg><span class="hidden">First Name</span></label>
                                <input autocomplete="username" id="login__firstname" type="text" name="firstname" class="form__input" placeholder="First Name" required>
                            </div>
                        </td>

                        <!--Last Name-->
                        <td>
                            <div class="form__field">
                                <label for="login__lastname"><svg class="icon">
                                        <use xlink:href="#icon-user"></use>
                                    </svg><span class="hidden">Last Name</span></label>
                                <input autocomplete="username" id="login__lastname" type="text" name="lastname" class="form__input" placeholder="Last Name" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <!--Email-->
                        <td>
                            <div class="form__field">
                                <label for="login__email">
                                    <i class="fa-solid fa-envelope" style="color: #000000;"></i>
                                    <span class="hidden">Email</span></label>
                                <input id="login__email" type="email" name="email" class="form__input" placeholder="Enter Your Email" required>
                            </div>
                        </td>
                        <!--Password-->
                        <td>
                            <div class="form__field">
                                <label for="login__password"><svg class="icon">
                                        <use xlink:href="#icon-lock"></use>
                                    </svg><span class="hidden">Password</span></label>
                                <input id="login__password" type="password" name="password" class="form__input" placeholder="Enter a Strong Password" required>
                            </div>
                        </td>
                    </tr> 
                    <tr>
                        <!--DOB-->
                        <td>
                            <div class="form__field">
                                <label for="login__dob">
                                    <i class="fa-solid fa-cake-candles" style="color: #000000;"></i>
                                    <span class="hidden">DOB</span></label>
                                <input id="login__dob" type="date" name="DOB">
                            </div>
                        </td>
                        <!--PhoneNumber-->
                        <td>
                            <div class="form__field">
                                <label for="login__phone">
                                    <i class="fa-solid fa-phone" style="color: #000000;"></i>
                                    <span class="hidden">Phone Number</span></label>
                                <input id="login__phone" type="tel" name="phonenumber" class="form__input" placeholder="Phone Number" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <!--Gender-->
                        <td>
                            <div class="form__field">
                                <label for="login__gender">
                                    <i class="fa-solid fa-venus-mars" style="color: #000000;"></i>
                                    <span class="hidden">Gender</span> </label>
                                <table>
                                    <tr>
                                        <td>Male</td>
                                        <td><input type="radio" name="gender" value="male" required></td>
                                    </tr>
                                    <tr>
                                        <td>Female</td>
                                        <td><input type="radio" name="gender" value="female" required></td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <!--Address-->
                        <td>
                            <div class="form__field">
                                <label for="login__address">
                                    <i class="fa-solid fa-location-dot" style="color: #000000;"></i>
                                    <span class="hidden">Address</span></label>
                                <input id="login__address" type="text" name="address" class="form__input" placeholder="Your Address" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <!--Submit-->
                        <td colspan="2">
                            <div class="form__field">
                                <input type="submit" value="Sign Up">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class="form__field" class="error">
                            <?php 
                            if(isset($_SESSION['signuperror'])){
                                if($_SESSION['signuperror'] != ''){
                                    echo "<p class='error'>".$_SESSION['signuperror']."</p>";
                                }
                            }
                            ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
            <p class="text--center"> <a href="login.php">Already a member? Log in</a> <svg class="icon">
                    <use xlink:href="#icon-arrow-right"></use>
                </svg></p>
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" class="icons">
        <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
            <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
        </symbol>
        <symbol id="icon-lock" viewBox="0 0 1792 1792">
            <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
        </symbol>
        <symbol id="icon-user" viewBox="0 0 1792 1792">
            <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
        </symbol>
    </svg>
</body>
</html>