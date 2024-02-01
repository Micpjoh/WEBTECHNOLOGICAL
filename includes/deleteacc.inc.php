<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require_once "databasis.inc.php";

// Check if user has came through submit button and not URL
if (isset($_POST['submit'])) {
    //remove user cookies
    $preparedstatement = $sqliconn->prepare("DELETE FROM tokenlogin WHERE user_id = ?");
    $preparedstatement->bind_param("s", $_SESSION['user_id']);
    $preparedstatement->execute();

    // Set user_id in orders to NULL else there will be a foreign key error when deleting user
    // Update user_id to NULL
    $preparedstatement = $sqliconn->prepare("UPDATE orders SET user_id = NULL WHERE user_id = ?");
    $preparedstatement->bind_param("i", $_SESSION['user_id']);
    $preparedstatement->execute();
    
    // Delete the users account
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