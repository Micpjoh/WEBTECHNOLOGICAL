<?php
session_start();
require_once "databasis.inc.php";
require_once "checkvaliditylogin.inc.php";

if (isset($_POST["submit"])) {

    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $pw = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

    $errors = [];
    if(form_filledin($email, $pw)) {
        $errors["form_empty"] = "Fill up all empty fields pls.";
    }

    if(!$errors) {
        $rememberMe = isset($_POST['remember_me']) && $_POST['remember_me'] == 'on';
        log_validuser_in($sqliconn, $email, $pw, $rememberMe);
    }
    else {
        $_SESSION["errors"] = $errors;
        header("Location: ../login.php?error=login-failed");
    }

} 
else {
    header("Location: ../login.php");
    die();
}