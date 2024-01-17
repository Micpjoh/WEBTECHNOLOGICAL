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
