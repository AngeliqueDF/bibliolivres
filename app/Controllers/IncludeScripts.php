<?php

//add links to footer with function
$common_scripts = array(
    "script" => "/js/script.js",
);
$scripts_to_add = array(
    "/inscription/" => array(
        "validateRegister" => "/js/validateRegister.js"
    )
);

$URI = $_SERVER["REQUEST_URI"];

function add_single_script($scripts_to_add, $URI)
{
    foreach ($scripts_to_add[$URI] as $value) {
        echo '<script src="';
        echo $value;
        echo '"></script>';
    };
}
function print_scripts($common_scripts, $scripts_to_add, $URI)
{
    foreach ($common_scripts as $value) {
        echo '<script src="';
        echo $value;
        echo '" type="module"></script>';
    }
    switch ($URI) {
        case '/inscription/':
            echo add_single_script($scripts_to_add, $URI);
            break;
    }
}
print_scripts($common_scripts, $scripts_to_add, $URI);
