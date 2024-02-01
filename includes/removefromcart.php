<?php
require_once "securesession.inc.php";
require_once "databasis.inc.php";

// Check if the user came from remove button
if (isset($_POST['remove'])) {
    // Get productID
    $productId = $_POST['product_id'];

    // prep sql query, to delete item from cart, by searching for the user_id and product_id
    // This way only the product_id of the user that pressed the remove button.
    $preparedstatement = $sqliconn->prepare("DELETE FROM cart WHERE product_id = ? AND user_id = ?");

    $preparedstatement->bind_param("ii", $productId, $_SESSION['user_id']);
    $preparedstatement->execute();
    $preparedstatement->close();
    header("Location: ../cart.php");
    exit;

} 
else {
    header("Location: ../cart.php");
    exit;
}

