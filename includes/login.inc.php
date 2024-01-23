<?php

if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $pw = $_POST["password"];

    require_once "databasis.inc.php";
    require_once "checkvaliditylogin.inc.php";

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