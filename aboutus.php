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
    <link rel="stylesheet" href="css_files/aboutus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- BODY SECTION -->
    <section id="aboutus-container">
        <div class="aboutus-box">
            <img src="img/catprogramming.png">
            <div class="aboutus-info">
                <h2>The GreenWear Team</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Integer sit amet dui justo. Praesent tempus aliquam felis consectetur posuere. 
                    Integer ornare blandit tortor id rhoncus. Aenean venenatis rutrum odio. Quisque
                </p>
            </div>
        </div>

        <div class="aboutus-box">
            <div class="aboutus-info">
                <h2>..</h2>
                <p>
                    ..
                </p>
            </div>
        </div>

        <div class="aboutus-box">
            <div class="aboutus-info">
                <h2>..</h2>
                <p>
                    ..
                </p>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>

</body>

</html>