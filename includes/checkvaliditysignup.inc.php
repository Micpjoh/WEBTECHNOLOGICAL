<?php
// Check if all fields are filled in
function form_filledin($username, $email, $emailrepeat, $pw, $pwrepeat, $consent) {
    if (!empty($username) && !empty($email) && !empty($emailrepeat) 
    && !empty($pw) && !empty($pwrepeat) && !empty($consent)) {
        return false;

    }
    else {
        return true;

    }
}

// Check if username is a valid username
function validity_name($username) {
    if (preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        return false;

    }
    else {
        return true;

    }
}

// Check if username length is greater or equal to 2 characters
function length_name($username) {
    if (strlen($username) >= 2) {
        return false;

    }
    else {
        return true;

    }
}

// Check if email is valid
function validity_email($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;

    }
    else {
        return true;

    }
}

// Check if email is matching with the confirm email
function check_mails_matching($email, $emailrepeat) {
    if ($email === $emailrepeat) {
        return false;

    }
    else {
        return true;

    }
}

// Check if username already exists in database
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

// Check if email already in database
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

// Create user
function user_creation($username, $email, $pw, $user_type, $sqliconn) {
    $passhash = password_hash($pw, PASSWORD_BCRYPT);
    $preparedstatement = $sqliconn->prepare("INSERT INTO users (username, email, pw, user_type) VALUES (?, ?, ?, ?)");
    $preparedstatement->bind_param("ssss", $username, $email, $passhash, $user_type);
    $success = $preparedstatement->execute();
    $preparedstatement->close();
}

// Check if pw is matching with confirm pw
function check_pw_matching($pw, $pwrepeat) {
    if ($pw === $pwrepeat) {
        return false;

    }
    else {
        return true;

    }
}
// Check if pw length is greater than 5 chars
function length_pw($pw) {
    if (strlen($pw) >= 5) {
        return false;

    }
    else {
        return true;

    }
}

// check if pw has a special character
function specialchar_pw($pw) {
    if (preg_match('/[!@#$%^&*(),.?":{}|<>]/', $pw)) {
        return false;
    }
    else {
        return true;

    }
}

// check if pw has a digit
function digit_pw($pw) {
    if (preg_match('/\d/', $pw)) {
        return false;
    }
    else {
        return true;

    }
}

// check if pw has a uppercase letter
function uppercase_pw($pw) {
    if (preg_match('/[A-Z]/', $pw)) {
        return false;
    }
    else {
        return true;

    }
}

// check if pw has a lowercase letter
function lowercase_pw($pw) {
    if (preg_match('/[a-z]/', $pw)) {
        return false;
    }
    else {
        return true;

    }
}