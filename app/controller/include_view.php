<?php

function include_view(){
    
}

//store URI request in a variable
$request = $_SERVER['REQUEST_URI'];

//include view according to requested URI
switch ($request) {
    case '':
    case '/':
        require('./app/view/home.php');
    break;

    case '/inscription/':
        require('./app/view/register.php');
    break;
    
    case '/se-connecter/':
        require('./app/view/login.php');
    break;

    case '/ajouter-livre/':
        require('./app/view/add_book.php');
    break;

    case '/bibliotheque/':
        require('./app/view/all-books.php');
    break;
    
    default:
        echo '404';
        break;
}