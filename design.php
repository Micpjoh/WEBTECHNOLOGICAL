<?php
require_once "includes/securesession.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design</title>
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
            <div class="design-box">
                
                <!--Info about how our custom designs are done-->
                <div class="Design-info">
                    <h2>3 EASY STEPS</h2><br><br><br>
                    <p>
                    Step 1: Choose what type of clothing piece you want.<br> <br>
                    Step 2: Use our image generating technology to create whatever you can imagine.<br><br>
                    Step 3: Pay.<br> <br>
                    It's really THAT easy here at <span class="logoname">GreenWear</span> . We pride ourselves in making the process as easy and quick as possible.
                    We trust that you will make a piece of clothing that even we will be jealous of.<br>
                    </p>
                    <p>
                    Ready to unleash your creativity? Start designing now and see your imagination come to life!<br><br>
                    </p>

                    <!-- Link to next page -->
                    <p>
                        Like what you made? Think other people would want it as well? Just click the 'Add to shop' button upon payment and receive a 10% comission fee for every item sold.
                        <br><br>
                        
                        <a href="create-design.php" class="start-designing-link">Start your creative journey!</a>

                    </p>                
                </div>
            </div>
            <!-- Slideshow -->
            <div class="design-box">
                <div class="mySlides fade">
                    <img src="img/p1.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="img/p2.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="img/p3.jpg" style="width:100%">
                </div>

                <div style="text-align:center">
                    <span class="dot"></span> 
                    <span class="dot"></span> 
                    <span class="dot"></span> 
                </div>
            </div>
            <!-- slideshow from W3School-->
       </section>
    <script src="js/design.js"></script>


    <!-- FOOTER -->
    <?php include "footer.php"; ?>

</body>

</html>
