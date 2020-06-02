<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

//include function to output internal links
include("./app/Helpers/Href.php");

//define title tag for each view according to requested URI
include("./app/Controllers/TitleTagController.php");

//include header
include("./app/Views/HeaderView.php");

//include view according to requested URI
include("./app/Controllers/Router.php");

//include footer
include("./app/Views/FooterView.php");