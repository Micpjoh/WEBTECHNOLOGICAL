<?php

// Security voor sessionstart, cookie parameters aanpassen
// en session id constant regeneraten, zo hebben "malicious" users minder tijd.
ini_set("session.use_strict_mode", 1);
session_set_cookie_params([
    "domain"=>"localhost",
    "path"=>"/",
    "secure"=>true, // https
    "httponly"=>true, // http, scripts vermijden van user.
    "lifetime"=> 30 * 60 // SESSIONcookie blijft voor 30min
]); 

session_start(); // Pas nu starten we de sessie, met nieuw parameters

// generate meteen nieuw sessionID
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
