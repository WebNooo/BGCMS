<?php

namespace system;

class CStatic
{

    static function index($page)
    {

        Mysql::query("SELECT * FROM static WHERE `name`='".Mysql::safesql($page)."'");
        if (Mysql::num() > 0) {
            $pages = Mysql::assoc();
            CMain::$title = $pages['description'];

            Temp::$result['speedbar'] .= " » " . $pages['description'];
            Temp::load("static");
            Temp::set_block("'{(.*?)}'si", "");
            Temp::set("{description}", $pages['description']);
            Temp::set("{static}", $pages['static']);
            Temp::compile('content');
            Temp::clear();

        } else Parse::$inform['info'] = "Страница не найдена";

    }

}