<?php
// dit page regelt het toevoegen van producten aan de database (Catalog) via de admin profilepage

// voeg sessie en database connectie
require_once "securesession.inc.php";
require_once "databasis.inc.php";
// db connectie is: $sqliconn

//check of user admin is, anders geen toegang
if (!isset($_SESSION['user_id']) || ($_SESSION['user_type'] !== "admin")) {
    header("Location: ../home.php");
    die();
}

//check voor de product_id in URL van product dat verwijderd wordt
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $preparedstatement = $sqliconn->prepare("DELETE FROM products WHERE product_id = ?");

    //voeg product_id toe op de placeholder Values (integer)
    $preparedstatement->bind_param("i", $product_id);

    //execute statement en lose it
    $preparedstatement->execute();
    $preparedstatement->close();

    header("Location: ../admin.php"); 
    die();
}
