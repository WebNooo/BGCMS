<?php

session_start();

require_once SYS . "/data/config.php";
require_once SYS . "/data/dbconfig.php";
require_once SYS . "/data/lang/".\system\config::$site_lang."/site.php";

function __autoload( $class_name ) {
    $class_name = str_replace( "system\\", "", $class_name );
    $file = sprintf('%s/libraries/%s.php', SYS, $class_name);
    if (is_file($file)) require_once $file;
    $file1 = sprintf('%s/controllers/%s.php', SYS, $class_name);
    if (is_file($file1)) require_once $file1;

}