<?php
// dit page regelt het counten van producten in de database (Catalog) via de admin profilepage
// db connectie is: $sqliconn

function user_amount($sqliconn) {
    $count = $sqliconn->query("SELECT COUNT(user_id) FROM users");
    if($count) {
        //COUNT heeft maar 1 row, en dat is de aantal
        $amount = $count->fetch_row();
        return $amount[0];
    }
    else {
        return "No users found!";
    }
}

function product_amount($sqliconn) {
    $count = $sqliconn->query("SELECT COUNT(product_id) FROM products");
    if($count) {
        //COUNT heeft maar 1 row, en dat is de aantal
        $amount = $count->fetch_row();
        return $amount[0];
    }
    else {
        return "No users found!";
    }
}

function order_amount($sqliconn) {
    $count = $sqliconn->query("SELECT COUNT(order_id) FROM orders");
    if($count) {
        //COUNT heeft maar 1 row, en dat is de aantal
        $amount = $count->fetch_row();
        return $amount[0];
    }
    else {
        return "No users found!";
    }
}

