<?php 

// Server side Validation

// get post values
// check that we received required values
// sanitize values
// check regex
// display errors
// prepared sql query
// success, redirect

// <script src="toto.js">hacked</script>

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "./../functions/href.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if( empty($_POST["new-user-id"])){
        echo "Erreur : vous n'avez pas choisi d'identifiant";
        echo "<br />";
        echo '<a href="';
        href("/inscription/");
        echo '">Retour au formulaire</a>';
        exit();
    }else if( empty($_POST["new-user-password"]) ){
        echo "Erreur : vous n'avez pas choisi de mot de passe";
        echo "<br />";
        echo '<a href="';
        href("/inscription/");
        echo '">Retour au formulaire</a>';
        exit();
    }

    $new_user_id = filter_var($_POST["new-user-id"], FILTER_SANITIZE_STRING);
    $new_user_password = filter_var($_POST["new-user-password"], FILTER_SANITIZE_STRING);

    echo $new_user_id;
    echo $new_user_password;
}