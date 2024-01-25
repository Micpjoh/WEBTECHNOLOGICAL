<?php

$servername = "localhost";
$DBusername = "efea";
$DBpassword = "GyCNuUbReZhrbQwJwhEcnXWyCrvtxjiK";
$DBname = "greenwear";

// !!! REMOTE connectie !!!
// $servername="localhost"
// $DBusername="efea"
// $DBpassword="GyCNuUbReZhrbQwJwhEcnXWyCrvtxjiK"
// $DBname=""

$sqliconn = new mysqli($servername, $DBusername, $DBpassword, $DBname);

if ($sqliconn->connect_error) {
    die("Connection failed: " . $sqliconn->connect_error);
}

// Geen reden om te closen, als het een 100% php file is