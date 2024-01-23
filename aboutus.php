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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- BANNER SECTION -->
    <section id="body1">
        <div class="header-text">
            <h1>About us!</h1>
        </div>
        <h2>Information about  <span class="logoname">GreenWear</span>.</h2>
    </section>

    <!-- BODY SECTION -->
    <section id="aboutus-container">
        <div class="aboutus-box">
            <img src="img/catprogramming.jpeg">
            <div class="aboutus-info">
                <h2>The GreenWear Team</h2>
                <p>
                We are a team of AI students at UVA with a great passion for programming.
                This company website <span class="logoname">GreenWear</span> , has been built by us during our course at UVA <br> <br>
                We may not have our pictures, but the image above perfectly encapsulates ourselves during this course.
                </p>
            </div>
        </div>

        <div class="aboutus-box">
            <img src="img/rainforest.jpg">
            <div class="aboutus-info">
                <h2>We plant trees</h2>
                <p>
                We are a team of AI students at UVA with a great passion for programming.
                This company website <span class="logoname">GreenWear</span> , has been built by us during our course at UVA <br> <br>
                We may not have our pictures, but the image above perfectly encapsulates ourselves during this course.
                We are a team of AI students at UVA with a great passion for programming.
                This company website <span class="logoname">GreenWear</span> , has been built by us during our course at UVA <br> <br>
                We may not have our pictures, but the image above perfectly encapsulates ourselves during this course.
                </p>
            </div>
        </div>

        <div class="aboutus-box">
            <img src="img/treeplanting.jpg">
            <div class="aboutus-info">
                <h2>We help preserving the Amazon</h2>
                <p>
                We are a team of AI students at UVA with a great passion for programming.
                This company website <span class="logoname">GreenWear</span> , has been built by us during our course at UVA <br> <br>
                We may not have our pictures, but the image above perfectly encapsulates ourselves during this course.
                </p>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>

</body>

</html>