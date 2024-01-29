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

// Pas nu starten we de sessie, met de nieuwe parameters
session_start(); 

// check voor cookies genaamd rememberme
// als de cookie bestaat neemt het de info uit DB en checkt of het valid is
if (isset($_COOKIE['rememberme'])) {
    $token = $_COOKIE['rememberme'];
    $preparedstatement = $sqliconn->prepare("SELECT * FROM tokenlogin WHERE token = ?");
    $preparedstatement->bind_param("s", $token);
    $preparedstatement->execute();
    $result = $preparedstatement->get_result();
    $tokenData = $result->fetch_assoc();

    if ($tokenData && time() < strtotime($tokenData['expirydate'])) {
        // Log de user in
        $_SESSION['user_id'] = $tokenData['user_id'];
        $_SESSION['user_name'] = $tokenData['username'];
        $_SESSION['user_type'] = $tokenData['user_type'];

    } else {
        // Verwijder cookie, als niet valid
        setcookie('rememberme', '', time() - 3600, "/");
    }
}

// generate nieuw sessionID om de uur voor security
// sla tijd op van generation van nieuwe sessionID
// check of het de $session_time is overschreden, zo ja generate weer nieuw ID
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
