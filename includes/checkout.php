<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// checkout.php
require_once "databasis.inc.php";
require_once "securesession.inc.php";
require_once "orderfunctions.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or show an error
    exit('You must be logged in to checkout.');
}

// Check if the cart is empty, if so dont allow user to spam checkout and orders
// prep query to count the amount of rows in the cart table
// Check the amount of rows, for the user which submitted the checkout button
$preparedstatement = $sqliconn->prepare("SELECT COUNT(*) AS items FROM cart WHERE user_id = ?");
$preparedstatement->bind_param("i", $_SESSION['user_id']);
$preparedstatement->execute();
$result = $preparedstatement->get_result();
$row = $result->fetch_assoc();

// if user has no items in cart, alert user about the error
// send user back to cart.php
if ($row['items'] == 0) {
    echo '<script>
            alert("Your cant check out a empty cart.");
            window.location.href = "../cart.php";
          </script>';
    $preparedstatement->close();
    exit();
}

// check if user came through submit button
if (isset($_POST['submit'])) {
    // update products stock take out quantity of cart with product stock
    $sqlquery = "UPDATE products 
                INNER JOIN cart ON products.product_id = cart.product_id 
                SET products.stock = products.stock - cart.quantity
                WHERE cart.user_id = ?";


    $preparedstatement = $sqliconn->prepare($sqlquery);
    $preparedstatement->bind_param("i", $_SESSION['user_id']);
    $preparedstatement->execute();
    $preparedstatement->close();

    // clear cart of user, prep sql query to delete all items correlated to user_id of user
    $preparedstatement = $sqliconn->prepare("DELETE FROM cart WHERE user_id = ?");
    $preparedstatement->bind_param("i", $_SESSION['user_id']);
    $preparedstatement->execute();
    $preparedstatement->close();
    // create order for user
    create_order($_SESSION['user_id'], $sqliconn);

    // add succes message to show checkout request went through
    echo '<script>
            alert("Thank you for shopping at greenwear.");
            window.location.href = "../index.php";
          </script>';
    die();
}
?>
