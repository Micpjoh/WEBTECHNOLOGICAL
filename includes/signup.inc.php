<!-- signup.inc.php -->
<?php
require_once "securesession.inc.php";
require_once "databasis.inc.php";
require_once "checkvaliditysignup.inc.php";

// Check of user niet via URL is gekomen
if (isset($_POST["submit"])) {

    // Sanitize input
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $emailrepeat = htmlspecialchars($_POST["email-repeat"], ENT_QUOTES, 'UTF-8');
    $pw = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');
    $pwrepeat = htmlspecialchars($_POST["password-repeat"], ENT_QUOTES, 'UTF-8');
    $username = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
    $consent = $_POST["consent"];
    $user_type = "user";

    // Als form niet succesvol is ingevuld, voeg de errors toe aan $errordisplay array.

    // $errorrememberform wordt gebruikt om input die correct is te onthouden, dit is
    // om user experience te verbeteren.
    $errordisplay =  [];
    $errorrememberform = [];

    if(form_filledin($username, $email, $emailrepeat, $pw, $pwrepeat, $consent)) {
        $errordisplay["form_empty"] = "Fill up all empty fields pls.";

    }
    if(validity_name($username)) {
        $errordisplay["invalid_usn"] = "Username is invalid";
        $errorrememberform["usn"] = "";

    }
    if (existing_username($username, $sqliconn)) {
        $errordisplay["existing_usn"] = "Username is already inuse.";
        $errorrememberform["usn"] = "";

    }
    if (length_name($username)) {
        $errordisplay["length_usn"] = "Name has to have 2 or more characters.";
        $errorrememberform["usn"] = "";

    }
    if(validity_email($email)) {
        $errordisplay["invalid_email"] = "Email is invalid";
        $errorrememberform["email"] = "";

    }
    if(check_mails_matching($email, $emailrepeat)) {
        $errordisplay["notmatch_email"] = "Emails dont match.";
        $errorrememberform["email"] = "";

    }
    if (existing_email($email, $sqliconn)) {
        $errordisplay["existing_email"] = "Emails already exist.";
        $errorrememberform["email"] = "";

    }
    if (check_pw_matching($pw, $pwrepeat)) {
        $errordisplay["notmatch_pw"] = "Passwords dont match.";

    }
    // als input correct is, creer user
    if (!$errordisplay) {
        unset($_SESSION["inputsform"]);
        user_creation($username, $email, $pw, $user_type, $sqliconn);

        header("Location: ../login.php");
        $sqliconn = null;
        die();

    }
    // als input fout is, stuur terug naar signup.php
    else {
        $_SESSION["errors"] = $errordisplay;

        // gebruikt in signup.php om input te onthouden dat correct is
        $_SESSION["errors_rememberform"] = $errorrememberform;
        $_SESSION["inputsform"] = [ "usn" => $username, "email" => $email, "emailr" => $emailrepeat];

        header("Location: ../signup.php?error=signup-failed");

    }
}
else {
    header("Location: ../signup.php");
    die();
    
}