<?php
require_once "securesession.inc.php";
require_once "databasis.inc.php";
// verwijder eerst rememberme cookie
if (isset($_COOKIE['rememberme'])) {
    $token = $_COOKIE['rememberme'];
    $stmt = $sqliconn->prepare("DELETE FROM tokenlogin WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    setcookie('rememberme', '', time() - 3600, "/");
}
session_unset();
session_destroy();
header("Location: ../login.php");
die();
