<?php
require_once "includes/databasis.inc.php";

function getProducts($category_id) {
    global $sqliconn;

    $sql = "SELECT * FROM products WHERE category_id = ? AND stock > 0";
    $secure = $sqliconn->prepare($sql);

    $secure->bind_param("i", $category_id);
    $secure->execute();

    $result = $secure->get_result();

    while ($row = $result->fetch_assoc()) {
        $product_name = $row['product_name'];
        $product_img = $row['img'];
        $price = $row['price'];
        $product_id = $row['product_id'];
        $desc = $row['product_info'];

        // display in html
        echo "
            <a style='text-decoration:none' class='item' href='product.php?product_id=$product_id'>
                <div class='imghere'>
                    <img src='$product_img'>
                </div>
                <div class='item-desc'>
                    <h3 class='name'>$product_name</h3>
                    <h3 class= 'desc'>$desc</h3>
                    <h3 class='price'>€$price</h3>
                </div>
            </a>";
    }
}

function getCategories() {
    global $sqliconn;

    // get rows from db
    $sql = "SELECT * FROM category";
    $secure = $sqliconn->prepare($sql);
    $secure->execute();
    $result = $secure->get_result();

    
    if (!$result) {
        die('Error fetching categories: ' . $secure->error);
    }

    //create empty array
    $categories = array();

    //loop to store category rows
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }

    return $categories;
}

function getname($cat_id) {
    global $sqliconn;

    $sql = "SELECT category_name FROM category WHERE category_id = ?";
    $secure = $sqliconn->prepare($sql);

    $secure->bind_param("i", $cat_id);
    $secure->execute();

    $result = $secure->get_result();

    while ($row = $result->fetch_assoc()) {
        $category_name = $row['category_name'];

        //display in html
        echo "
            <h1>$category_name</h1>
            <h3>Shop all our amazing prints on our high quality $category_name</h3>
            ";
    };
};



