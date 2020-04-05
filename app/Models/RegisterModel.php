<?php

function search_db_duplicate_username($new_username){
    $servername = "localhost";
    $database = "bibliolivres";
    $username = "root";
    $password = "root";

    $username_check = "";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$new_username]);

        //returns an array
        $username_check = $stmt->fetchAll();

        return $username_check;

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function add_user($new_username, $new_user_password){
    $servername = "localhost";
    $database = "bibliolivres";
    $username = "root";
    $password = "root";
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $new_username, 'password' => $new_user_password]);
        
        return true;

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return false;
    }
}