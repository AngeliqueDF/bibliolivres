<?php


function toggle_login_link()
{
    if (!$_SESSION["authenticated_user"]) {
        echo '<a class="nav-link" href="';
        href('/se-connecter/');
        echo '">Connexion</a>';
    } else {
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="';
        href('/se-deconnecter/');
        echo '">Déconnexion</a>';
        echo '</li>';
    }
}
