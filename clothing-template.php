<?php
require_once "includes/securesession.inc.php";
require_once "includes/databasis.inc.php";
if(isset($_GET['cat'])){
    // Sanitize input to prevent SQL injection
    $cat_id = $sqliconn->real_escape_string($_GET['cat']);

// Query for products with stock greater than 0
$sql = "SELECT * FROM products WHERE category_id = ? AND stock >0";

$secure = $sqliconn->prepare($sql);
$secure->bind_param("i", $cat_id);
$secure->execute();
$result = $secure->get_result();

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
    <!-- BANNER SECTION -->
    <section id="body1">
    <div class="header-text">
        <h1>Our products</h1>
    </div>
    <h2>A single size clothing for all humans :)</h2>
    </section>

    <!-- BODY -->
    <section>
        <div id="mother-div">
            <div id="big-div">
               
                <div id="row-container" class="cloth-row">
            
                    <?php
                    while($row = $result->fetch_assoc()){
                        $product_name = $row['product_name'];
                        $product_img = $row['img'];
                        $price = $row['price'];
                        $product_id = $row ['product_id'];


                    echo "
                        <a class='item' href= 'product.php?product_id=$product_id'>
                            <div class='imghere'>
                                <img src=$product_img>
                            </div>
                            <div class='item-desc'>
                                <h3 class='name'>$product_name</h3>
                                <h3 class='price'>€" . $price . "</h3>
                            </div>
                        </a> ";
                    };
                };

                ?>
            </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>
</body>
</html>
