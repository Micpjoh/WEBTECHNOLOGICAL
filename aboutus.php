<?php
require_once "includes/securesession.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about us</title>
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
                At <span class="logoname">GreenWear</span>, our commitment to sustainability is woven into every purchase. 
                With our tree-planting initiative, 5% of every sale goes directly towards planting 
                trees in collaboration with environmental organizations. <br><br>By choosing <span class="logoname">GreenWear</span>,
                 you're not only dressing in eco-friendly attire but also ensuring that a 
                 significant portion of your purchase actively contributes to global reforestation 
                 efforts. <br><br>Together, we're making a meaningful impact on the planet, one stylish garment 
                 and one tree at a time.
                </p>
            </div>
        </div>

        <div class="aboutus-box">
            <img src="img/treeplanting.jpg">
            <div class="aboutus-info">
                <h2>We help preserving the Amazon</h2>
                <p>
                At <span class="logoname">GreenWear</span>, we're passionate about preserving the Amazon rainforest. 
                Through impactful partnerships with conservation organizations, 
                we dedicate resources to prevent deforestation, support local communities, 
                and promote sustainable practices.<br><br> Your choice of <span class="logoname">GreenWear</span> contributes 
                directly to the protection of this vital ecosystem, 
                helping ensure a greener and healthier future for the Amazon and our planet.
                </p>
            </div>
        </div>

        <div class="aboutus-box">
            <img src="img/catwithclothes.jpg">
            <div class="aboutus-info">
                <h2>One size fits all</h2>
                <p>
                At <span class="logoname">GreenWear</span> all our shirts are made to fit all sizes you can find.
                with our state of the art technology, using special tailoring techniques that you won't find at any 
                other stores, we create these special clothes to be able to fit your every need. You want a baggy shirt, 
                to fit your newly bought baggy clothes? no worry! You need a slim fit shirt, because you have a wedding 
                tommorow and you need to dress up nicely? Still no worries! because the clothing you bought at 
                <span class="logoname">GreenWear</span> has got you covered!
                </p>
            </div>
        </div>

        <div class="aboutus-box">
            <img src="img/happy.jpeg">
            <div class="aboutus-info">
                <h2>Our history</h2>
                <p>
                while we were creating our catalogue of clothes, we had a hard time deciding what kind of clothing
                 we would sell. Should we focus more on prints that are focused on a particular group, like gamers for example,
                 or should we focus on trying to satisfy as many different customers as we could. We at <span class="logoname">GreenWear</span>
                 had decided that we would love to do the second thing: to satisfy the masses. But how would we do this?<br><br>
                 There is no way a small company like ours can create a catalogue big enough to satisfy this goal that we have set for ourselves. 
                 Then we thought to ourselves: "What if we use the current AI technology, used to generate images using text-to-image technology, for the creation of very personalized clothing pieces." 
                 With this we hope to ensure that every customer will get what they can imagine and leave our site satisfied. So we did just that!
                </p>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>

</body>

</html>
