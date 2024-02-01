<?php
require_once "includes/databasis.inc.php";
require_once "includes/securesession.inc.php";

if (isset($_POST["submit"])) {
    $productID = $_POST["product_id"];
    $qty = $_POST["quantity"];
    $user_id = $_SESSION["user_id"];
    
    if (!empty($productID) && !empty($qty) && !empty($user_id)) {
        $preparedstatement = $sqliconn->prepare( "SELECT quantity FROM cart WHERE user_id = ? AND product_id = ?");
        $preparedstatement->bind_param("ii", $user_id, $productID);
        $preparedstatement->execute();
        $result = $preparedstatement->get_result();
        $preparedstatement->close();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $new_quantity = $row['quantity'] + $qty;

            $preparedstatement = $sqliconn->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?");
            $preparedstatement->bind_param("iii", $new_quantity, $user_id, $productID);
            if ($preparedstatement->execute()) {
                echo json_encode(array("success" => true, "message" => "Quantity updated in cart."));
            } else {
                echo json_encode(array("success" => false, "message" => "Error updating quantity: " . $preparedstatement->error));
            }
            $preparedstatement->close();
        } 
        else {
            $preparedstatement = $sqliconn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
            $preparedstatement->bind_param("iii", $user_id, $productID, $qty);
            if ($preparedstatement->execute()) {
                echo json_encode(array("success" => true, "message" => "Item added to cart."));
            } else {
                echo json_encode(array("success" => false, "message" => "Error: " . $preparedstatement->error));
            }
            $preparedstatement->close();
        }
    }
}
$sqliconn->close();

