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

    <!-- BANNER SECTION -->
    <section id="banner-box">
        <div class="banner-text">
            <h1>FAQ</h1>
            <h2>place to be for all of your questions</h2>
        </div>

    </section>

    <!-- BODY SECTION -->
    <section id="accordion-container">
        <div class="accordion-box">
            <div class="accordion">
                <div class="head">What is&nbsp; <span style="color: green;"> GreenWear</span>?</div>
                <div class="head-info">
                    GreenWear is a sustainable clothing brand committed to environmentally friendly practices. 
                    Our clothes are produced with high-quality materials in a green and ethical manner. 
                    <br><br>Embracing fair trade principles, we offer a single size that fits all, 
                    minimizing waste and promoting a more sustainable fashion industry.
                </div>
            </div>

            <div class="accordion">
                <div class="head">Do you ship internationally?</div>
                <div class="head-info">
                    Yes, GreenWear proudly ships internationally, 
                    allowing eco-conscious customers worldwide to enjoy our sustainable and high-quality clothing.
                </div>
            </div>

            <div class="accordion">
                <div class="head">My order never arrived</div>
                <div class="head-info">
                    Please contact our Customer Service Team at 
                    customerservice@greenwear.com for further assistance. 
                    <br>We'll promptly assist you in resolving the issue and ensuring your satisfaction with GreenWear products.
                </div>
            </div>

            <div class="accordion">
                <div class="head">I have received a defect product</div>
                <div class="head-info">
                    Please contact our Customer Service Team at 
                    customerservice@greenwear.com for further assistance. 
                    <br>We'll promptly assist you in resolving the issue and ensuring your satisfaction with GreenWear products.
                </div>
            </div>

            <div class="accordion">
                <div class="head">How does GreenWear contribute to social responsibility?</div>
                <div class="head-info">
                    At GreenWear, social responsibility is integral to our mission. 
                    We ensure fair trade practices, support ethical working conditions, and engage in community initiatives. 
                    <br><br>By promoting positive social impact, we strive to make a meaningful difference beyond just providing sustainable and high-quality clothing.
                </div>
            </div>

            <div class="accordion">
                <div class="head">CO2 neutral?</div>
                <div class="head-info">
                    At GreenWear, we are committed to being CO2 neutral by implementing various eco-friendly practices throughout our production process. 
                    <br><br>Our commitment includes:
                    Sustainable Materials, Low-Impact Production, Renewable Energy, Carbon Offsetting, Local Sourcing and Circular Economy Practices.
                </div>
            </div>
        </div>
        
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

    <script src="js/script.js"></script>
</body>

</html>
