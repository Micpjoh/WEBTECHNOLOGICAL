<?php
function form_filledin($username, $email, $emailrepeat, $pw, $pwrepeat, $consent) {
    if (!empty($username) && !empty($email) && !empty($emailrepeat) 
    && !empty($pw) && !empty($pwrepeat) && !empty($consent)) {
        return false;
    }
    else {
        return true;
    }
}

function validity_name($username) {
    if (preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        return false;
    }
    else {
        return true;
    }
}

function validity_email($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    else {
        return true;
    }
}

function check_mails_matching($email, $emailrepeat) {
    if ($email === $emailrepeat) {
        return false;
    }
    else {
        return true;
    }
}

function get_username(string $username, $sqliconn) {
    $preparedstatement = $sqliconn->prepare("SELECT username FROM users WHERE username = ?");
    $preparedstatement->bind_param("s", $username);
    $preparedstatement->execute();
    $result = $preparedstatement->get_result();
    $data = $result->fetch_assoc();
    $preparedstatement->close();
    return $data;
}

function existing_username(string $username, $sqliconn) {
    if(get_username($username, $sqliconn)) {
        return true;
    }
    else {
        return false;
    }
}

function get_email(string $email, $sqliconn) {
    $preparedstatement = $sqliconn->prepare("SELECT email FROM users WHERE email = ?");
    $preparedstatement->bind_param("s", $email);
    $preparedstatement->execute();
    $result = $preparedstatement->get_result();
    $data = $result->fetch_assoc();
    $preparedstatement->close();

    return $data;
}

function existing_email(string $email, $sqliconn) {
    if(get_email($email, $sqliconn)) {
        return true;
    }
    else {
        return false;
    }
}

function user_creation($username, $email, $pw, $sqliconn) {
    $passhash = password_hash($pw, PASSWORD_BCRYPT);
    $preparedstatement = $sqliconn->prepare("INSERT INTO users (username, email, pwd) VALUES (?, ?, ?)");
    $preparedstatement->bind_param("sss", $username, $email, $passhash);
    $success = $preparedstatement->execute();
    $preparedstatement->close();

    return $success;
}

function check_pw_matching($pw, $pwrepeat) {
    if ($pw === $pwrepeat) {
        return false;
    }
    else {
        return true;
    }
}