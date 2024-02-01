<?php
require_once "includes/securesession.inc.php";
require_once "includes/clothing-functions.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing-template</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css_files/main.css">
    <link rel="stylesheet" href="css_files/clothing.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/catalog.js"></script>

</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <section>
        <div id="header-cloth">
        <?php
        // if category id in url get the name of the category corresponding to the id in the url
        if (isset($_GET['cat'])) {
            $cat_id = $sqliconn->real_escape_string($_GET['cat']);
            // call function
            getname($cat_id);
        }

        ?>
        
        </div>
    </section>

    <section>
        <div id="mother-div">
            <div id="big-div">
               
            <div id="row-container" class="cloth-row">
            <?php

            //if category_id in url get products from that category
            if (isset($_GET['cat'])) {
                $cat_id = $sqliconn->real_escape_string($_GET['cat']);

                getProducts($cat_id);
            }
            ?>

            </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>
</body>
</html>
