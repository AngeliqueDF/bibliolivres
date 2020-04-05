<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "./../functions/href.php";

function check_login_user_query($login_username, $user_login)
{
    $servername = "localhost";
    $database = "bibliolivres";
    $username = "root";
    $password = "root";
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$login_username]);

        //returns an array
        $user_found = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user_found;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
