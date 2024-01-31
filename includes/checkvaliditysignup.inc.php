<?php
// in dit geval betekent return false, dat het correct is. Zo wordt in signup.inc.php, de errors niet toegevoegd aan de array,
// als het false is.

// Check of alle fields zijn ingevuld.
function form_filledin($username, $email, $emailrepeat, $pw, $pwrepeat, $consent) {
    if (!empty($username) && !empty($email) && !empty($emailrepeat) 
    && !empty($pw) && !empty($pwrepeat) && !empty($consent)) {
        return false;

    }
    else {
        return true;

    }
}

// Check of "gebruikersnaam" alleen letters/nummers bevat
function validity_name($username) {
    if (preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        return false;

    }
    else {
        return true;

    }
}

// Check of "gebruikersnaam" length groter/gelijk is aan 2
function length_name($username) {
    if (strlen($username) >= 2) {
        return false;

    }
    else {
        return true;

    }
}

// Check of "email" valid is
function validity_email($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;

    }
    else {
        return true;

    }
}

// Check of "email" gelijk is aan "confirm email"
function check_mails_matching($email, $emailrepeat) {
    if ($email === $emailrepeat) {
        return false;

    }
    else {
        return true;

    }
}

// Check of "Gebruikersnaam" al in database is"
function existing_username($username, $sqliconn) {
    $preparedstatement = $sqliconn->prepare("SELECT username FROM users WHERE username = ?");
    $preparedstatement->bind_param("s", $username);
    $preparedstatement->execute();
    $result = $preparedstatement->get_result();
    $username = $result->fetch_assoc();
    $preparedstatement->close();
    if($username) {
        return true;

    }
    else {
        return false;

    }
}

// Check of "email" al in database is"
function existing_email($email, $sqliconn) {
    $preparedstatement = $sqliconn->prepare("SELECT email FROM users WHERE email = ?");
    $preparedstatement->bind_param("s", $email);
    $preparedstatement->execute();
    $result = $preparedstatement->get_result();
    $emailname = $result->fetch_assoc();
    $preparedstatement->close();
    if($emailname) {
        return true;

    }
    else {
        return false;

    }
}

// Creer de gebruiker
function user_creation($username, $email, $pw, $user_type, $sqliconn) {
    // Vraag na of dit correcte manier van hashen is
    $passhash = password_hash($pw, PASSWORD_BCRYPT);
    $preparedstatement = $sqliconn->prepare("INSERT INTO users (username, email, pw, user_type) VALUES (?, ?, ?, ?)");
    $preparedstatement->bind_param("ssss", $username, $email, $passhash, $user_type);
    $success = $preparedstatement->execute();
    $preparedstatement->close();
}

// Check of "pw" gelijk is aan "confirm pw"
function check_pw_matching($pw, $pwrepeat) {
    if ($pw === $pwrepeat) {
        return false;

    }
    else {
        return true;

    }
}

function length_pw($pw) {
    if (strlen($pw) >= 5) {
        return false;

    }
    else {
        return true;

    }
}

function specialchar_pw($pw) {
    if (preg_match('/[!@#$%^&*(),.?":{}|<>]/', $pw)) {
        return false;
    }
    else {
        return true;

    }
}

function digit_pw($pw) {
    if (preg_match('/\d/', $pw)) {
        return false;
    }
    else {
        return true;

    }
}

function uppercase_pw($pw) {
    if (preg_match('/[A-Z]/', $pw)) {
        return false;
    }
    else {
        return true;

    }
}

function lowercase_pw($pw) {
    if (preg_match('/[a-z]/', $pw)) {
        return false;
    }
    else {
        return true;

    }
}