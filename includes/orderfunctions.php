<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Take order info out of database, will be set in associatve array in profile.php
function get_order($user_id, $sqliconn) {
    $preparedstatement = $sqliconn->prepare("SELECT order_code, order_created, order_arrival FROM orders WHERE user_id = ? ORDER BY order_created DESC");
    $preparedstatement->bind_param("i", $user_id);
    $preparedstatement->execute();
    $result = $preparedstatement->get_result();
    $preparedstatement->close();

    return $result;
}

// Create order, if user buys a clothing piece, or design one himself and buys that one
function create_order($user_id, $sqliconn) {
    // create a random code
    $order_code = bin2hex(random_bytes(4));
    $order_created = time();
    $order_arrival = $order_created + 604800;

    // format the time in a date format
    $date_createdformat = date('Y-m-d H:i:s', $order_created);
    $date_arrivalformat = date('Y-m-d H:i:s', $order_arrival);

    // add the orders in the database using prepared statements
    $preparedstatement = $sqliconn->prepare("INSERT INTO orders (order_code, user_id, order_created, order_arrival) VALUES (?, ?, ?, ?)");
    $preparedstatement->bind_param("siss", $order_code, $user_id, $date_createdformat, $date_arrivalformat);
    $preparedstatement->execute();
    $preparedstatement->close();
}