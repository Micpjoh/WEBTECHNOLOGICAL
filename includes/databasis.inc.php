<?php
// DB/server info !!! LOCAL connectie !!!
$servername = "localhost";
$DBusername = "micahj";
$DBpassword = "WuIFtYONBjaBbCToqsonPaQxFhpHtTDi";
$DBname = "greenwear";

$sqliconn = new mysqli($servername, $DBusername, $DBpassword, $DBname);

if ($sqliconn->connect_error) {
    die("Connection failed: " . $sqliconn->connect_error);
}

// Geen reden om te closen, als het een 100% php file is
