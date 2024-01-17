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
    <style>
        body {
          background-image: url('/home/micah/Downloads/Mycloth _main.jpg');
          background-repeat: no-repeat;
          background-attachment: scroll;  
          background-size: 80%;
          background-position-y:  top;
          background-position-x: center;

        }
        </style>
    <div class="article">
      <h1>Mycloth</h1>
      <h2>clothing made for and by you</h2>
    </div>
     <!-- Container for the image gallery -->
     <style>
        body {
          font-family: Arial;
          margin: 0;
        }
        
        * {
          box-sizing: border-box;
        }
        
        img {
          vertical-align: middle;
        }
        
        /* Position the image container (needed to position the left and right arrows) */
        .container {
          position: relative;
        }
        
        /* Hide the images by default */
        .mySlides {
          display: none;
        }
        
        /* Add a pointer when hovering over the thumbnail images */
        .cursor {
          cursor: pointer;
        }
        
        /* Next & previous buttons */
        .prev,
        .next {
          cursor: pointer;
          position: absolute;
          top: 40%;
          width: auto;
          padding: 16px;
          margin-top: -50px;
          color: white;
          font-weight: bold;
          font-size: 20px;
          border-radius: 0 3px 3px 0;
          user-select: none;
          -webkit-user-select: none;
        }
        
        /* Position the "next button" to the right */
        .next {
          right: 0;
          border-radius: 3px 0 0 3px;
        }
        
        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
          background-color: rgba(0, 0, 0, 0.8);
        }
        
        /* Number text (1/3 etc) */
        .numbertext {
          color: #f2f2f2;
          font-size: 12px;
          padding: 8px 12px;
          position: absolute;
          top: 0;
        }
        
        /* Container for image text */
        .caption-container {
          text-align: center;
          background-color: #222;
          padding: 2px 16px;
          color: white;
        }
        
        .row:after {
          content: "";
          display: table;
          clear: both;
        }
        
        .column {
          float: left;
          width: 25%;
        }
        
        /* Add a transparency effect for thumnbail images */
        .demo {
          opacity: 0.6;
        }
        
        .active,
        .demo:hover {
          opacity: 1;
        }
        </style>
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
