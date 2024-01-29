<?php
require_once "securesession.inc.php";
require_once "databasis.inc.php";

// log user uit
session_unset();
session_destroy();
header("Location: ../login.php");
die();
