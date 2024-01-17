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
</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- BODY SECTION -->
    <section id="body1">
        <div class="header-text">
            <h1>Get in touch!</h1>
        </div>
        <h2>U can use this form to contact mycloth regarding questions and feedback.</h2>
    </section>

    <!-- veranderd required, om malicious users te voorkomen -->
    <section id="contact-form">
        <form action="" method="post">
            <div class="input-group">
                <label for="name">NAME</label>
                <input type="text" name="name" placeholder="John Doe" required>
            </div>

            <div class="input-group1">
                <div class="input-subgroup">
                    <label for="email">E-MAIL</label>
                    <input type="email" name="email" placeholder="JohnDoe@hotmail.com" required>
                </div>
    
                <div class="input-subgroup">
                    <label for="subject">SUBJECT</label>
                    <input type="text" name="subject" placeholder="GreenWear" required>
                </div>
            </div>

            <div class="input-group">
                <label for="message">FEEDBACK / MESSAGE</label>
                <textarea name="message" placeholder="Your message" required></textarea>
            </div>
            
            <div class="button-group">
                <button type ="submit" name="submit">Submit when ready!</button>
            </div>
        </form>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>

    <script src="script.js"></script>
</body>

</html>
