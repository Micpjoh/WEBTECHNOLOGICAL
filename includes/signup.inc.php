<?php
// checkt of gebruiker via de submit button komt, en niet de url
// kijken of de REQUEST_METHOD post is
if ($_SERVER["REQUEST_METHOD"] ==="POST") {
} 

else {
    header("location: ../signup.php");
    exit();
}