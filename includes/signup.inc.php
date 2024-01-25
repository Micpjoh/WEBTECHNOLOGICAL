<!-- signup.inc.php -->
<?php
require_once "securesession.inc.php";
require_once "databasis.inc.php";
require_once "checkvaliditysignup.inc.php";

if (isset($_POST["submit"])) {

    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $emailrepeat = htmlspecialchars($_POST["email-repeat"], ENT_QUOTES, 'UTF-8');
    $pw = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');
    $pwrepeat = htmlspecialchars($_POST["password-repeat"], ENT_QUOTES, 'UTF-8');
    $username = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
    $consent = $_POST["consent"];
<<<<<<< HEAD
    $user_type = "admin";
=======
    $user_type = "user";
>>>>>>> 8edf521 (first)

    // Belangrijke error messages in url, kan later $_GET gebruiken
    // Voor signup ook javascript validation, denk aan naam met 2+ letters
    // login hoeft geen javascript
    if(form_filledin($username, $email, $emailrepeat, $pw, $pwrepeat, $consent)) {
        header("Location: ../signup.php?error=fill-in-all-fields");
        die();
    }

    if(validity_name($username)) {
        header("Location: ../signup.php?error=names-contain-only-letters-and-numbers");
        die();
    }

    if (existing_username($username, $sqliconn)) {
        header("Location: ../signup.php?error=username-already-in-use");
        die();
    }

    if(validity_email($email)) {
        header("Location: ../signup.php?error=invalidemail");
        die();
    }

    if(check_mails_matching($email, $emailrepeat)) {
        header("Location: ../signup.php?error=emails-dont-match");
        die();
    }

    if (existing_email($email, $sqliconn)) {
        header("Location: ../signup.php?error=email-already-in-use");
        die();
    }

    if (check_pw_matching($pw, $pwrepeat)) {
        header("Location: ../signup.php?error=pw-dont-match");
        die();
    }
    if (length_name($username)) {
        header("Location: ../signup.php?error=name-has-to-be-longer-than-2-char");
        die();
    }

    user_creation($username, $email, $pw, $user_type, $sqliconn);
    header("Location: ../login.php");
    $sqliconn = null;
    die();
}
else {
    header("Location: ../signup.php");
    die();
}