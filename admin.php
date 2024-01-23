<?php
require_once "includes/securesession.inc.php";

if (!isset($_SESSION['user_id']) || ($_SESSION['user_type'] !== "admin")) {
    header("Location: home.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css_files/main.css">
    <link rel="stylesheet" href="css_files/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- BANNER SECTION -->
    <section id="banner-box">
        <div class="banner-text">
            <h1>Hi, <?php echo $_SESSION['user_name']; ?>. <br> This is the admin page.</h1>
        </div>
    </section>

    <!-- BODY SECTION -->
    <section id="interface-container">
        <div class = "interface-box">
            <h1>Amount <br>of users</h1>
        </div>

        <div class = "interface-box2">
            <h1>Amount <br>of products</h1>
        </div>

        <div class = "interface-box">
            <h1>Amount <br>of orders</h1>
        </div>
    </section>

    <section id="interface-container">
        <div class = "interface-box">
            <h1>All products currently in store</h1>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>

</body>

</html>
