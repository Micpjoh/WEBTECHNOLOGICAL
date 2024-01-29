<?php
require_once "databasis.inc.php";

// Pas standaard sessioncookie parameters aan.
ini_set("session.use_strict_mode", 1);
session_set_cookie_params([
    "domain"=>"localhost",
    "path"=>"/",
    "secure"=>true, // https
    "httponly"=>true, // http, scripts vermijden van user (block JS).
    "lifetime"=> 0
]); 
// check for cookies named rememberme
if (isset($_COOKIE['rememberme'])) {
    $token = $_COOKIE['rememberme'];
    $preparedstatement = $sqliconn->prepare("SELECT * FROM tokenlogin WHERE token = ?");
    $preparedstatement->bind_param("s", $token);
    $preparedstatement->execute();
    $result = $preparedstatement->get_result();
    $tokenData = $result->fetch_assoc();

    if ($tokenData && time() < strtotime($tokenData['expirydate'])) {
        // Log the user in
        $_SESSION['user_id'] = $tokenData['user_id'];
        $_SESSION['user_name'] = $tokenData['username'];
        $_SESSION['user_type'] = $tokenData['user_type'];

        // Start the session after setting the session variables
        session_start();
    } else {
        // Remove cookie if not valid
        setcookie('rememberme', '', time() - 3600, "/");
    }
} else {
    // Start the session if there is no rememberme cookie
    session_start();
}

// generate new sessionID every hour for security
if (!isset($_SESSION["time_new_sessionid"])) { 
    session_regenerate_id();
    $_SESSION["time_new_sessionid"] = time();
} else {
    $session_time = 60 * 60; 
    if (time() - $_SESSION["time_new_sessionid"] >= $session_time){
        session_regenerate_id();
        $_SESSION["time_new_sessionid"] = time();
    }
}
