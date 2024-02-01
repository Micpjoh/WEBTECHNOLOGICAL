<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection file and session management file
require_once "includes/databasis.inc.php";
require_once "includes/securesession.inc.php";

if (isset($_POST["submit"])) {
    $productID = $_POST["product_id"];
    $qty = $_POST["quantity"];
    $user_id = $_SESSION["user_id"];
    // Check if the variables are not empty
    if (!empty($productID) && !empty($qty) && !empty($user_id)) {
        // SQL to insert data into the cart table
        $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt = $sqliconn->prepare($sql);

        if ($stmt === false) {
            die("Error preparing the statement: " . $sqliconn->error);
        }

        // Bind parameters
        $stmt->bind_param("iii", $user_id, $productID, $qty);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Product added to cart successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Required fields are missing.";
    }
} else {
    echo "Form not submitted correctly.";
}

// Close your database connection
$sqliconn->close();
