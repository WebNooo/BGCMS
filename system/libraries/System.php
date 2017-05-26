<?php

namespace system;

class System{

    public static function run(){
        if (self::offline()) {
            Parse::notify();
            Temp::load('main');
            Temp::set("{headers}", self::headers());
            Temp::set("{ajax}", self::ajax());
            if (!empty(Temp::$result['info'])) {
                Temp::set("{info}", Temp::$result['info']);
                Temp::set("{content}", "");
            } else {
                Temp::set("{info}", "");
                Temp::set("{content}", "<div id='SContent'>" . Temp::$result['content'] . "</div>");
            }
            Temp::set("{login}", Temp::$result['login']);
            Temp::set("{vote}", Temp::$result['vote']);
            Temp::compile('main');
            echo Temp::$result['main'];
            Temp::gclear();
        } else {
            if (strpos(config::$site_offline_reason, "{include=") !== false)
                echo preg_replace_callback("#\\{include=(.+?)\\}#i", function ($matches) {
                    return file_get_contents(PUB . $matches[1]);
                }, config::$site_offline_reason);
            else
                Temp::load('offline');
            Temp::set('{reason}', config::$site_offline_reason);
            Temp::set('{charset}', config::$site_charset);
            Temp::compile('main');
            echo Temp::$result['main'];
            Temp::gclear();
        }
    }

    static function offline()
    {
        if (config::$site_offline == "no") {
            return true;
        } else if (User::isUser('is_admin') == 1 AND config::$site_offline == "yes") {
            return true;
        } else {
            return false;
        }
    }

    static function visitors()
    {
        if (!isset($_SESSION['visit'])) {
            Mysql::query("SELECT * FROM visitors WHERE v_ip='{$_SERVER['REMOTE_ADDR']}' AND v_date='" . mktime(0, 0, 0, date("d"), date("m"), date("Y")) . "'");
            if (Mysql::num() == 0) {
                Mysql::query("INSERT INTO visitors (v_ip, v_date, v_agent) VALUES ('" . $_SERVER['REMOTE_ADDR'] . "','" . mktime(0, 0, 0, date("d"), date("m"), date("Y")) . "', '" . $_SERVER['HTTP_USER_AGENT'] . "')");
                $_SESSION['visit'] = $_SERVER['REMOTE_ADDR'];
            }
        }
    }

    static function include_mods()
    {
        $getModules = Mysql::query("SELECT * FROM modules WHERE status='1'");
        foreach ($getModules as $mode) {
            $arr = explode("/",$mode['function']);
            if (is_callable("system\\" . $arr[0]."::".$arr[1]))
                call_user_func("system\\" . $arr[0]."::".$arr[1]);
            else
                echo "Error include mode " . $mode['title'];
        }
    }

    static function info($title, $error, $compile, $echo = false)
    {
        Temp::load('info');
        Temp::set('{error}', $error);
        Temp::set('{title}', $title);
        Temp::compile($compile);
        if ($echo) {
            echo Temp::$result[$compile];
        }
        Temp::clear();
    }


    public static function vote()
    {
        Temp::load("vote");
        Temp::compile('vote');
        Temp::clear();
    }

    static $title = "";

    public static function post($c, $f, $d)
    {
        switch ($c) {
            case "User":
                return User::$f(Parse::post($d));
                break;


            default:
                return self::$f(Parse::post($d));
                break;
        }
    }



//    static function genTitle()
//    {
//        if (!empty(Router::$route[2])) {
//            if (!empty(self::$title)) $title = " :: " . self::$title; else $title = "";
//            return config::$site_title . " :: " . Router::$route[2] . $title;
//        } else {
//            return config::$site_title;
//        }
//    }

    static function headers()
    {
        return "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=" . config::$site_charset . "\" />
    <title>" . self::$title . "</title>
    <meta name=\"description\" content=\"" . config::$site_description . "\" />
    <meta name=\"keywords\" content=\"" . config::$site_keywords . "\" />
    <meta name=\"generator\" content=\"BLackGame (https://BGSrv.ru)\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
    }

    static function ajax()
    {
        return "<script src='" . config::$site_adr . "ajax'></script>
<script src='" . config::$site_adr . "function'></script>
<script>var site = \"" . config::$site_adr . "\";
    var site_title_msg_info = \"Информация\";
    var site_title_msg_success = \"Выполнено\";
    var site_title_msg_danger = \"Ошибка\";
</script>";
    }


    static function exception()
    {
        lang::$error_2 = str_replace('{%site_adr%}', config::$site_adr, lang::$error_2);
        header("HTTP/1.0 404 Not Found");
        echo "
        <html>
            <head>
                <title>".lang::$error_1 . "</title>
            </head>
            <body>
            " . lang::$error_2 . "
            </body>
        </html>
        ";
        exit(0);
    }


}