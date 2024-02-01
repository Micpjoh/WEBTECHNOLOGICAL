<?php
require_once "databasis.inc.php";

// Change original session cookie parameters
ini_set("session.use_strict_mode", 1);
session_set_cookie_params([
    "domain"=>"localhost",
    "path"=>"/",
    "secure"=>true, // https
    "httponly"=>true, // http
    "lifetime"=> 0
]); 

// After parameters set we start the session
session_start(); 

// check for cookies name rememberme
// if cookie exists, take the info out of the database, by checking where the tokencode is in database.
if (isset($_COOKIE['rememberme'])) {
    $token = $_COOKIE['rememberme'];
    $preparedstatement = $sqliconn->prepare("SELECT * FROM tokenlogin WHERE token = ?");
    $preparedstatement->bind_param("s", $token);
    $preparedstatement->execute();
    $result = $preparedstatement->get_result();
    $tokenData = $result->fetch_assoc();

    if ($tokenData && time() < strtotime($tokenData['expirydate'])) {
        // Log the user in, by assigning his id, name and type
        $_SESSION['user_id'] = $tokenData['user_id'];
        $_SESSION['user_name'] = $tokenData['username'];
        $_SESSION['user_type'] = $tokenData['user_type'];

    } else {
        // Remove cookie if not valid anymore/expired
        setcookie('rememberme', '', time() - 3600, "/");
    }
}

// Generate new sessionID every hour
// Save the time when its created
// check if sessionID is expired, if yes replace with new sessionID
if(!isset($_SESSION["time_new_sessionid"])) { 
    session_regenerate_id();
    $_SESSION["time_new_sessionid"] = time();

} else {
    $session_time = 60 * 60; 
    if(time() - $_SESSION["time_new_sessionid"] >= $session_time){
        session_regenerate_id();
        $_SESSION["time_new_sessionid"] = time();
    }
}
