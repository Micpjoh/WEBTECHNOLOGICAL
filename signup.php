<?php
require_once "includes/securesession.inc.php";

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css_files/main.css">
    <link rel="stylesheet" href="css_files/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- HERO SECTION -->
    <section id="herosection">
        <div class="header-text">
            <h1>Join the community!</h1>
        </div>
    </section>

    <!-- BODY SECTION -->
    <section id="signup-container">
        <div class = signup-box>

            <form id="signup-form" action="includes/signup.inc.php" method="post">
                <h1>Sign up to&nbsp; <span style="color: green;"> GreenWear</span></h1>

                <?php 
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "invalidemail")
                        echo "<p class='error-message'>Invalid email.</p>";
                    if ($_GET["error"] == "names-contain-only-letters-and-numbers")
                        echo "<p class='error-message'>Invalid username. <br> 
                    Usernames can only exist of numbers and letters.</p>";
                    if ($_GET["error"] == "username-already-in-use")
                        echo "<p class='error-message'>Username is already in use.</p>";
                    if ($_GET["error"] == "fill-in-all-fields")
                        echo "<p class='error-message'>Please fill in all fields.</p>";
                    if ($_GET["error"] == "emails-dont-match")
                        echo "<p class='error-message'>Emails don't match.</p>";
                    if ($_GET["error"] == "email-already-in-use")
                        echo "<p class='error-message'>Emails is already in use.</p>";
                    if ($_GET["error"] == "pw-dont-match")
                        echo "<p class='error-message'>Passwords don't match.</p>";
                    if ($_GET["error"] == "name-has-to-be-longer-than-2-char")
                        echo "<p class='error-message'>Name needs to contain more than 2 characters.</p>";
                }
                ?>
                
                <div class="input-group">
                    <label for="name">Username</label>
                    <input type="text" name="name"></input>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email"></input>
                </div class="input-group">

                <div class="input-group">
                    <label for="email-match">Confirm email</label>
                    <input type="email" name="email-repeat"></input>
                </div class="input-group">

                <div class="input-group">
                    <label for="pw">Password</label>
                    <input type="password" name="password"></input>
                </div>

                <div class="input-group">
                    <label for="pw-match">Confirm password</label>
                    <input type="password" name="password-repeat"></input>
                </div>

                <div class="terms-of-service">
                    <input type="checkbox" name="consent" value="conditions">
                    <span> *Yes, I have read and accepted the terms and conditions.<br>
                            <a href="termsservice.php">terms of service</a>
                    </span>
                </div>

                <div class="button-group">
                    <button type ="submit" name="submit">Sign up!</button>
                </div>

                <div class="button-group2">
                    <a href="login.php">Already a <span class="logoname">GreenWear</span> user? Log in</a>
                </div>
            </form>
            
        </div>
    </section>


    <!-- FOOTER -->
    <?php include "footer.php"; ?>

    <!-- <script src="js/validateinputsignin.js"></script> -->

</body>

</html>