<?php
session_start();
require_once "databasis.inc.php";

// verwijder eerst rememberme cookie
if (isset($_COOKIE['rememberme'])) {
    $token = $_COOKIE['rememberme'];
    $preparedstatement = $sqliconn->prepare("DELETE FROM tokenlogin WHERE token = ?");
    $preparedstatement->bind_param("s", $token);
    $preparedstatement->execute();
    setcookie('rememberme', '', time() - 3600, "/");
}
// log user uit
session_unset();
session_destroy();
header("Location: ../login.php");
die();
