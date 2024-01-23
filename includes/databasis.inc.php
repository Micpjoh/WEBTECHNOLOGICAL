<?php

$servername = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBname = "greenwear";

// !!! REMOTE connectie !!!
//$servername=""
//$DBpassword=""
//$DBusername=""
//$DBname=""

$sqliconn = new mysqli($servername, $DBusername, $DBpassword, $DBname);

if ($sqlionn->connect_error) {
    die("Connection failed: " . $sqliconn->connect_error);
}

// Geen reden om te closen, als het een 100% php file is