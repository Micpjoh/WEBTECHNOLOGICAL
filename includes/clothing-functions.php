<?php
//db connection file
require_once "databasis.inc.php";


//function to get products of a certain category from db and display in html
function getProducts($category_id) {
    global $sqliconn;
    // only select products from the category in url and where the stock at least 1
    $sql = "SELECT * FROM products WHERE category_id = ? AND stock > 0";
    $secure = $sqliconn->prepare($sql);

    $secure->bind_param("i", $category_id);
    $secure->execute();

    $result = $secure->get_result();
     //get rows from db and load data into html for each row in product table
    while ($row = $result->fetch_assoc()) {
        $product_name = $row['product_name'];
        $product_img = $row['img'];
        $price = $row['price'];
        $product_id = $row['product_id'];
        $desc = $row['product_info'];

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

//function to get categories from db and display in html works similarly to getProducts()
//but selects everything from category table
function getCategories() {
    global $sqliconn;


    $sql = "SELECT * FROM category";
    $secure = $sqliconn->prepare($sql);
    $secure->execute();
    $result = $secure->get_result();

    if (!$result) {
        die('Error fetching categories: ' . $secure->error);
    }

    //display each category in html
    while ($row = $result->fetch_assoc()) {
        $cat_id = $row['category_id'];
        $category_img = $row['img'];
        $category_name = $row['category_name'];

        echo "
        <a style='text-decoration:none' class='cloth' href='clothing-template.php?cat=$cat_id'>
            <div class='img-here'>
                <img src='$category_img'>
            </div>
            <div class='name-container'>
                <h2 class='name'>$category_name</h2>
            </div>
        </a>";
    }
}


//function to get name of category that matches category_id passed on in url
function getname($cat_id) {
    global $sqliconn;

    //select the category name where the category matches 
    $sql = "SELECT category_name FROM category WHERE category_id = ?";
    $secure = $sqliconn->prepare($sql);

    //bind cat_id to ? in query to prevent sql injection
    $secure->bind_param("i", $cat_id);
    $secure->execute();

    $result = $secure->get_result();

    while ($row = $result->fetch_assoc()) {
        $category_name = $row['category_name'];

        echo "
            <h1>$category_name</h1>
            <h3>Shop all our amazing prints on our high quality $category_name</h3>
            ";
    };
};



