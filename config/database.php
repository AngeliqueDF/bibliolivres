<?php

$ini = parse_ini_file("app.ini", TRUE, INI_SCANNER_NORMAL);

$db_host    = $ini["local"]["db_host"];
$db_name    = $ini["local"]["db_name"];
$db_charset = $ini["local"]["db_charset"];
$db_user    = $ini["local"]["db_user"];
$db_password= $ini["local"]["db_password"];