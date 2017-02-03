<?php

namespace admin;

use system\User;

class AMain
{

    static $controller = "";
    static $mode = "";


    static function main()
    {
        if (User::isUser() && User::getUser()['is_admin'] == 1) {
            $user = User::getUser();
            include(SYS . "/admin/views/header.php");
            if (empty(self::$mode) AND empty(self::$controller)) {
                $call = "admin\\AMain::index";
            } else if (!empty(self::$controller) AND empty(self::$mode)) {
                $call = "admin\\A" . ucfirst(self::$controller) . "::index";
            } else if (!empty(self::$controller) AND !empty(self::$mode)) {
                $call = "admin\\A" . ucfirst(self::$controller) . "::" . self::$mode;
            } else $call = "admin\\AMain::index";

            if (is_callable($call))
                call_user_func($call);
            else
                self::info("Модуль который вы запрашиваете не найден!", "info");

            include(SYS . "/admin/views/footer.php");
        } else {
            echo "not user";
        }
    }

    static function index()
    {
        include SYS . "/admin/views/main.php";
    }

    static function info($msg, $type)
    {
        echo "<div class='card'><div class='card__header'><h2>Что то пошло не так</h2></div><div class='card__body'><div class=\"alert alert-$type\"><b>$msg</b></div></div></div>";
    }

    //java script info
    static function jsi($t, $v)
    {
        echo json_encode(
            array('type' => $t, 'text' => $v)
        );
    }

}