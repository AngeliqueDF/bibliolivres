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

    <nav class="navbar navbar-expand navbar-dark fixed-top bg-dark d-flex justify-content-between">
        <h1><a class="navbar-brand" href="<?php href(); ?>">Bibliolivres</a></h1></a>

        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?php href("/inscription/"); ?>">Inscrivez-vous</a>
            </li>
        </ul>
    </nav>

</header>