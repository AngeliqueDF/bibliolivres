<?php

$servername = "localhost";
$database = "utilisateurs";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO messages (id) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    echo "Inscription réussie";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;