<?php

function toggle_login_link()
{
    if (array_key_exists("authenticated_user", $_SESSION)) {
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="';
        href('/se-deconnecter/');
        echo '">Déconnexion</a>';
        echo '</li>';
    } else {
        echo '<a class="nav-link" href="';
        href('/se-connecter/');
        echo '">Connexion</a>';
    }
}
