<?php

function toggle_login_link()
{
    if (isset($_SESSION["user_id"])) {
        echo '<a class="nav-link" href="';
        href('/se-deconnecter/');
        echo '>Ajouter un livre</a>';
    } else {
        echo '<a class="nav-link" href="';
        href("/se-connecter/");
        echo '">Connexion</a>';
    }
}
