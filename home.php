<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css_files/main.css">
    <link rel="stylesheet" href="css_files/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- BODY SECTION -->
    <div class="article">
      <h1>Mycloth</h1>
      <h2>clothing made for and by you</h2>
    </div>
     <!-- Container for the image gallery -->
<div class="container">

    <!-- Full-width images with number text -->
    <div class="mySlides">
      <div class="numbertext">1 / 4</div>
        <img src="/home/micah/Downloads/DALL·E 2024-01-16 10.13.29 - Create an image of a single t-shirt suitable for a webshop, inspired by general fantasy and adventure themes. The t-shirt features elements like a myt.png" style="width:100%">
    </div>
  
    <div class="mySlides">
      <div class="numbertext">2 / 4</div>
        <img src="/home/micah/Downloads/DALL·E 2024-01-16 10.13.26 - Create an image of a pair of trousers suitable for a webshop, inspired by general video game themes. The trousers feature a unique design with element.png" style="width:100%">
    </div>
  
    <div class="mySlides">
      <div class="numbertext">3 / 4</div>
        <img src="/home/micah/Downloads/DALL·E 2024-01-16 10.13.20 - Create an image of a dark fantasy-themed beanie, ideal for a webshop, with a plain background. The beanie should be displayed from a front perspective.png" style="width:100%">
    </div>
  
    <div class="mySlides">
      <div class="numbertext">4 / 4</div>
        <img src="/home/micah/Downloads/DALL·E 2024-01-16 10.13.08 - Create an image of a sci-fi and action-themed hoodie suitable for a webshop, displayed from a front view. The hoodie is designed with bold and dynamic.png" style="width:100%">
    </div>
  
  
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  
    <!-- Image text -->
    <div class="caption-container">
      <p id="caption"></p>
    </div>
  
    <!-- Thumbnail images -->
    <div class="row">
      <div class="column">
        <img class="demo cursor" src="/home/micah/Downloads/DALL·E 2024-01-16 10.13.29 - Create an image of a single t-shirt suitable for a webshop, inspired by general fantasy and adventure themes. The t-shirt features elements like a myt.png" style="width:100%" onclick="currentSlide(1)" alt="Skyrim inspired T-shirt">
      </div>
      <div class="column">
        <img class="demo cursor" src="/home/micah/Downloads/DALL·E 2024-01-16 10.13.26 - Create an image of a pair of trousers suitable for a webshop, inspired by general video game themes. The trousers feature a unique design with element.png" style="width:100%" onclick="currentSlide(2)" alt="Mario inspired pants">
      </div>
      <div class="column">
        <img class="demo cursor" src="/home/micah/Downloads/DALL·E 2024-01-16 10.13.20 - Create an image of a dark fantasy-themed beanie, ideal for a webshop, with a plain background. The beanie should be displayed from a front perspective.png" style="width:100%" onclick="currentSlide(3)" alt="Elden Ring inspired Beanie">
      </div>
      <div class="column">
        <img class="demo cursor" src="/home/micah/Downloads/DALL·E 2024-01-16 10.13.06 - Create an image of a sci-fi and action-themed hoodie suitable for a webshop, displayed from a front view. The hoodie is designed with bold and dynamic.png" style="width:100%" onclick="currentSlide(4)" alt="DOOM inspired hoodie">
      </div>
    </div>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>

    <script>src="js/home-js-blur.js"</script>
</body>

</html>
