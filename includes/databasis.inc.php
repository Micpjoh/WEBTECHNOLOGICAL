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

// // Database credentials
// $servername = "your_server_name";
// $username = "your_username";
// $password = "your_password";
// $dbname = "your_database_name";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }