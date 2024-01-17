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

    if (input_filledin($username, $email, $emailrepeat, $pw, $pwrepeat) !== false) {
        header("Location: ../signup.php?error=emptyfields");
        exit();
    }
    if (validity_name($username) !== false) {
        header("Location: ../signup.php?error=invalidname");
        exit();
    }

    if (is_name_taken($username, $conn) !== false) {
        header("Location: ../signup.php?error=nametaken");
        exit();
    }

   if (validity_email($email) !== false) {
        header("Location: ../signup.php?error=invalidemail");
        exit();
    }

    if (is_email_taken($email, $conn) !== false) {
        header("Location: ../signup.php?error=emailtaken");
        exit();
    }

    if (matching_emails($email, $emailrepeat) !== false) {
        header("Location: ../signup.php?error=emaildontmatch");
        exit();
    }

    if (matching_pw($pw, $pwrepeat) !== false) {
        header("Location: ../signup.php?error=pwdontmatch");
        exit();
    }

    createUser($conn,$name,$email,$username,$pw);

}
else {
    header("Location: ../signup.php");
    exit();
}