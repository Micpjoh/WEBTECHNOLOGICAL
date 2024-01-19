<?php
require_once "includes/securesession.inc.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css_files/main.css">
    <link rel="stylesheet" href="css_files/faq.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- HERO SECTION -->
    <section id="section1">
        <div class="faq-">
            <h1 class="h1">FAQ</h1>
            <h2 class="h2">place to be for all of your <br> questions</h2>
        </div>

        <div class="banner-img">
            <img src="img/faq-banner.png"/>
        </div>
    </section>

    <!-- BODY SECTION -->
    <section id="section2">
        <div class="accordions">
            <div class="accordion">
                <div class="head">What is&nbsp; <span style="color: green;"> GreenWear</span>?</div>
                <div class="head-info">mycloth is ....</div>
            </div>

            <div class="accordion">
                <div class="head">International shipping?</div>
                <div class="head-info">....</div>
            </div>

            <div class="accordion">
                <div class="head">Shipping fees?</div>
                <div class="head-info">....</div>
            </div>

            <div class="accordion">
                <div class="head">Taxes?</div>
                <div class="head-info">....</div>
            </div>

            <div class="accordion">
                <div class="head">Defect product?</div>
                <div class="head-info">....</div>
            </div>

            <div class="accordion">
                <div class="head">CO2 neutral?</div>
                <div class="head-info">....</div>
            </div>

        </div>
    </section>
    
    <!-- FOOTER -->
    <?php include "footer.php"; ?>

    <script src="js/script.js"></script>
</body>

</html>
