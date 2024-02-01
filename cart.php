<?php
require_once "includes/databasis.inc.php";
require_once "includes/securesession.inc.php";

// select product details, and multiiply qty with price, for total cost of cart
// join the 2 tables for product info. match product_id in cart and products
$sqlquery = "SELECT cart.product_id, products.product_name, products.img, products.price, cart.quantity, (products.price * cart.quantity) AS total_cost
        FROM cart
        INNER JOIN products ON cart.product_id = products.product_id
        WHERE cart.user_id = ?";

$preparedstatements = $sqliconn->prepare($sqlquery);
$preparedstatements->bind_param("i", $_SESSION['user_id']);
$preparedstatements->execute();

$result = $preparedstatements->get_result();

$totalCost = 0; // Initialize total cost
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css_files/main.css">
    <link rel="stylesheet" href="css_files/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- BANNER SECTION -->
    <section id="body1">
        <div class="header-text">
            <h1>Cart</h1>
        </div>
        <h2>Your personal shopping bag! All digital, No plastic</span>.</h2>
    </section>

    <!-- BODY SECTION -->
    <section id="cart-container">
        <div class ="cart-header">
            <h1>Greenwear shopping cart:</h1>

        </div>
        <!-- DONT FORGET TO ADD ALT TO IMAGES -->
        <div class = "cartinfo-box">
            <div class ="item-box">
            <?php
            // check if item in cart table
                if ($result->num_rows > 0) {
                    // use echo for each line for readability, remember to do same for other
                    // files
                    
                    // display each item
                    while($row = $result->fetch_assoc()) {
                        // get all data of product which is going to be used
                        $product_name = $row['product_name'];
                        $product_img = $row['img'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        echo "<div class='cart-item'>";
                        echo "<img src='$product_img'>";
                        echo "<h3>$product_name</h3>";
                        echo "<p>Price: $price</p>";
                        echo "<p>Amount: $quantity</p>";
                        // remove button, leads to removefromcart.php
                        echo "<form action='includes/removefromcart.php' method='POST'>";
                        echo "<input type='hidden' name='product_id' value='" . $row['product_id'] . "'>";
                        echo "<button type='submit' name='remove'>Remove</button>";
                        echo "</form>";
                        echo "</div>";
                        $totalCost += $row['total_cost'];

                    }
                } else {
                    // if no item in cart table show message that there are no items in cart
                    echo "No items currently in cart";
                }
                $preparedstatements->close();
            ?>
            </div>

                <div class ="payment-box">
                <div class="cart-header">
                    <h1>Cart total</h1>
                </div>

                <?php $totalCostWithVAT = $totalCost * 1.03; ?> 

                <div class ="belasting-total">
                    <p>Subtotal: €<?php echo number_format($totalCost, 2); ?></p>
                    <p>BTW (3%): €<?php echo number_format($totalCost * 0.03, 2); ?></p>
                    <p>Total Cost: €<?php echo number_format($totalCostWithVAT, 2); ?></p>
                </div>

                <div class="button-box"> 
                    <form action="includes/checkout.php" method="post">
                        <button type="submit" name="submit">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>

</body>

</html>