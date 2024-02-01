<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "databasis.inc.php";
require_once "securesession.inc.php";

// Check if user sumbitted form
if (isset($_POST["submit"])) {
    // Get all data
    $productID = $_POST["product_id"];
    $qty = $_POST["quantity"];
    $user_id = $_SESSION["user_id"];
    
    // check if all 3 have a value
    if (!empty($productID) && !empty($qty) && !empty($user_id)) {
        // prep sql query, check if product already in cart
        $preparedstatement = $sqliconn->prepare( "SELECT quantity FROM cart WHERE user_id = ? AND product_id = ?");
        //bind params to placeholder
        $preparedstatement->bind_param("ii", $user_id, $productID);
        $preparedstatement->execute();
        $result = $preparedstatement->get_result();
        $preparedstatement->close();

        if ($result->num_rows > 0) {
            // if in item already in cart, add quantities together
            $row = $result->fetch_assoc();
            $new_quantity = $row['quantity'] + $qty;
            // prep sql query to update the quantitiy
            $preparedstatement = $sqliconn->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?");
            $preparedstatement->bind_param("iii", $new_quantity, $user_id, $productID);
            // if updated, return JSON success message
            if ($preparedstatement->execute()) {
                echo json_encode(array("success" => true, "message" => "Quantity updated in cart."));

            } 
            // if update fails, return error message
            else {
                echo json_encode(array("success" => false, "message" => "Error updating quantity: " . $preparedstatement->error));
            }
            $preparedstatement->close();
        } 
        else {
            // if item wasnt already in cart, prep sql query and insert product
            $preparedstatement = $sqliconn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
            $preparedstatement->bind_param("iii", $user_id, $productID, $qty);
            // if insterted return succes message
            if ($preparedstatement->execute()) {
                echo json_encode(array("success" => true, "message" => "Item added to cart."));
            } 
            // if not inserted return error message
            else {
                echo json_encode(array("success" => false, "message" => "Error: " . $preparedstatement->error));
            }
            $preparedstatement->close();
        }
    }
}
$sqliconn->close();

