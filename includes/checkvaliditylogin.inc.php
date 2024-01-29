<?php
require_once "securesession.inc.php";

// Check of alle fields zijn ingevuld.
function form_filledin($email, $pw) {
    if (empty($email) || empty($pw)) {
        return true;
    } else {
        return false;
    }
}

// Check alle gerelateerde info van user, door te zoeken met gegeven email
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

    // Als email niet leidt tot user, geef een login error
    if (!$user) {
        header("Location: ../login.php?error=name-or-pw-is-wrong");
        die();
    }

    // Check of password klopt
    $pwhash = $user["pw"];
    $checkpw = password_verify($pw, $pwhash);
    
    // als remember me aangeklikt, maak rememberme cookies aan.
    if ($rememberMe) {
        $token = bin2hex(random_bytes(64));
        setcookie('rememberme', $token, time() + (86400 * 30), "/"); // 86400 = 1 dag

        $expiresAt = time() + (86400 * 30);
        $datedexpiresAt = date('Y-m-d H:i:s', $expiresAt);
        $stmt = $sqliconn->prepare("INSERT INTO tokenlogin (token, user_id, expirydate, username, user_type) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sisss", $token, $user['user_id'], $datedexpiresAt, $user["username"], $user["user_type"]);
        $stmt->execute();
    }


    // Als password klopt check voor remember me cookies en log user in als admin of normaal
    if ($checkpw) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['username'];
        $_SESSION['user_type'] = $user['user_type'];

        // log in als admin als user_type "admin" is
        if ($_SESSION['user_type'] === 'admin') {
            header("Location: ../admin.php");
            die();
        } 

        // log in als user als user_type "user" is
        if ($_SESSION['user_type'] === 'user'){
            header("Location: ../profile.php");
            die();
        }
    } 
    else {
        header("Location: ../login.php?error=name-or-pw-is-wrong");
        die();
    }
}
