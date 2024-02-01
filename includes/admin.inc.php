<?php
// This page just does some counting of statistics of the database

// Count amount of accounts made
function user_amount($sqliconn) {
    $count = $sqliconn->query("SELECT COUNT(user_id) FROM users");
    if($count) {
        //COUNT heeft maar 1 row, en dat is de aantal
        $amount = $count->fetch_row();
        return $amount[0];
    }
}

// Count amount of products in catalog
function product_amount($sqliconn) {
    $count = $sqliconn->query("SELECT COUNT(product_id) FROM products");
    if($count) {
        //COUNT heeft maar 1 row, en dat is de aantal
        $amount = $count->fetch_row();
        return $amount[0];
    }
}

// Count amount of orders made
function order_amount($sqliconn) {
    $count = $sqliconn->query("SELECT COUNT(order_id) FROM orders");
    if($count) {
        //COUNT heeft maar 1 row, en dat is de aantal
        $amount = $count->fetch_row();
        return $amount[0];
    }
}

