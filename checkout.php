<?php
// checkout.php
require_once "includes/databasis.inc.php";
require_once "includes/securesession.inc.php";
require_once "includes/orderfunctions.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or show an error
    exit('You must be logged in to checkout.');
}

// Assuming $_POST['submit'] is set when the checkout form is submitted
if (isset($_POST['submit'])) {
    // 1. Update the stock
    $sqlUpdateStock = "UPDATE products p INNER JOIN cart c ON p.product_id = c.product_id 
                        SET p.stock = p.stock - c.quantity
                        WHERE c.user_id = ?";

    $preparedstatement = $sqliconn->prepare($sqlUpdateStock);
    $preparedstatement->bind_param("i", $_SESSION['user_id']);
    $preparedstatement->execute();
    $preparedstatement->close();

    // 2. Clear the cart
    $preparedstatement = $sqliconn->prepare("DELETE FROM cart WHERE user_id = ?");
    $preparedstatement->bind_param("i", $_SESSION['user_id']);
    $preparedstatement->execute();
    $preparedstatement->close();

    create_order($user_id, $sqliconn);

    echo '<script type="text/javascript">
            alert("Thank you for shopping at greenwear.");
            window.location.href = "cart.php";
          </script>';
    die();
}
?>
