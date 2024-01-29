<?php
session_start();

require_once "databasis.inc.php";
require_once "checkvaliditylogin.inc.php";

// Check of user niet via URL is gekomen
if (isset($_POST["submit"])) {

    // Gegeven inputs / sanitized
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $pw = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

    if(form_filledin($email, $pw)) {
        header("Location: ../login.php?error=fill-in-all-fields");
        die();
    }

    // Als user remember me heeft aangeklikt onthoud het en maak in functie "log_validuser_in" cookies aan
    $rememberMe = isset($_POST['remember_me']);
    log_validuser_in($sqliconn, $email, $pw, $rememberMe);

} 
else {
    header("Location: ../login.php");
    die();
}