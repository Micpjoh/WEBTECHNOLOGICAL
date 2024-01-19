<!-- signup.inc.php -->
<?php
require_once "securesession.inc.php";

if (isset($_POST["submit"])) {

    $username = $_POST["name"];
    $email = $_POST["email"];
    $emailrepeat = $_POST["email-repeat"];
    $pw = $_POST["password"];
    $pwrepeat = $_POST["password-repeat"];
    $consent = $_POST["consent"];

    require_once "databasis.inc.php";
    require_once "checkvaliditysignup.inc.php";

    // Belangrijke error messages in url, kan later $_GET gebruiken
    // Voor signup ook javascript validation, denk aan naam met 2+ letters
    // login hoeft geen javascript
    if(form_filledin($username, $email, $emailrepeat, $pw, $pwrepeat, $consent)) {
        header("Location: ../signup.php?error=fill-in-all-fields");
        exit();
    }

    if(validity_name($username)) {
        header("Location: ../signup.php?error=names-contain-only-letters-and-numbers");
        exit();
    }

    if (existing_username($username, $sqliconn)) {
        header("Location: ../signup.php?error=username-already-in-use");
        exit();
    }

    if(validity_email($email)) {
        header("Location: ../signup.php?error=invalidemail");
        exit();
    }

    if(check_mails_matching($email, $emailrepeat)) {
        header("Location: ../signup.php?error=emails-dont-match");
        exit();
    }

    if (existing_email($email, $sqliconn)) {
        header("Location: ../signup.php?error=email-already-in-use");
        exit();
    }

    if (check_pw_matching($pw, $pwrepeat)) {
        header("Location: ../signup.php?error=pw-dont-match");
        exit();
    }

    user_creation($username, $email, $pw, $sqliconn);
    header("Location: ../faq.php");
    $sqliconn = null;
    die();
}
else {
    header("Location: ../signup.php");
    exit();
}