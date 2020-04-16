<?php

//non

//add links to footer with function
function print_scripts()
{
    $common_scripts = array(
        "script" => '/app/dist/js/script.min.js',
    );
    foreach ($common_scripts as $value) {
        echo '<script src="';
        echo $value;
        echo '" type="module"></script>';
    }
}
print_scripts();
