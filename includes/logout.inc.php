<?php
require_once "securesession.inc.php";
require_once "databasis.inc.php";
// If the Remember Me cookie is set, delete the token from the database
if (isset($_COOKIE['rememberme'])) {
    $token = $_COOKIE['rememberme'];
    $stmt = $sqliconn->prepare("DELETE FROM tokenlogin WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();

    // Clear the Remember Me cookie
    setcookie('rememberme', '', time() - 3600, "/");
}
session_unset();
session_destroy();
header("Location: ../login.php");
die();
