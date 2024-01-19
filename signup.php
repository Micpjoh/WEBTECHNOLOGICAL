<?php
require_once "includes/securesession.inc.php";
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

    <!-- BODY SECTION -->
    <section id="signup-container">
        <div class = signup-box>

            <form action="includes/signup.inc.php" method="post">
                <h1>Sign up to&nbsp; <span style="color: green;"> GreenWear</span></h1>
                <div class="input-group">
                    <label for="name">*USERNAME</label>
                    <input type="text" name="name"></input>
                </div>

                <div class="input-group">
                    <label for="email">*EMAIL</label>
                    <input type="email" name="email"></input>
                </div class="input-group">

                <div class="input-group">
                    <label for="email-match">*REPEAT EMAIL</label>
                    <input type="email" name="email-repeat"></input>
                </div class="input-group">

                <div class="input-group">
                    <label for="pw">*PASSWORD</label>
                    <input type="password" name="password"></input>
                </div>

                <div class="input-group">
                    <label for="pw-match">*REPEAT PASSWORD</label>
                    <input type="password" name="password-repeat"></input>
                </div>

                <div class="terms-of-service">
                    <input type="checkbox" name="consent" value="conditions">
                    <span> *Yes, I have read and accepted the terms and conditions.<br>
                            <a href="termsservice.php">terms of service</a>
                    </span>
                </div>

                <div class="button-group">
                    <button type ="submit" name="submit">Submit when ready!</button>
                </div>

                <div class="button-group2">
                    <a href="signup.php">Already a GreenWear user? Log in</a>
                </div>
            </form>
            
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>

</body>

</html>