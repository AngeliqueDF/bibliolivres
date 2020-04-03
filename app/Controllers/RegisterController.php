<?php

// Server side Validation

// get post values
// check that we received required values
// sanitize values
// check regex
// display errors
// prepared sql query
// success, redirect

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "./../functions/href.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // check that we received all required data
    if (empty($_POST["new-user-id"])) {
        echo "Erreur : vous n'avez pas choisi d'identifiant";
        echo "<br />";
        echo '<a href="';
        href("/inscription/");
        echo '">Retour au formulaire</a>';
        exit();
    } else if (empty($_POST["new-user-password"])) {
        echo "Erreur : vous n'avez pas choisi de mot de passe";
        echo "<br />";
        echo '<a href="';
        href("/inscription/");
        echo '">Retour au formulaire</a>';
        exit();
    }

    // sanitize data to prevent unwanted XSS attack
    $new_username = filter_var($_POST["new-user-id"], FILTER_SANITIZE_STRING);

    // removes tags
    // test <script src="maliciousscript.js">hacked</script>
    $new_user_password = filter_var($_POST["new-user-password"], FILTER_SANITIZE_STRING);

    echo $new_username, "<br />";
    echo $new_user_password, "<br />";

    function check_id($idPattern, $new_username)
    {
        // check that the id has letters only
        $idPattern = "^s*[a-zA-Zéçèàê]+s*$";
        if (preg_match($idPattern, $new_username)) {
            echo "id ok <br />";
        } else {
            echo "invalid id <br />";
        }
        // check that the id has at least 2 letters
        if (strlen($new_username) < 2) {
            echo "Votre mot de passe doit contenir au moins 2 caractères";
        }
    }
    function check_password($new_username, $new_user_password)
    {
        $lowercaseRegex = "(.*[a-z].*)";
        $uppercaseRegex = "(.*[A-Z].*)";
        $numberRegex = "(.*[0-9].*)";

        // check that password is different than id
        if ($new_username == $new_user_password) {
            echo "<a class='nav-link' href='";
            echo href("/inscription/");
            echo "'>Retourner à la page d'inscription</a><br />";
            exit("Le mot de passe et l'identifiant doivent être différents.");
        } else if (strlen($new_user_password) < 8) {
            exit("Votre mot de passe doit comporter au moins 8 caractères");
        }
        // check password has lowercases
        if (preg_match($lowercaseRegex, $new_user_password)) {
            echo "lowercase ok <br />";
        } else {
            exit("Votre mot de passe doit contenir des lettres minuscules, majuscules, et des chiffres. <br />");
        }
        // check password has at least one uppercase
        if (preg_match($uppercaseRegex, $new_user_password)) {
            echo "uppercase ok <br />";
        } else {
            exit("Votre mot de passe doit contenir des lettres minuscules, majuscules, et des chiffres. <br />");
        }
        // check password has at least one number
        if (preg_match($numberRegex, $new_user_password)) {
            echo "number ok <br />";
        } else {
            exit("Votre mot de passe doit contenir des lettres minuscules, majuscules, et des chiffres. <br />");
        }
    }
    check_password($new_username, $new_user_password);

    $new_user_password = password_hash($new_user_password, PASSWORD_BCRYPT);

    // connect to database
    // pdo statement
    require_once("./../Models/RegisterModel.php");

    function check_duplicate_username($new_username, $new_user_password)
    {

        //finds all records with matching username
        $query_result = search_db_duplicate_username($new_username);

        if (empty($query_result)) {
            echo "Cet identifiant est disponible.", "<br />", "Inscription en cours", "<br />";
            add_user($new_username, $new_user_password);
            echo "Inscription réussie", "<br />";

            echo "<a class='nav-link' href='";
            echo href("/se-connecter/");
            echo "'>Aller à la page de connexion</a>", "<br />";
        } else {
            echo "<pre>";
            print_r($query_result);
            echo "</pre>";
            echo "Cet identifiant existe déjà.", "<br />";

            echo "<a class='nav-link' href='";
            echo href("/inscription/");
            exit("'>Retourner à la page d'inscription</a><br />");
        }
    };
    check_duplicate_username($new_username, $new_user_password);
}
