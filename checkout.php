<?php
// checkout.php
require_once "includes/databasis.inc.php";
require_once "includes/securesession.inc.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or show an error
    exit('You must be logged in to checkout.');
}

// 1. Update the stock
$sqlUpdateStock = "UPDATE products p INNER JOIN cart c ON p.product_id = c.product_id 
                    SET p.stock = p.stock - c.quantity
                    WHERE c.user_id = ?";
$stmtUpdateStock = $sqliconn->prepare($sqlUpdateStock);
$stmtUpdateStock->bind_param("i", $_SESSION['user_id']);
$stmtUpdateStock->execute();
$stmtUpdateStock->close();

// 2. Clear the cart
$sqlClearCart = "DELETE FROM cart WHERE user_id = ?";
$stmtClearCart = $sqliconn->prepare($sqlClearCart);
$stmtClearCart->bind_param("i", $_SESSION['user_id']);
$stmtClearCart->execute();
$stmtClearCart->close();
