<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require_once "databasis.inc.php";

// If user logs out remove his cookies.
if (isset($_COOKIE['rememberme'])) {
    $token = $_COOKIE['rememberme'];
    $preparedstatement = $sqliconn->prepare("DELETE FROM tokenlogin WHERE token = ?");
    $preparedstatement->bind_param("s", $token);
    $preparedstatement->execute();
    setcookie('rememberme', '', time() - 3600, "/");
}
// log user out
session_unset();
session_destroy();
header("Location: ../login.php");
die();
