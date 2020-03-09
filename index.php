<?php

//define title tag for each view according to requested URI
include("./app/controller/title_tag.php");

//include function to output internal links
include("./app/functions/href.php");

//include header
include("./app/view/header.php");

//include view according to requested URI
include("./app/controller/include_view.php");

//include footer
include("./app/view/footer.php");