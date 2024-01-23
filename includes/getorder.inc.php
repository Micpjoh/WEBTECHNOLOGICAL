<?php
require_once "databasis.inc.php";

function get_order($user_id, $sqliconn) {
    $query = "SELECT order_id, order_created, order_arrival FROM orders WHERE user_id = ? ORDER BY order_created DESC";
    $stmt = $sqliconn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    return $result;
}
