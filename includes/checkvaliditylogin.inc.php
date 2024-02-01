<?php
session_start();

// Check if all forms are filled in
function form_filledin($email, $pw) {
    if (empty($email) || empty($pw)) {
        return true;
    } else {
        return false;
    }
}

// Use email to get user info
function get_user_by_email($email, $sqliconn) {
    $preparedstatement = $sqliconn->prepare("SELECT * FROM users WHERE email = ?");
    $preparedstatement->bind_param("s", $email);
    $preparedstatement->execute();
    $result = $preparedstatement->get_result();
    $user = $result->fetch_assoc();
    $preparedstatement->close();
    return $user;
}

// Log user in
function log_validuser_in($sqliconn, $email, $pw, $rememberMe) {
    $user = get_user_by_email($email, $sqliconn);

    // If email isnt in database, send user back to login page with a error
    if (!$user) {
        header("Location: ../login.php?error=name-or-pw-is-wrong");
        die();
    }

    // Check if pw is correct
    $pwhash = $user["pw"];
    $checkpw = password_verify($pw, $pwhash);

    // If remember me has been clicked, create a cookie, with a certain tokencode
    if ($rememberMe) {
        $token = bin2hex(random_bytes(64));
        setcookie('rememberme', $token, time() + (86400 * 30), "/"); // 86400 = 1 day

        $expiresAt = time() + (86400 * 30);
        $datedexpiresAt = date('Y-m-d H:i:s', $expiresAt);
        $preparedstatement = $sqliconn->prepare("INSERT INTO tokenlogin (token, user_id, expirydate, username, user_type) VALUES (?, ?, ?, ?, ?)");
        $preparedstatement->bind_param("sisss", $token, $user['user_id'], $datedexpiresAt, $user["username"], $user["user_type"]);
        $preparedstatement->execute();
    }


    // check if pw is correct with password verify
    if ($checkpw) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['username'];
        $_SESSION['user_type'] = $user['user_type'];

        // log in as admin if user_type "admin" is
        if ($_SESSION['user_type'] === 'admin') {
            header("Location: ../admin.php");
            die();
        } 

        // log in as user if user_type "user" is
        if ($_SESSION['user_type'] === 'user'){
            header("Location: ../index.php");
            die();
        }
    } 
    else {
        header("Location: ../login.php?error=email-or-pw-is-wrong");
        die();
    }
}
