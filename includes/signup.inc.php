<!-- signup.inc.php -->
<?php
// checkt of gebruiker via de submit button komt, en niet de url
// kijken of de REQUEST_METHOD post is
if (isset($_POST["submit"])) {

    $username = $_POST["name"];
    $email = $_POST["email"];
    $emailrepeat = $_POST["email-repeat"];
    $pw = $_POST["password"];
    $pwrepeat = $_POST["password-repeat"];

    require_once "databasis.inc.php";
    require_once "checkvaliditysignup.inc.php";

}


else {
    header("Location: ../signup.php");
    exit();
}