<?php
require_once "databasis.inc.php";
require_once "checkvaliditylogin.inc.php";
if (isset($_POST["submit"])) {

    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $pw = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

    if(form_filledin($email, $pw)) {
        header("Location: ../login.php?error=fill-in-all-fields");
        die();
    }
    $rememberMe = isset($_POST['remember_me']) && $_POST['remember_me'] == 'on';
    log_validuser_in($sqliconn, $email, $pw, $rememberMe);

} 
else {
    header("Location: ../login.php");
    die();
}