<?php
// Connection naar database

// LOKAAL, wanneer we deployen moeten we ff TA om hulp vragen / lecture <3
$servername="localhost"
$DBpassword=""
$DBusername="root"
$DBname="greenwear"

// !!! REMOTE connectie !!!
//$servername=""
//$DBpassword=""
//$DBusername=""
//$DBname=""


try {
    $conn = new PDO("mysql:host=$servername;DBname=$DBname", $DBusername, $DBpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}   catch(PDOException $exception) {
    die("Connection failed: " . $exception->getMessage());
}
// Geen reden om te closen, als het een 100% php file is