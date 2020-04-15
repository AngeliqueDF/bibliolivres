<?php

// Server side Validation

// get post values
// check that we received required values
// sanitize values
// check regex
// display errors
// prepared sql query
// success, redirect

require_once __DIR__ . "/../functions/href.php";

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
    } else if (empty($_POST["new-user-e-mail"])) {
        echo "Erreur : vous n'avez pas entré votre adresse e-mail";
        echo "<br />";
        echo '<a href="';
        href("/inscription/");
        echo '">Retour au formulaire</a>';
        exit();
    }

    // sanitize data
    $new_user_mail = filter_var($_POST["new-user-e-mail"], FILTER_SANITIZE_EMAIL);
    $new_username = filter_var($_POST["new-user-id"], FILTER_SANITIZE_STRING);
    $new_user_password = filter_var($_POST["new-user-password"], FILTER_SANITIZE_STRING);

    function validate_user_mail($new_user_mail)
    {
        if (filter_var($new_user_mail, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    function validate_username($letters_only_pattern, $new_username)
    {
        $letters_only_pattern = "(^s*[a-zA-Zéçèàê]+s*$)";
        // check that the id has at least 2 letters
        if (strlen($new_username) < 2) {
            echo "Votre identifiant doit contenir au moins 2 caractères";
            return false;
        }
        // check that the id has letters only
        if (preg_match($letters_only_pattern, $new_username)) {
            return true;
        } else {
            echo "invalid id <br />";
            return false;
        }
    }

    function validate_password($new_username, $new_user_password)
    {
        $lowercaseRegex = "(.*[a-z].*)";
        $uppercaseRegex = "(.*[A-Z].*)";
        $numberRegex = "(.*[0-9].*)";

        $has_lowercases = preg_match($lowercaseRegex, $new_user_password);
        $has_uppercases = preg_match($uppercaseRegex, $new_user_password);
        $has_numbers = preg_match($numberRegex, $new_user_password);

        // check password is different than id
        if ($new_username == $new_user_password) {
            echo "<a class='nav-link' href='";
            echo href("/inscription/");
            echo "'>Retourner à la page d'inscription</a><br />";
            echo "Le mot de passe et l'identifiant doivent être différents.";
            return false;
        } else if (strlen($new_user_password) < 8) {
            echo "Votre mot de passe doit comporter au moins 8 caractères";
            return false;
        }
        // check password has lowercases
        if ($has_lowercases && $has_uppercases && $has_numbers) {
            return true;
        } else {
            echo "Votre mot de passe doit contenir des lettres minuscules, majuscules, et des chiffres. <br />";
            return false;
        }
    }

    //check duplicate username or email address
    function register_user($new_user_mail, $new_username, $new_user_password)
    {
        require_once __DIR__ . "/../Models/RegisterModel.php";

        //check user doesn't exist already

        //finds all records with matching username
        $query_username = search_username_duplicate($new_username);
        //finds all records with matching email address
        $query_user_mail = search_user_mail_duplicate($new_user_mail);

        if (empty($query_username) && empty($query_user_mail)) {
            echo "Inscription en cours", "<br />";

            if (add_user($new_user_mail, $new_username, $new_user_password)) {
                echo "Inscription réussie", "<br />";
                echo "<a class='nav-link' href='";
                echo href("/se-connecter/");
                echo "'>Aller à la page de connexion</a>", "<br />";
            }
        } else {
            echo "Cet identifiant et/ou adresse e-mail existe déjà.", "<br />";

            echo "<a class='nav-link' href='";
            echo href("/inscription/");
            exit("'>Retourner à la page d'inscription</a><br />");
        }
    };

    // echo "mail ";
    // var_dump(validate_user_mail($new_user_mail));
    // echo "<br />";

    // echo "username ";
    // var_dump(validate_username($letters_only_pattern, $new_username));
    // echo "<br />";

    // echo "password ";
    // var_dump(validate_password($new_username, $new_user_password));
    // echo "<br />";

    if (
        validate_user_mail($new_user_mail) &&
        validate_username($letters_only_pattern, $new_username) &&
        validate_password($new_username, $new_user_password)
    ) {
        $new_user_password = password_hash($new_user_password, PASSWORD_BCRYPT);
        register_user($new_user_mail, $new_username, $new_user_password);
    }
}
