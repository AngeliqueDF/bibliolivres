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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $new_user_id = filter_var($_POST["new-user-id"], FILTER_SANITIZE_STRING);

    // removes tags
    // test <script src="maliciousscript.js">hacked</script>
    $new_user_password = filter_var($_POST["new-user-password"], FILTER_SANITIZE_STRING);

    echo $new_user_id, "<br />";
    echo $new_user_password, "<br />";

    // check that the id has letters only
    function check_id($idPattern, $new_user_id)
    {
        $idPattern = "^s*[a-zA-Zéçèàê]+s*$";
        if (preg_match($idPattern, $new_user_id, $new_user_password)) {
            echo "id ok <br />";
        } else {
            echo "invalid id <br />";
        }
        // check that the id has at least 2 letters
        if (strlen($new_user_password) < 2) {
            echo "Votre mot de passe doit contenir au moins 2 caractères";
        }
    }
    
    function check_password($new_user_id, $new_user_password)
    {
        $lowercaseRegex = "(.*[a-z].*)";
        $uppercaseRegex = "(.*[A-Z].*)";
        $numberRegex = "(.*[0-9].*)";

        // check that password is different than id
        if( $new_user_id == $new_user_password ){
            echo "<a class='nav-link' href='";
            echo href("/inscription/");
            echo "'>Retourner à la page d'inscription</a><br />";
            exit("Le mot de passe et l'identifiant doivent être différents.");
        }
        // check that password has lowercases
        if (preg_match($lowercaseRegex, $new_user_password)) {
            echo "lowercase <br />";
        } else {
            echo "Votre mot de passe doit contenir des lettres minuscules, majuscules, et des chiffres. <br />";
        }
        // check that password has at least one uppercase
        if (preg_match($uppercaseRegex, $new_user_password)) {
            echo "uppercase <br />";
        } else {
            echo "Votre mot de passe doit contenir des lettres minuscules, majuscules, et des chiffres. <br />";
        }
        // check that password has at least one number
        if (preg_match($numberRegex, $new_user_password)) {
            echo "number <br />";
        } else {
            echo "Votre mot de passe doit contenir des lettres minuscules, majuscules, et des chiffres. <br />";
        }
    }
    check_password($new_user_id, $new_user_password);


    // connect to database
    // pdo statement
    // redirect on success

    require_once("./../model/RegisterModel.php");
}