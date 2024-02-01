<?php
require_once "includes/securesession.inc.php";
require_once "includes/databasis.inc.php";

if (isset($_POST['remove'])) {
    $productId = $_POST['product_id'];

    $preparedstatement = $sqliconn->prepare("DELETE FROM cart WHERE product_id = ? AND user_id = ?");

    $preparedstatement->bind_param("ii", $productId, $_SESSION['user_id']);
    $preparedstatement->execute();

    $preparedstatement->close();
    header("Location: cart.php");
    exit;

} 
else {
    header("Location: cart.php");
    exit;
}

