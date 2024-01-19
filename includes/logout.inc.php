<?php
require_once "securesession.inc.php";
session_unset();
session_destroy();
header("Location: ../login.php");
exit();
?>