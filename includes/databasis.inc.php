<!-- databasis.inc.php -->
<?php
// Connection naar database

// LOKAAL, wanneer we deployen moeten we ff TA om hulp vragen / lecture <3
$servername="localhost";
$DBpassword="";
$DBusername="root";
$DBname="greenwear";

// !!! REMOTE connectie !!!
//$servername=""
//$DBpassword=""
//$DBusername=""
//$DBname=""

$conn = mysqli_connect($servername, $DBname, $DBpassword, $DBusername);

if (!$conn) {
    die()
}

// Geen reden om te closen, als het een 100% php file is