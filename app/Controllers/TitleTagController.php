<?php

//define title tag for each view according to requested URI
function title_tag()
{

    //store URI request in a variable
    $request = $_SERVER['REQUEST_URI'];

    //title tag content
    $title_tag = " - Bibliolivres";
    $current_page = "";

    switch ($request) {
        case '';
        case '/';
            $current_page = "Accueil";
            break;

        case '/inscription/':
            $current_page = "Inscrivez-vous";
            break;

        case '/se-connecter/':
            $current_page = "Connexion à votre compte";
            break;

        case '/ajouter-livre/':
            $current_page = "Ajouter un livre";
            break;

        case '/bibliotheque/':
            $current_page = "Bibliothèque";
            break;
    }
    return $current_page . $title_tag;
}
$title_tag = title_tag();
