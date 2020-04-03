<?php

//define title tag for each view according to requested URI
include("./app/Controllers/title_tag.php");

//include function to output internal links
include("./app/functions/href.php");

//include header
include("./app/Views/HeaderView.php");

//include view according to requested URI
include("./app/Controllers/include_view.php");

//include footer
include("./app/Views/FooterView.php");
