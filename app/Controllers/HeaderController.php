<?php

function toggle_sub_dasboard_link($link_to_dashboard, $link_to_register)
{
    if (array_key_exists("authenticated_user", $_SESSION)) {
        echo $link_to_dashboard;
    } else {
        echo $link_to_register;
    }
}
