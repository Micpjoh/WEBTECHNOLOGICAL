<?php
require_once "databasis.inc.php";

// neem info van order uit database. Dit is nog niet in een associative array.
function get_order($user_id, $sqliconn) {
    $preparedstatement = $sqliconn->prepare("SELECT order_code, order_created, order_arrival FROM orders WHERE user_id = ? ORDER BY order_created DESC");
    $preparedstatement->bind_param("i", $user_id);
    $preparedstatement->execute();
    $result = $preparedstatement->get_result();
    $preparedstatement->close();

    return $result;
}
