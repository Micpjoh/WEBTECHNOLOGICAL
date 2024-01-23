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
    <link rel="stylesheet" href="css_files/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- BANNER SECTION -->
    <section id="banner-box">
        <div class="banner-text">
            <h1>Get in touch!</h1>
        </div>
        <h2>U can use this form to contact  <span class="logoname">GreenWear</span> regarding questions and feedback.</h2>
    </section>

    <!-- verander required, om malicious users te voorkomen -->
    <!-- BODY SECTION -->
    <section id="contact-form">
        <form action="includes/contact.inc.php" method="post">
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "error") {
                    echo  "<p class='error-message'>Message has failed to deliver <br>
                    Make sure you have filled in all fields!</p>";
                } 
                if ($_GET["error"] == "success") {
                    echo  "<p class='succes-message'>Message has been sent!</p>";
                }
            }
            ?>
            <div class="input-box">
                <label for="name">NAME</label>
                <input type="text" name="name" placeholder="John Doe" >
            </div>

            <div class="input-box1">
                <div class="input-subbox">
                    <label for="email">E-MAIL</label>
                    <input type="email" name="email" placeholder="JohnDoe@hotmail.com" >
                </div>
    
                <div class="input-subbox">
                    <label for="subject">SUBJECT</label>
                    <input type="text" name="subject" placeholder="GreenWear" >
                </div>
            </div>

            <div class="input-box">
                <label for="message">FEEDBACK / MESSAGE</label>
                <textarea name="message" placeholder="Your message" ></textarea>
            </div>
            
            <div class="button-box">
                <button type ="submit" name="submit">Submit when ready!</button>
            </div>

            <script src="js/contact.js"></script>
            
        </form>

        <div class="contact-info">
            <div class="contact-box">
                <div class="icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="info">
                    <h3>Address</h3>
                    <p>Amsterdam<br>Science park UVA</p>
                </div>
            </div>

            <div class="contact-box2">
                <div class="icon">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="info">
                    <h3>E-mail</h3>
                    <p>inquiregreenwear@gmail.com</p>
                </div>
            </div>

            <div class="contact-box">
                <div class="icon">
                    <i class="fa fa-phone"></i>
                </div>
                <div class="info">
                    <h3>Phone Number</h3>
                    <p>+316 22233344</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>

    <script src="js/validatecontactinput.js"></script>

</body>

</html>
