<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css_files/main.css">
    <link rel="stylesheet" href="css_files/catalog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- BODY SECTION -->
    <section>
        <div id="header-cloth">
            <div id="header-left">
                <h1>Our products</h1>
                <h3>upgrade your wardrobe with your favorite prints on our high quality basics</h3>
                
            </div>  
            <div id="header-right">
                <img src="img/hanger.png" id="header-icon">
            </div>  
            
        </div>
    </section>

    <section id="content">
        <div id="cloth-container">
            <div class="cloth-rows">
                <div class="cloth">
                    <div class="img-here"></div>
                    <div class="name-container">
                        <h2>Sweatshirts & Hoodies</h2>
                    
                    </div>
       
                </div>

                <div class="cloth">
                    <div class="img-here"></div>
                    <div class="name-container">
                        <h2>T-shirts & Tops</h2>
                    
                    </div>
       
                </div>

            </div>

            <div class="cloth-rows">
                <div class="cloth">
                    <div class="img-here"></div>
                    <div class="name-container">
                        <h2>Pants & Bottoms</h2>
                    
                    </div>
       
                </div>

                <div class="cloth">
                    <div class="img-here"></div>
                    <div class="name-container">
                        <h2>Accessories</h2>
                    
                    </div>
       
                </div>

            </div>
        </div>        
   
       
    </section>


    <!-- FOOTER -->

    <?php include "footer.php"; ?>
    
</body>

</html>
