<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

    //sent both values to model
    $user_found = [];
    $user_found = check_login_user_query($login_username, $login_password, $user_found);
    $check_password_from_db = password_verify($login_password, $user_found["password"]);

    if ($user_found && $check_password_from_db) {
        $_SESSION["user_id"] = $user_found["id"];
        echo "ok";
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
