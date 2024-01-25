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

function log_validuser_in($sqliconn, $email, $pw, $rememberMe) {
    $user = get_user_by_email($email, $sqliconn);

    if (!$user) {
        header("Location: ../login.php?error=name-or-pw-is-wrong");
        die();
    }

    $passhash = $user["pw"];
    $checkpw = password_verify($pw, $passhash);




    if ($checkpw) {
        require_once "securesession.inc.php";
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['username'];
        $_SESSION['user_type'] = $user['user_type'];

        if ($rememberMe) {
            $token = bin2hex(random_bytes(64));
            setcookie('rememberme', $token, time() + (86400 * 30), "/"); // 86400 = 1 dag
    
            $expiresAt = time() + (86400 * 30);
            $datedexpiresAt = date('Y-m-d H:i:s', $expiresAt);
            $stmt = $sqliconn->prepare("INSERT INTO tokenlogin (user_id, token, expirydate, username, user_type) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $user['user_id'], $token, $datedexpiresAt, $user["username"], $user["user_type"]);
            $stmt->execute();
        }
        if ($_SESSION['user_type'] === 'admin') {
            header("Location: ../admin.php");
            die();
        } 
        else {
            header("Location: ../profile.php");
            die();
        }
    } 
    else {
        header("Location: ../login.php?error=name-or-pw-is-wrong");
        die();
    }
}
