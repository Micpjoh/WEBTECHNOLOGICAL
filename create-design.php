<?php
require_once "includes/securesession.inc.php";

// Als user niet ingelogd is, stuur hem terug naar loginpage
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('You need to be logged in to create a custom piece. <br> Redirecting to login page');         
    window.location.href = 'login.php';</script>";
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
    <link rel="stylesheet" href="css_files/create-design.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- Body -->
    <div class="sections-container">
        <section id="body1">
            <div class="header-text">
                <h1>Create your piece</h1>
            </div>
        </section>
        <section id="create-design-container">
        <div class="create-design-box">
                <div class="create-design-info">
                    <h2>Step 1: Pick your clothing piece</h2>
                    <p>
                    Our selection may be limited, but rest assured that everything you see is made of the highest quality materials.
                    Nothing in the current market comes close to our eco-friendly sourced materials ensuring that you look amazing with a piece of clothing that will last forever.
                    </p><br><br>
                
                    <label class="button-container">Shirt
                        <input type="radio"  name="clothing" value ="Shirt">
                        <span class="checkmark"></span>
                    </label><br>
                    <label class="button-container">Hoodie
                        <input type="radio" name="clothing" value ="Hoodie">
                        <span class="checkmark"></span>
                    </label><br>
                    <label class="button-container">Pants
                        <input type="radio"  name="clothing" value ="Pants">
                        <span class="checkmark"></span>
                    </label><br>
                    <label class="button-container">Beanie
                        <input type="radio" name="clothing" value="Beanie">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>

            <div class="create-design-box">
                <div class="create-design-info">
                    <h2>Step 2: Pick your color</h2>
                    <p>
                        We are a startup company so sadly our current selection of clothing is limited to only black and white.<br><br>
                        But rest assured in the future we shall release different colors to pick from and many more customisation options.
                    </p><br><br><br>
                    <label class="button-container">White
                        <input type="radio"  name="Color" value="White with print of">
                        <span class="checkmark"></span>
                    </label><br>
                    <label class="button-container">Black
                        <input type="radio" name="Color" value="Black with print of">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>

            <div class="create-design-box">
                <div class="create-design-info">
                    <h2>Step 3: Create your masterpiece</h2>
                    <p>
                        Just write whatever you wish to see on your clothing piece. Wait 20-30 seconds and be amazed by your own creation.<br><br>
                        Don't like it? Just re-write your request to your hearts content.

                        <form id="promptForm">
                            <input type="text" id="promptInput" placeholder="Enter your prompt">
                            <button type="submit">See your imagination come to life</button>
                        </form>
                    </p>
            </div>
            <img id="resultImage" src="" alt="AI generated result" style="display:none;">
            </div>
        </section>
        
        <section id="checkout-container">
            <form id="addtoStoreForm" action="includes/addtoStore.php" method="POST">
                    <input type="hidden" id="imageUrlInput" name="imageUrl" value="">
                    <input type="hidden" id="selectedClothingInput" name="clothing" value="">
                    <button id="addtoStore">Buy and add to catalog</button>
            </form>
        </section>
    </div>

    <script src="js/create-design.js"></script>
    <script src="js/addtoStore.js"></script>
    <!-- FOOTER -->
    <?php include "footer.php"; ?>

</body>

</html>