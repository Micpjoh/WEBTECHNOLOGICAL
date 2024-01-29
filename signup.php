<?php
session_start();

// Als user al ingelogd is, stuur hem terug naar homepage
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    die();
}

// Als input correct is behoud het, als input zorgt voor error verwijder het.
function remember_forminput($input) {
    if (isset($_SESSION["inputsform"][$input]) && !isset($_SESSION["errors_rememberform"][$input]))
        echo $_SESSION["inputsform"][$input];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
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
                
                <!-- Laat errors zien van signup form (Alleen de eerste error) -->
                <?php 
                if (isset($_SESSION["errors"])) {
                    foreach ($_SESSION["errors"] as $displayerror) {
                        echo "<p class='error-message'>$displayerror</p>";
                        break;
                    }
                    unset($_SESSION["errors"]);
                }
                ?>
                
                <div class="input-group">
                    <label for="name">Username</label>
                    <input type="text" name="name" value="<?php remember_forminput("usn") ?>"></input>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php remember_forminput("email") ?>"></input>
                </div>

                <div class="input-group">
                    <label for="email-match">Confirm email</label>
                    <input type="email" name="email-repeat" value="<?php remember_forminput("emailr") ?>"></input>
                </div>

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