<?php
// Include database connection
require_once "databasis.inc.php";
require_once "securesession.inc.php";
require_once "orderfunctions.php";

// redirect user back to homepage if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    die();
}
// Check if both the image url and clothing data are posted/received and processed by the computer
if(isset($_POST['imageUrl']) && isset($_POST['clothing'])) {
    $p_name = "Custom " . $_POST['clothing'];
    $p_info = "made by " . $_SESSION["user_name"]; //we can tell which user made what item
    $p_price = 29.99; //our fixed price for all custom pieces
    $p_stock = 30;
    $image_url = $_POST['imageUrl'];
    $selected_clothing = $_POST['clothing'];

    // Our ID based on the clothing type
    if ($selected_clothing == "Shirt") {
        $cat_id = 2;
    }
    if ($selected_clothing == "Hoodie") {
        $cat_id = 1;
    }
    if ($selected_clothing == "Pants") {
        $cat_id = 3;
    }
    if ($selected_clothing == "Beanie") {
        $cat_id = 4;
    }
    
    // Prepare and execute MYSQL to load/insert the new product and its data into the database
    $preparedstatement = $sqliconn->prepare("INSERT INTO products (product_name, product_info, price, stock, img, category, category_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $preparedstatement->bind_param("ssdissi", $p_name, $p_info, $p_price, $p_stock, $image_url, $selected_clothing, $cat_id);
    $preparedstatement->execute();

    // create an ordder for the user
    create_order($_SESSION['user_id'], $sqliconn);
    
    // alert the user and add to catalog page
    echo "<script>alert('Thank you for shopping at Greenwear, your created item has also successfully been added to our catalog!');         
    window.location.href = '../catalog.php';</script>";
    die();
    }
    else {
        //creates an order without adding a new product to catalog
        create_order($_SESSION['user_id'], $sqliconn);

        //allert user and redirect to catalog page
        echo "<script>alert('Thank you for shopping at Greenwear!');         
        window.location.href = '../catalog.php';</script>";
        die();
    }
//close the prepared statement and database connection
$preparedstatement->close();
$sqliconn->close();
