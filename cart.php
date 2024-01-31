<?php
require_once "includes/databasis.inc.php";
require_once "includes/securesession.inc.php";

$userId = $_SESSION['user_id']; // Replace with your actual user ID variable from session

// SQL to fetch cart items and their corresponding product details
$sql = "SELECT p.product_name, p.img, p.price, c.quantity 
        FROM cart c 
        INNER JOIN products p ON c.product_id = p.product_id 
        WHERE c.user_id = ?";

$stmt = $sqliconn->prepare($sql);

if ($stmt === false) {
    die("Error preparing the statement: " . $sqliconn->error);
}

// Bind parameters and execute
$stmt->bind_param("i", $userId);
$stmt->execute();

$result = $stmt->get_result();
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

        <div class = "cartinfo-box">
            <div class ="item-box">
            <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='cart-item'>";
                        echo "<img src='" . $row['img'] . "' alt='" . $row['product_name'] . "'>";
                        echo "<h3>" . $row['product_name'] . "</h3>";
                        echo "<p>Price: $" . $row['price'] . "</p>";
                        echo "<p>Quantity: " . $row['quantity'] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "Your cart is empty";
                }
                $stmt->close();
            ?>
            </div>

            <div class ="payment-box">
                <h1>Cart total</h1>
                
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>

</body>

</html>