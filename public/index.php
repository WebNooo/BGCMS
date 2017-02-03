<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

define('PUB', dirname(__FILE__));
define('SYS', dirname(dirname(__FILE__))."/system");

require_once SYS ."/core.php";
\system\CMain::main();

