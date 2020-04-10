<?php

require_once "./../functions/href.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //check we received both input values
    if (empty($_POST["id-connect-field"])) {
        echo "Votre identifiant est manquant.";
    }
    if (empty($_POST["password-connect-field"])) {
        echo "Votre mot de passe est manquant.";
    }
    //sanitize username
    $login_username = filter_var($_POST["id-connect-field"], FILTER_SANITIZE_STRING);

    //sanitize password
    $login_password = filter_var($_POST["password-connect-field"], FILTER_SANITIZE_STRING);

    require_once "./../Models/LoginModel.php";

    //search username in database
    $existing_user = [];
    $existing_user = check_login_user_query($login_username);
    
    //if we found user in the database
    if ($existing_user) {
        //returns true or false
        $check_password_from_db = password_verify($login_password, $existing_user["password"]);

        $_SESSION["authenticated_user"] = FALSE;

        if ($existing_user && $check_password_from_db) {

            session_start();

            //variables gotten from the model, database
            $_SESSION["user_id"] = $existing_user["id"];
            $_SESSION["username"] = $existing_user["username"];
            $_SESSION["authenticated_user"] = TRUE;

            header("Location: /");
        } else {
            echo "Erreur : l'identifiant et / ou le mot de passe que vous avez entré est incorrect.";
            echo "<br />";
            echo "<a href=";
            href('/se-connecter/');
            echo ">Retour au formulaire</a>";
            echo "<br />";
            echo "Vous êtes un nouvel utilisateur ? ";
            echo "<a href=";
            href('/inscription/');
            echo ">Inscrivez-vous ici : Inscription.</a>";
            exit();
        }
    }
}
