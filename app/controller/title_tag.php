<?php

//define title tag for each view according to requested URI
function title_tag(){

    //store URI request in a variable
    $request = $_SERVER['REQUEST_URI'];

    //title tag content
    $title_tag = "";

    switch ($request) {
        case '';
        case '/';
            $title_tag = "Bibliolivres";
            break;

        case '/inscription/':
            $title_tag = "Inscrivez-vous";
            break;
        
        case '/se-connecter/':
            $title_tag = "Connexion à votre compte";
            break;

        case '/ajouter-livre/':
            $title_tag = "Ajouter un livre";
        break;
        
        case '/bibliotheque/':
            $title_tag = "Bibliothèque";
            break;
        
    }
    return $title_tag;
}
$title_tag = title_tag();