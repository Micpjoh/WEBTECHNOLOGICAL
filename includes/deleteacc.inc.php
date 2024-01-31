<?php
session_start();
require_once "databasis.inc.php";

// check of user via button is gekomen niet URL.
if (isset($_POST['submit'])) {
    //verwijder rememberme cookie voor zekerheid, zo geen data van user in database.
    //gemaakte "orders/bestellingen" van user blijven wel.
    if (isset($_COOKIE['rememberme'])) {
        $token = $_COOKIE['rememberme'];
        $preparedstatement = $sqliconn->prepare("DELETE FROM tokenlogin WHERE token = ?");
        $preparedstatement->bind_param("s", $token);
        $preparedstatement->execute();
        setcookie('rememberme', '', time() - 3600, "/");
    }

    $userId = $_SESSION['user_id'];
    $preparedstatement = $sqliconn->prepare("UPDATE orders SET user_id = NULL WHERE user_id = ?");
    $preparedstatement->bind_param("i", $userId);
    $preparedstatement->execute();
    
    // delete userdata van database en log uit
    $preparedstatement = $sqliconn->prepare("DELETE FROM users WHERE user_id = ?");
    $preparedstatement->bind_param("i", $_SESSION['user_id']);
    $preparedstatement->execute();
    
    session_unset();
    session_destroy();
    header("Location: ../login.php");
    die();
} 
else {
    header("Location: ../index.php");
    die();
}