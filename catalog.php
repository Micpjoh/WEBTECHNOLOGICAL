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
    <section id="header">
        <div class="nav-container">
            <div class="logo">
                <a href="index.html">mycloth</a>
            </div>

            <div class="navbarLEFT">
                <div class="dropdown">
                    <a class="a" href="catalog.html">Catalog 
                      <i class="fa fa-caret-down"></i>
                    </a>
                    <div class="dropdown-content">
                      <a href="#">Shirts</a>
                      <a href="#">Sweaters</a>
                      <a href="#">Pants</a>
                      <a href="#">Shoes</a>
                    </div> 
                </div> 
                    <a class="a" href="design.html">Design</a>
                    <a class="a" href="aboutus.html">About us</a>
                    <a class="a" href="faq.html">FAQ</a>
                    <a class="a" href="contact.html">Contact</a>
            </div>
        </div>

        <div class="navbarRIGHT">
            <a href="login.html">Login</a>
            <a href="cart.html">
                <svg class="cart" height="55" viewBox="0 0 14 44" width="20" xmlns="http://www.w3.org/2000/svg">
                <path d="m11.3535 16.0283h-1.0205a3.4229 3.4229 0 0 0 -3.333-2.9648 3.4229 3.4229 0 0 0 -3.333 2.9648h-1.02a2.1184 2.1184 0 0 0 -2.117 2.1162v7.7155a2.1186 2.1186 0 0 0 2.1162 2.1167h8.707a2.1186 2.1186 0 0 0 2.1168-2.1167v-7.7155a2.1184 2.1184 0 0 0 -2.1165-2.1162zm-4.3535-1.8652a2.3169 2.3169 0 0 1 2.2222 1.8652h-4.4444a2.3169 2.3169 0 0 1 2.2222-1.8652zm5.37 11.6969a1.0182 1.0182 0 0 1 -1.0166 1.0171h-8.7069a1.0182 1.0182 0 0 1 -1.0165-1.0171v-7.7155a1.0178 1.0178 0 0 1 1.0166-1.0166h8.707a1.0178 1.0178 0 0 1 1.0164 1.0166z"></path>
                </svg>
            </a>
        </div>

        <div class="nav-bars">
            <i class="fa-solid fa-bars"></i>
        </div>
    </section>
    
    <div class="nav-dropdown">
        <ul>
            <li><a href="index.html">Catalog</a></li>
            <li><a href="design.html">Design</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="cart.html">Cart</a>
        </ul>
    </div>

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

    <!-- FOOTER 
    <section id="footer">
        <p class="copyright">Copyright © 2023 mycloth.nl | All rights reserved. </p>
    </section>

    <script src="script.js"></script>
-->
</body>

</html>
