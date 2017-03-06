<?php

namespace system;

final class Router
{
    public static $routes = array();
    public static $route;
    public static $requestedUrl = '';
    public static $line = array();
    private static $params = array();
    static $breadcrumbs = array();


    public static function getRouting()
    {
        $file_handle = fopen(SYS . "/data/routing.php", "r");
        while (!feof($file_handle)) {
            self::$line[] = explode('|', str_replace("{%index%}", config::$site_index_mode, trim(fgets($file_handle))));
        }
        fclose($file_handle);
        self::$routes = array_merge(self::$routes, self::$line);
    }

    public static function splitUrl($url)
    {
        return preg_split('/\//', $url, -1, PREG_SPLIT_NO_EMPTY);
    }

    public static function getCurrentUrl()
    {
        return (self::$requestedUrl ?: '/');
    }

//    static function breadcrumbs()
//    {
////        self::$breadcrumbs = self::splitUrl($_SERVER['REQUEST_URI']);
////        echo  $_SERVER['REQUEST_URI'];
////        Temp::$breadcrumbs = "<a href='" . config::$site_adr . "'>" . config::$site_short_name . "</a> » ";
////        $total = count(self::$breadcrumbs) - 1;
////
////        if (!empty(self::$breadcrumbs)) {
////            for ($i = 0; $i <= $total; $i++) {
////                if ($i == $total) {
////                    Temp::$breadcrumbs .= ($total==1) ? self::$breadcrumbs[$i] : self::$route[2];
////                } else {
////                    Temp::$breadcrumbs .= "<a href='".self::$route[0]."'>" . self::$route[2] . "</a> » ";
////                }
////            }
////        } else Temp::$breadcrumbs .= self::$route[2];
//
//        $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
//        foreach($crumbs as $crumb){
//            Temp::$breadcrumbs= ucfirst(str_replace(array(".html","_"),array(""," "),$crumb) . ' ');
//        }
//    }

    static function breadcrumbs($separator = ' &raquo; ', $home = 'Home') {
        $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
        $base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
        $breadcrumbs = Array("<a href=\"$base\">$home</a>");
        $last = 1;
        $count = count($path);
        foreach ($path AS $x => $crumb) {
            $title = ucwords(str_replace(Array('.html', '_'), Array('', ' '), $crumb));
            if ($count != $last)
                $breadcrumbs[] = "<a href=\"$base$crumb\">$title</a>";
            else
                $breadcrumbs[] = $title;

            $last++;
        }

        // Build our temporary array (pieces of bread) into one big string :)
        Temp::$breadcrumbs = implode($separator, $breadcrumbs);
    }

    public static function dispatch($requestedUrl = null)
    {
        self::getRouting();
        if ($requestedUrl === null) {
            $uri = explode('?', $_SERVER["REQUEST_URI"]);
            $page = reset($uri);
            $requestedUrl = urldecode(rtrim($page, '/'));
        }

        self::$requestedUrl = $requestedUrl;
        if (isset(self::$routes[$requestedUrl])) {
            self::$params = self::splitUrl(self::$routes[$requestedUrl]);
            return self::executeAction();
        }

        foreach (self::$routes as self::$route) {

            if (strpos(self::$route[0], ':') !== false) {
                self::$route[0] = str_replace(':any', '(.+)', str_replace(':num', '([0-9]+)', self::$route[0]));
            }

            self::$route[1] = preg_replace('#^' . self::$route[0] . '$#', self::$route[1], $requestedUrl);
            if (preg_match('#^' . self::$route[0] . '$#', $requestedUrl)) {
                if (strpos(self::$route[1], '$') !== false && strpos(self::$route[0], '(') !== false) {
                }
                self::$params = self::splitUrl(self::$route[1]);
                break;
            }
        }
        return self::executeAction();
    }

    public static function executeAction()
    {
        $c_a = explode("/", config::$site_index_mode);
        $controller = isset(self::$params[0]) ? self::$params[0] : $c_a[0];
        $action = isset(self::$params[1]) ? self::$params[1] : $c_a[1];
        $params = array_slice(self::$params, 2);
        if (self::$route[3] == "yes") {
            if (User::isUser()) return self::calling($controller, $action, $params); else return Parse::$inform['info'] = "У вас нет доступа к данной странице";
        } else
            return self::calling($controller, $action, $params);
    }

    private static function calling($controller, $action, $params)
    {
        self::breadcrumbs();
        if (is_callable(array("system\\" . $controller, $action))) {
            return call_user_func_array(array("system\\" . $controller, $action), $params);
        } else {
            Parse::$inform['danger'] = "Невозможно подгрузить модуль " . $controller . "::" . $action;
            return "";
        }
    }
}
