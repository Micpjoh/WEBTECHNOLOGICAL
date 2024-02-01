<?php
// Include database connection
require_once "databasis.inc.php";
require_once "securesession.inc.php";
require_once "orderfunctions.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    die();
}

if(isset($_POST['imageUrl']) && isset($_POST['clothing'])) {
    $p_name = "Custom " . $_POST['clothing'];
    $p_info = "made by " . $_SESSION["user_name"];
    $p_price = 29.99;
    $p_stock = 30;
    $image_url = $_POST['imageUrl'];
    $selected_clothing = $_POST['clothing'];
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

    $preparedstatement = $sqliconn->prepare("INSERT INTO products (product_name, product_info, price, stock, img, category, category_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $preparedstatement->bind_param("ssdissi", $p_name, $p_info, $p_price, $p_stock, $image_url, $selected_clothing, $cat_id);
    $preparedstatement->execute();
    create_order($_SESSION['user_id'], $sqliconn);

    echo "<script>alert('Thank you for shopping at Greenwear, your created item has also successfully been added to our catalog!');         
    window.location.href = '../catalog.php';</script>";
    die();
    }
    else {
        create_order($_SESSION['user_id'], $sqliconn);

        echo "<script>alert('Thank you for shopping at Greenwear!');         
        window.location.href = '../catalog.php';</script>";
        die();
    }

$preparedstatement->close();
$sqliconn->close();