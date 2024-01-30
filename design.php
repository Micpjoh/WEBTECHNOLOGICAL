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
    <link rel="stylesheet" href="css_files/design.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- BANNER SECTION -->
    <section id="body1">
        <div class="header-text">
            <h1>Design</h1>
        </div>
        <h2>Design your own <span class="logoname">GreenWear</span> clothing piece.</h2>
    </section>

    <!-- BODY SECTION -->
        <section id="design-container">
            <div class="design-box" style="
            display: flex;
            gap: 10px;
            ">
                <img src="img/catprogramming.jpeg">

                <div class="Design-info">
                    <h2>3 EASY STEPS</h2>
                    <p>
                    Step 1: Choose what type of clothing piece you want.<br> 
                    Step 2: Use our image generating technology to create whatever you can imagine.<br>
                    Step 3: Pay.<br> <br>
                    It's really THAT easy here at <span class="logoname">GreenWear</span> .
                    </p>
                    <p>
                    Ready to unleash your creativity? <a href="create-design.php" class="start-designing-link">Start designing now</a> and see your imagination come to life!<br><br>
                    </p>

                    <p>
                        Like what you made? Think other people would want it as well? Just click the 'Add to shop' button upon payment and receive a 10% comission fee for every item sold.
                    </p>                
                </div>
                <div class="bg-1" style="
                background-image: url(img/catprogramming.jpeg);
                    height: 100px;
                    width: 100px
                    display: flex
                ">

                </div>
                        <div class="mySlides fade">
                            <div class="numbertext">1 / 3</div>
                            <img src="img/p1.jpg" style="width:100%">
                            <div class="text">Caption Text</div>
                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">2 / 3</div>
                            <img src="img/p2.jpg" style="width:100%">
                            <div class="text">Caption Two</div>
                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">3 / 3</div>
                            <img src="img/p3.jpg" style="width:100%">
                            <div class="text">Caption Three</div>
                        </div>

                    </div>

                <div style="text-align:center">
                    <span class="dot"></span> 
                    <span class="dot"></span> 
                    <span class="dot"></span> 
                </div>
       </section>
    <script src="js/design.js"></script>


    <!-- FOOTER -->
    <?php include "footer.php"; ?>

</body>

</html>