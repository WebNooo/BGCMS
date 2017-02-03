<?php

namespace system;

final class Router
{
    public static $routes = array();
    public static $route;
    public static $requestedUrl = '';
    public static $line = array();
    private static $logged = false;
    private static $params = array();

    public static function getRouting()
    {
        $file_handle = fopen(SYS . "/data/routing.php", "r");
        while (!feof($file_handle)) {
            self::$line[] = explode('|', str_replace("{%index%}", config::$site_index_mode, fgets($file_handle)));
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
            Temp::$result['speedbar'] = "<a href='" . config::$site_adr . "'>" . config::$site_short_name . "</a> » ";
            Temp::$result['speedbar'] .= (isset(self::$route[2])) ? self::$route[2] : lang::$page_index;

            if (strpos(self::$route[0], ':') !== false) {
                self::$route[0] = str_replace(':any', '(.+)', str_replace(':num', '([0-9]+)', self::$route[0]));
            }
            self::$logged = (isset(self::$route[3]) == true) ? true : false;

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
        if (self::$logged) {
            if (User::isUser()) return self::calling($controller, $action, $params); else Parse::$inform['info'] = "У вас нет доступа к данной странице";
        } else return self::calling($controller, $action, $params);
    }

    private static function calling($controller, $action, $params)
    {
        if (is_callable(array("system\\" . $controller, $action))) {
            return call_user_func_array(array("system\\" . $controller, $action), $params);
        } else {
            Parse::$inform['danger'] = "Невозможно подгрузить модуль " . $controller . "::" . $action;
            return "";
        }
    }
}
