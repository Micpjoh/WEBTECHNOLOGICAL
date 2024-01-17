<?php

//code om elk stuk detail te checken
//geen required gebruiken bij form, dus check met functies

function input_filledin($username, $email, $emailrepeat, $pw, $pwrepeat) {
    if (empty($username) || empty($email) || empty($emailrepeat) || empty($pw) || empty($pwrepeat)) {
        return true;
    } 
    else {
        return false;
    }
}

function validity_name($username) {
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        return true;
    } 
    else {
        return false;
    }
}


function validity_email($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else {
        return false;
    }
}

function matching_emails($email, $emailrepeat) {
    if ($email !== $emailrepeat) {
        return true;
    }
    else {
        return false;
    }
}

function matching_pw($pw, $pwrepeat) {
    if ($pw !== $pwrepeat) {
        return true;
    }
    else{
        return false;
    }
}

function createUser($conn,$username,$email,$pw) {
    $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    $hashedpw = password_hash($pw, PASSWORD_BCRYPT)
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedpw)
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}