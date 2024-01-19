<?php
function form_filledin($email, $pw) {
    if (empty($email) || empty($pw)) {
        return true;
    } else {
        return false;
    }
}

function get_user_by_email($email, $sqliconn) {
    $preparedstatement = $sqliconn->prepare("SELECT * FROM users WHERE email = ?");
    $preparedstatement->bind_param("s", $email);
    $preparedstatement->execute();
    $result = $preparedstatement->get_result();
    $user = $result->fetch_assoc();
    $preparedstatement->close();
    return $user;
}

function log_validuser_in($sqliconn, $email, $pw) {
    $user = get_user_by_email($email, $sqliconn);

    if (!$user) {
        header("Location: ../login.php?error=name-or-pw-is-wrong");
        exit();
    }

    $passhash = $user["pwd"];
    $checkpw = password_verify($pw, $passhash);


    if (!$checkpw) {
        header("Location: ../login.php?error=name-or-pw-is-wrong");
        exit();
    } else {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header("Location: ../profile.php");
        exit();
    }
}
