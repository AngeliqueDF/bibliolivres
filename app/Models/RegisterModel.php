<?php



function search_username_duplicate($new_username)
{
    $servername = "localhost";
    $database = "bibliolivres";
    $username = "adfijhnb";
    $password = "GxC7yRnyCNyJks3f";
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$new_username]);

        //returns an array
        $query_username = $stmt->fetchAll();

        return $query_username;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
function search_user_mail_duplicate($new_user_mail)
{
    $servername = "localhost";
    $database = "bibliolivres";
    $username = "adfijhnb";
    $password = "GxC7yRnyCNyJks3f";
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM users WHERE user_mail = ?");
        $stmt->execute([$new_user_mail]);

        //returns an array
        $query_user_mail = $stmt->fetchAll();

        return $query_user_mail;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function add_user($new_user_mail, $new_username, $new_user_password)
{
    $servername = "localhost";
    $database = "bibliolivres";
    $username = "adfijhnb";
    $password = "GxC7yRnyCNyJks3f";
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO users (user_mail, username, user_password) VALUES (:e_mail, :username, :user_password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                'e_mail' => $new_user_mail,
                'username' => $new_username,
                'user_password' => $new_user_password
            ]
        );

        // return true;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return false;
    }
}
