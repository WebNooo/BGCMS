<?php
session_start();
ini_set("display_errors",1);
error_reporting(E_ALL);

define('PUB', dirname(__FILE__));
define('SYS', dirname(dirname(__FILE__))."/system");

require_once SYS . "/data/config.php";
require_once SYS . "/data/dbconfig.php";
require_once SYS . "/data/lang/".\system\config::$site_lang."/admin.php";

function __autoload( $class_name ) {
    $class_name = str_replace( "system\\", "", $class_name );
    $file = sprintf('%s/libs/%s.php', SYS, $class_name);
    if (is_file($file)) require_once $file;
    $class_name = str_replace( "admin\\", "", $class_name );
    $file = sprintf('%s/admin/controllers/%s.php', SYS, $class_name);
    if (is_file($file)) require_once $file;
}
\admin\AMain::$controller = (empty($_GET['c'])) ? "" : $_GET['c'];
\admin\AMain::$mode = (empty($_GET['f'])) ? "" : $_GET['f'];
\admin\AMain::main();