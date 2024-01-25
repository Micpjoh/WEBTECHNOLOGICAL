<?php
require_once "securesession.inc.php";
require_once "databasis.inc.php";

if (isset($_POST['submit'])) {
    //verwijder rememberme cookie voor zekerheid, zo geen data van user in database
    //gemaakte "orders/bestellingen" van user blijven wel, die zijn van de bedrijf zelf.
    if (isset($_COOKIE['rememberme'])) {
        $token = $_COOKIE['rememberme'];
        $preparedstatement = $sqliconn->prepare("DELETE FROM tokenlogin WHERE token = ?");
        $preparedstatement->bind_param("s", $token);
        $preparedstatement->execute();
        setcookie('rememberme', '', time() - 3600, "/");
    }

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