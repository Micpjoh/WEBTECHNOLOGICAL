<?php
// this page handels the addition of products to the catalog

// add session and db connection
require_once "securesession.inc.php";
require_once "databasis.inc.php";
// db connectie is: $sqliconn

// Check if user is a admin
if (!isset($_SESSION['user_id']) || ($_SESSION['user_type'] !== "admin")) {
    header("Location: ../index.php");
    die();
}

// check if came from button
if (isset($_POST['submit'])) {
    // store given inputs through the post method of the button
    $productName = $_POST['product_name'];
    $productInfo = $_POST['product_info'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_POST['img'];
    $category = $_POST['category'];
    $categoryID = $_POST['categoryID'];

    //prep sql query
    $preparedstatement = $sqliconn->prepare( "INSERT INTO products (product_name, product_info, price, stock, img, category, category_id) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // fill the placeholders
    $preparedstatement->bind_param("ssdissi", $productName, $productInfo, $price, $stock, $image, $category, $categoryID);
    $preparedstatement->execute();
    $preparedstatement->close();
    header("Location: ../admin.php");
    die();
}
else {
    header("Location: ../admin.php");
    die();
}