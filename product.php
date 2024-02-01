<?php
require_once "includes/databasis.inc.php";
require_once "includes/securesession.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css_files/main.css">
    <link rel="stylesheet" href="css_files/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/catalog.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- BODY SECTION -->
    <section>
        <div id="header-cloth">
            <h1>Our products</h1>
            <h2>upgrade your wardrobe with your favorite prints on our high quality basics</h2>
        </div>
    </section>

    <section id='content'>
        <div class='product-wrapper'>
        
        <?php
        if(isset($_GET['product_id'])){
                    // Sanitize input to prevent SQL injection
            $product_id = $sqliconn->real_escape_string($_GET['product_id']);

            // Query for products with stock greater than 0
            $sql = "SELECT * FROM products WHERE product_id = ?";
            $secure = $sqliconn->prepare($sql);

            $secure->bind_param("i", $product_id);

            $secure->execute();

            $result = $secure->get_result();

            while($row = $result->fetch_assoc()){
                $product_name = $row['product_name'];
                $product_img = $row['img'];
                $price = $row['price'];
                $desc = $row['product_info'];
                $stock = $row['stock'];
                echo "
                <div class='product-container'>

                    <div class='product-left'>
                        <div class='img-here'>
                            <img src='$product_img'>
                        </div>
                    </div>

                    <div class='product-right'>
                
                        <div class='product-item'>
                            <h2 class='name'>$product_name</h2>
                            <label for='desc'>Price:</label>
                            <h3 class='desc'>$price</h3>

                            <label for='desc'>Description:</label>
                            <h3 class='desc'>$desc</h3>

                            <label for='desc'>Stock:</label>
                            <h3 class='desc'>In Stock!</h3>

                            <form id='add-to-cart-form' action='addtocart.php' method='POST'>
                                <input type='hidden' name='product_id' value='$product_id'>
                                <label for='quantity'>Quantity:</label>
                                <input type='number' name='quantity' value='1' min='1' max='$stock'>
                                <button type='submit' name='submit' id='submit-btn'>Add to Cart</button>
                            </form>    

                        </div>

                    </div>
                </div>";
            
                };      
            };
        ?>
        </div>        
    </section>

   
    <!-- FOOTER -->

    <?php include "footer.php"; ?>
    <script>
    $(document).ready(function() {
        $("#add-to-cart-form").on('submit', function(event) {
            event.preventDefault();

            var formData = $(this).serialize() + '&submit=' + $("#submit-btn").val();

            $.ajax({
                type: "POST",
                url: "addtocart.php",
                data: formData,
                dataType: "json",
                success: function(response) {
                    alert(response.message);
                },
                error: function() {
                    alert("You need to login in order to add a product to cart");
                }
            });
        });
    });
    </script>

</body>
</html>