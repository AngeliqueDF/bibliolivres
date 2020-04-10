<?php

function include_view()
{
    //store URI request in a variable
    $request = $_SERVER["REQUEST_URI"];

    //include view according to requested URI
    switch ($request) {
        case "":
        case "/":
            require("./app/Views/HomeView.php");
            break;

        case "/inscription/":
            require("./app/Views/RegisterView.php");
            break;

        case "/se-connecter/":
            require("./app/Views/LogInView.php");
            break;

        case "/se-deconnecter/":
            require("./app/Views/LogOutView.php");
            break;

        case "/ajouter-livre/":
            require("./app/Views/AddBookView.php");
            break;

        case "/bibliotheque/":
            require("./app/Views/AllBooksView.php");
            break;

        case "/dashboard/":
            require("./app/Views/DashboardView.php");
            break;

        default:
            echo "404";
            break;
    }
}
include_view();
