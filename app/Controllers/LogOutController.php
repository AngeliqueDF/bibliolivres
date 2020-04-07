<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("./../functions/href.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_destroy();
    session_unset();
    session_start();
    $_SESSION = [];

    header("Location: /");
}
