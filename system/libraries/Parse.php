<?php

namespace system;

class Parse
{


    static $inform = array();

    public static function post($data)
    {
        global $a;
        $d = explode(";;", $data);
        foreach ($d as $v) {
            $v = explode('=', $v, 2);
            $a[$v[0]] = $v[1];
        }
        return $a;
    }

    public static function matches($pattern, $string)
    {
        $string_expl = explode("\n", $string);
        $m_return = array();
        $a = 0;
        $b = 0;
        while ($a < count($string_expl)) {
            $matches = null;
            $preg_match = preg_match($pattern, $string_expl[$a], $matches);
            if ($preg_match) {
                $m_return[$b] = $matches;
                $b++;
            }
            $a++;
        }
        return $m_return;
    }

    static function notify()
    {
        if (!empty(self::$inform)) {
            foreach (self::$inform as $key => $message) {
                //System::$title = lang::$imsg[$key];
                Temp::$result['info'] = "<div id='msg_{$key}'><b>" . lang::$imsg[$key] . ": </b>{$message}</div>";
            }
        }
    }

    public static function isValid($p, $v = "")
    {
        if (empty($v)) {
            if (preg_match("/^([a-zA-Z0-9_-])+$/", $p)) return true; else return false;
        } else if ($v == "int") {
            if (preg_match("/^([0-9_])+$/", $p)) return true; else return false;
        } else if ($v == "password") {
            if (preg_match('/^([0-9a-zA-Z!@#$%])+$/', $p)) return true; else return false;
        } else if ($v == "email") {
            if (filter_var($p, FILTER_VALIDATE_EMAIL)) return true; else return false;
        } else if ($v == "text") {
            if (preg_match("/^([a-zA-Z0-9_])+$/", $p)) return true; else return false;
        }
        return false;
    }

    public static function token($length = 6, $code = "")
    {
        $chars = "_abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $len = strlen($chars) - 1;
        while (strlen($code) < $length) $code .= $chars[mt_rand(0, $len)];
        return $code;
    }

    static function sklon($number, $one, $two, $five) {
        if (($number - $number % 10) % 100 != 10) {
            if ($number % 10 == 1) {
                $result = $one;
            } elseif ($number % 10 >= 2 && $number % 10 <= 4) {
                $result = $two;
            } else {
                $result = $five;
            }
        } else {
            $result = $five;
        }
        return $result;
    }

    public static function dateTime($time, $birthday = false)
    {
        if (config::$site_set_timezone == "yes") {
            date_default_timezone_set(config::$site_timezone);
        }
        global $month_name;
        $date = date('d.m.Y', $time);
        $date_time = date('H:i', $time);
        $date_exp = explode('.', $date);
        $min = round((time() - $time)/60);
        $sec = round((time() - $time));
        foreach (lang::$month as $key => $value) {
            if ($key == intval($date_exp[1])) $month_name = $value;
        }
        if ($birthday == true)
            return $date_exp[0] . ' ' . $month_name . ' ' . $date_exp[2];
        else {
            if ($sec < 55)
                return "$sec ".self::sklon($sec, 'секунду','секунды','секунд')." назад";
            elseif( $min < 55 ) return "$min ".self::sklon($min, 'минуту','минуты','минут')." назад";
            elseif ($date == date('d.m.Y', time()))
                return 'сегодня в ' . $date_time;
            elseif ($date == date('d.m.Y', strtotime('-1 day')))
                return 'вчера в ' . $date_time;
            elseif ($date_exp[2] == date("Y"))
                return $date_exp[0] . ' ' . $month_name . ' в ' . $date_time;
            else
                return $date_exp[0] . ' ' . $month_name . ' ' . $date_exp[2] . ' в ' . $date_time;
        }
    }

    static function addhttp($url)
    {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url . "/";
        }
        return $url;
    }

    static function parsePost($text)
    {
        $text = preg_replace("#\[site_title\]#ims", config::$site_title, $text);
        $text = preg_replace("#\[user\]#ims", (User::isUser()) ? User::isUser('username') : "Гость", $text);
        return $text;
    }

    static function jsi($type, $message="")
    {

        if (is_array($message)) {
            $msg = "<ul style='list-style-type: circle; padding-left: 7px;'>";
            foreach ($message as $value) {
                $msg .= "<li>" . $value . "</li>";
            }
            echo json_encode(
                array('type' => $type, 'message' => $msg . "</ul>")
            );
        } else {
            echo json_encode(
                array('type' => $type, 'message' => $message)
            );
        }

    }

}