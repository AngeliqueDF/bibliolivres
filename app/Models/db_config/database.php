<?php

$ini = parse_ini_file("app.ini", TRUE, INI_SCANNER_NORMAL);

$db_config = [];

$db_config["db_host"] = $ini["local"]["db_host"];
$db_config["db_name"] = $ini["local"]["db_name"];
$db_config["db_charset"] = $ini["local"]["db_charset"];
$db_config["db_user"] = $ini["local"]["db_user"];
$db_config["db_password"] = $ini["local"]["db_password"];
