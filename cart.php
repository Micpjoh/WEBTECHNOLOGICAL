<?php
require_once "includes/databasis.inc.php";
require_once "includes/securesession.inc.php";

$sql = "SELECT cart.product_id, products.product_name, products.img, products.price, cart.quantity, (products.price * cart.quantity) AS total_cost
        FROM cart
        INNER JOIN products ON cart.product_id = products.product_id
        WHERE cart.user_id = ?";

$stmt = $sqliconn->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();

$result = $stmt->get_result();

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
            <h1>Shoppingcart</h1>
        </div>
        <h2>Your personal shopping bag! All digital, No plastic :)</span>.</h2>
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
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $product_name = $row['product_name'];
                        $product_img = $row['img'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        echo "<div class='cart-item'>";
                        echo "<img src='$product_img'>";
                        echo "<h3>$product_name</h3>";
                        echo "<p>Price: $price</p>";
                        echo "<p>Amount: $quantity</p>";
                        echo "<form action='removefromcart.php' method='POST'>";
                        echo "<input type='hidden' name='product_id' value='" . $row['product_id'] . "'>";
                        echo "<button type='submit' name='remove'>Remove</button>";
                        echo "</form>";
                        echo "</div>";
                        $totalCost += $row['total_cost'];

                    }
                } else {
                    echo "No items brokeboi xd";
                }
                $stmt->close();
            ?>
            </div>

                <div class ="payment-box">
                    <div>
                    <h1>Cart total</h1>
                    </div>

                    <div>
                    <p>Total Cost: €<?php echo number_format($totalCost, 2); ?></p>
                    </div>

                    <div>
                        <div class="button-box">
                            <form action="checkout.php" method="post">
                                <button type="submit" name="submit">Checkout</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>

</body>

</html>