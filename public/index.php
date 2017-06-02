<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

define('PUB', dirname(__FILE__));
define('SYS', dirname(dirname(__FILE__))."/system");

require_once SYS ."/init.php";
system\Router::dispatch();
system\System::include_mods();
system\System::run();

//\system\Mail::send("webnooo@gmail.com", "<div style='color: red;'>BlackGame Message</div>");
