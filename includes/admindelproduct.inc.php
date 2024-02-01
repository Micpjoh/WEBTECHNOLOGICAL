<?php
// This page handels the deletion of products through admin page

// add session an db connection
require_once "securesession.inc.php";
require_once "databasis.inc.php";
// db connectie is: $sqliconn

//check if user is a admin, else sent him back to homepage
if (!isset($_SESSION['user_id']) || ($_SESSION['user_type'] !== "admin")) {
    header("Location: ../index.php");
    die();
}

// check for the product_id in URL of the product that is getting deleted, came through the delete link
// which adds the id in the URL. (Maybe make it a button?)
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $preparedstatement = $sqliconn->prepare("DELETE FROM products WHERE product_id = ?");
    $preparedstatement->bind_param("i", $product_id);
    $preparedstatement->execute();
    $preparedstatement->close();
    
    header("Location: ../admin.php"); 
    die();
}
