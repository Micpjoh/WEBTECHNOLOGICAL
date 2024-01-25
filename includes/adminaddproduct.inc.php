<?php
// dit page regelt het verwijderen van producten uit de database (Catalog) via de admin profilepage

// voeg sessie en database connectie
require_once "securesession.inc.php";
require_once "databasis.inc.php";
// db connectie is: $sqliconn

//check of user admin is, anders geen toegang
if (!isset($_SESSION['user_id']) || ($_SESSION['user_type'] !== "admin")) {
    header("Location: ../home.php");
    die();
}

//check of admin gekomen is via submit button, anders terug naar admin.php
if (isset($_POST['submit'])) {
    //variables klaarleggen, uit URL. form -> method="POST"
    $productName = $_POST['product_name'];
    $productInfo = $_POST['product_info'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_POST['img'];
    $category = $_POST['category'];

    //prep sql query
    $preparedstatement = $sqliconn->prepare( "INSERT INTO products (product_name, product_info, price, stock, img, category) VALUES (?, ?, ?, ?, ?, ?)");

    //voeg variablen toe op de placeholder Values
    $preparedstatement->bind_param("ssdiss", $productName, $productInfo, $price, $stock, $image, $category);

    //execute statement en lose it
    $preparedstatement->execute();
    $preparedstatement->close();
    header("Location: ../admin.php");
    die();
}
else {
    // voor als niet via sumbit button gekomen naar dit page
    header("Location: ../admin.php");
    die();
}