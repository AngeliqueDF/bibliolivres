<?php

function display_add_book_view($logged_in_add_book_view, $logged_out_add_book_view)
{
  if (array_key_exists("authenticated_user", $_SESSION)) {
    echo $logged_in_add_book_view;
  } else {
    echo $logged_out_add_book_view;
  }
}
