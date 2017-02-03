<?php
global $info;
require_once SYS . "/init.php";

use system as s;
try {

    s\CMain::dModules();
    s\Router::dispatch();

}catch (exception $exception){

   echo <<<HTML

<html>
<head>
<title>Error</title>
</head>
<body>
<center>Извините возникла ошибка в работе скрипта, обратитесь к администратору или подождите ее исправления</center>
<center>
<textarea name="error text" id="" style="width: 90%;" rows="20">$exception</textarea>
</center>
</body>
</html>

HTML;
exit(0);

}
