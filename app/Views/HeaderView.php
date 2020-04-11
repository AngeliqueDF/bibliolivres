<?php

$link_to_dashboard = '<a class="nav-link" href="' . "http://$_SERVER[HTTP_HOST]" . '/dashboard/' . '">Dashboard</a>';

$link_to_register = '<a class="nav-link" href="' . "http://$_SERVER[HTTP_HOST]" . '/inscription/' . '">Inscrivez-vous</a>';

require __DIR__ . "./../Controllers/HeaderController.php";

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php href("/style.css"); ?>">

    <title><?= $title_tag; ?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top d-flex justify-content-between">
            <h1><a class="navbar-brand" href="<?php href(); ?>">Bibliolivres</a></h1></a>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <?php toggle_sub_dasboard_link($link_to_dashboard, $link_to_register); ?>
                </li>
            </ul>
        </nav>
    </header>