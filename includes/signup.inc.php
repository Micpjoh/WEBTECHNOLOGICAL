<!-- signup.inc.php -->
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// add session an db connection
session_start();
require_once "databasis.inc.php";
require_once "checkvaliditysignup.inc.php";

// Check if user came here through the url
if (isset($_POST["submit"])) {

    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $emailrepeat = htmlspecialchars($_POST["email-repeat"], ENT_QUOTES, 'UTF-8');
    $pw = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');
    $pwrepeat = htmlspecialchars($_POST["password-repeat"], ENT_QUOTES, 'UTF-8');
    $username = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
    $consent = $_POST["consent"];
    $user_type = "user";

    // If form is not filled in correctly add the errors to $errordisplay

    // $errorrememberform checks if input should be kept or not depening if it causes a error 
    // this is to enhance user experience, so users dont have to refill all the inputs
    $errordisplay =  [];
    $errorrememberform = [];

    if(form_filledin($username, $email, $emailrepeat, $pw, $pwrepeat, $consent)) {
        $errordisplay["form_empty"] = "Fill up all empty fields pls.";

    }
    if(validity_name($username)) {
        $errordisplay["invalid_usn"] = "Username is invalid<br> Names exist only of letters and numbers";
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
    if (length_pw($pw)) {
        $errordisplay["length_pw"] = "Password should be 5 characters or more";
    }

    if (digit_pw($pw)) {
        $errordisplay["digit_pw"] = "Password should have atleast 1 digit";
    }

    if (uppercase_pw($pw)) {
        $errordisplay["uppercase_pw"] = "Password should have atleast 1 uppercase character";
    }
    
    if (lowercase_pw($pw)) {
        $errordisplay["lowercas_pw"] = "Password should have atleast 1 lowercase character";
    }
    
    // als input correct is zonder enige errors, creeer user
    if (!$errordisplay) {
        user_creation($username, $email, $pw, $user_type, $sqliconn);

        header("Location: ../login.php");
        die();

    }
    // als input fout is, stuur terug naar signup.php
    else {
        // gebruikt in signup.php om errors te displayen
        $_SESSION["errors"] = $errordisplay;

        // gebruikt in signup.php om te beslissen of input van user moet worden behouden of niet.
        $_SESSION["errors_rememberform"] = $errorrememberform;
        $_SESSION["inputsform"] = ["usn" => $username, 
            "email" => $email, 
            "emailr" => $emailrepeat];

        header("Location: ../signup.php?error=signup-failed");
    }
}
else {
    header("Location: ../signup.php");
    die();
}
