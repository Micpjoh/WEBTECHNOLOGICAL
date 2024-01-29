<?php
require_once "includes/securesession.inc.php";

// Als user al ingelogd is, stuur hem terug naar homepage
if (isset($_SESSION['user_id'])) {
    header("Location: profile.php");
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
    <link rel="stylesheet" href="css_files/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- HERO SECTION -->
    <section id="herosection">
        <div class="header-text">
            <h1>Great to see you again</h1>
        </div>
    </section>

    <!-- BODY SECTION -->
    <section id="login-container">
        <div class = "login-box">
            <form action="includes/login.inc.php" method="post">
                <h1>Log in to&nbsp; <span style="color: green;"> GreenWear</span></h1>

                <!-- display input errors -->
                <?php 
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "name-or-pw-is-wrong") {
                        echo "<p class='error-message'>Incorrect email or password.</p>";
                    }
                    if ($_GET["error"] == "fill-in-all-fields") {
                        echo "<p class='error-message'>Fill up all empty fields pls</p>";
                    }
                }
                ?>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email"></input>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password"></input>
                </div>

                <div class="rememberme">
                    <input type="checkbox" name="remember_me">
                    <span> Remember me.</span>
                </div>
                <div class="rememberme">
                    <span>Be careful, your choice<br> might oppose your cookie preferences!</span>
                </div>

                <div class="button-group">
                    <button type ="submit" name="submit">Log in!</button>
                </div>

                <div class="button-group2">
                    <a href="signup.php">New to  <span class="logoname">GreenWear</span>? Sign up!</a>
                </div>
            </form>
        </div>
        
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>

</body>

</html>