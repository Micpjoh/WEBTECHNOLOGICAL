<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "databasis.inc.php";
require_once "checkvaliditylogin.inc.php";

// Check whether user came from the button, if not send user back to login page
if (isset($_POST["submit"])) {

    // given inputs
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $pw = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

    // check if forms are filled in
    if(form_filledin($email, $pw)) {
        header("Location: ../login.php?error=fill-in-all-fields");
        die();
    }

    // If user has clicked remember me, save it and create the cookies through the function log_validuser_in
    // We also check if the credentials are true using the log_validuser_in, if not return error explaining the problem.
    // if correct info log user in
    $rememberMe = isset($_POST['remember_me']);
    log_validuser_in($sqliconn, $email, $pw, $rememberMe);

} 
else {
    header("Location: ../login.php");
    die();
}