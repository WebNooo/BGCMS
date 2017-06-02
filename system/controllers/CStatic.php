<?php

namespace system;

class CStatic
{

    static function index($page)
    {
        if (Parse::isValid($page)) {
            if (Mysql::query("SELECT * FROM static WHERE `name`='" . Mysql::safesql($page) . "'")) {
                if (Mysql::num() > 0) {
                    $pages = Mysql::assoc();
                    //Temp::$result['speedbar'] .= " » " . $pages['description'];
                    Temp::load("static");
                    Temp::set_block("'{(.*?)}'si", "");
                    Temp::set("{description}", $pages['description']);
                    Temp::set("{static}", $pages['static']);
                    Temp::compile('content');
                    Temp::clear();

                } else System::exception();
            }
        }else System::exception();

    }

}