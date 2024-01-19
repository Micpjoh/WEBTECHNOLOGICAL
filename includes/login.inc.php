<?php

if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $pw = $_POST["password"];

    require_once "databasis.inc.php";
    require_once "checkvaliditylogin.inc.php";

    if(form_filledin($email, $pw)) {
        header("Location: ../login.php?error=fill-in-all-fields");
        exit();
    }

    log_validuser_in($sqliconn, $email, $pw);

} 
else {
    header("Location: ../login.php");
    exit();
}