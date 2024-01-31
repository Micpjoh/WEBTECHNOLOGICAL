<?php
// neem info van order uit database. Dit is nog niet in een associative array.
function get_order($user_id, $sqliconn) {
    $preparedstatement = $sqliconn->prepare("SELECT order_code, order_created, order_arrival FROM orders WHERE user_id = ? ORDER BY order_created DESC");
    $preparedstatement->bind_param("i", $user_id);
    $preparedstatement->execute();
    $result = $preparedstatement->get_result();
    $preparedstatement->close();

    return $result;
}


function create_order($user_id, $sqliconn) {
    $order_code = bin2hex(random_bytes(4));
    $order_created = time();
    $order_arrival = $order_created + 604800;

    $order_created_formatted = date('Y-m-d H:i:s', $order_created);
    $order_arrival_formatted = date('Y-m-d H:i:s', $order_arrival);

    $preparedstatement = $sqliconn->prepare("INSERT INTO orders (order_code, user_id, order_created, order_arrival) VALUES (?, ?, ?, ?)");
    $preparedstatement->bind_param("siss", $order_code, $user_id, $order_created_formatted, $order_arrival_formatted);
    $preparedstatement->execute();
    $preparedstatement->close();
}