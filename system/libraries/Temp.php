<?php
namespace system;

class Temp
{
    static $dir = '.';
    static $template = NULL;
    static $copy_template = NULL;
    static $data = array();
    static $block_data = array();
    static $result = array('content' => '', 'info' => '', 'breadcrumbs' => "", 'title' => "", 'reply' => "", 'vote'=>"");
    static $template_parse_time = 0;
    static $breadcrumbs = "";
    static $folder = "";

    public static function set($name, $var)
    {
        self::$data[$name] = $var;
    }

    public static function set_block($name, $var)
    {
        if (is_array($var) && count($var)) {
            foreach ($var as $key => $key_var) {
                self::set_block($key, $key_var);
            }
        } else self::$block_data[$name] = $var;
    }

    public static function load($tpl_name)
    {
        if (empty(self::$folder))
            self::$dir = PUB . "/templates/" . config::$site_skin;
        else
            self::$dir = PUB . "/templates/" . config::$site_skin."/".self::$folder;

        $time_before = self::get_real_time();
        if ($tpl_name == '' || !file_exists(self::$dir . DIRECTORY_SEPARATOR . $tpl_name . ".tpl")) {
            die (lang::$temp_1 . ": <b>" . self::$dir . DIRECTORY_SEPARATOR . $tpl_name . ".tpl</b>");
        }
        self::$template = file_get_contents(self::$dir . DIRECTORY_SEPARATOR . $tpl_name . ".tpl");
        self::$template = str_replace('{skin}', "/templates/" . config::$site_skin, self::$template);
        self::$template = str_replace('{site_adr}', config::$site_adr, self::$template);
        self::$template = str_replace('{breadcrumbs}', self::$breadcrumbs, self::$template);
//        if (stristr(self::$template, "{include file=")) {
//            self::$template = preg_replace_callback("#\\{include file=['\"](.+?)['\"]\\}#ies", array("self", 'sub_load_template'), self::$template);
//        }
        if (strpos(self::$template, "[user") !== false OR strpos(self::$template, "[not-user") !== false) {
            self::$template = self::check_group(self::$template);
        }
        self::$copy_template = self::$template;
        self::$template_parse_time += self::get_real_time() - $time_before;

        return TRUE;
    }

    public static function get_real_time()
    {
        list($seconds, $microSeconds) = explode(' ', microtime());

        return ((float)$seconds + (float)$microSeconds);
    }

    public static function sub_load_template($tpl_name)
    {
        if ($tpl_name == '' || !file_exists(self::$dir . DIRECTORY_SEPARATOR . $tpl_name)) {
            die ("Невозможно загрузить шаблон: <b>" . $tpl_name);

        }
        $template = file_get_contents(self::$dir . DIRECTORY_SEPARATOR . $tpl_name);

        if (strpos($template, "[user") !== false OR strpos($template, "[not-user") !== false) {
            $template = self::check_group($template);
        }

        return $template;
    }

    public static function clear()
    {
        self::$data = array();
        self::$block_data = array();
        self::$copy_template = NULL;
        self::$template = NULL;
        self::$folder = "";
    }

    public static function gclear()
    {
        self::$data = array();
        self::$block_data = array();
        self::$result = array();
        self::$copy_template = NULL;
        self::$template = NULL;
        self::$folder = "";
    }

    static function declination($matches = array())
    {

        $matches[1] = str_replace(' ', '', $matches[1]);
        $matches[1] = intval($matches[1]);
        $words = explode('|', trim($matches[2]));
        $parts_word = array();

        switch (count($words)) {
            case 1:
                $parts_word[0] = $words[0];
                $parts_word[1] = $words[0];
                $parts_word[2] = $words[0];
                break;
            case 2:
                $parts_word[0] = $words[0];
                $parts_word[1] = $words[0] . $words[1];
                $parts_word[2] = $words[0] . $words[1];
                break;
            case 3:
                $parts_word[0] = $words[0];
                $parts_word[1] = $words[0] . $words[1];
                $parts_word[2] = $words[0] . $words[2];
                break;
            case 4:
                $parts_word[0] = $words[0] . $words[1];
                $parts_word[1] = $words[0] . $words[2];
                $parts_word[2] = $words[0] . $words[3];
                break;
        }

        $word = $matches[1] % 10 == 1 && $matches[1] % 100 != 11 ? $parts_word[0] : ($matches[1] % 10 >= 2 && $matches[1] % 10 <= 4 && ($matches[1] % 100 < 10 || $matches[1] % 100 >= 20) ? $parts_word[1] : $parts_word[2]);

        return $word;
    }

    static function check_group($matches)
    {
        $regex = '/\[(user|not-user)\]((?>(?R)|.)*?)\[\/\1\]/is';
        if (is_array($matches)) {
            if ($matches[1] == "user") $action = true; else $action = false;
            $block = $matches[2];
            if ($action) {

                if (!User::isUser()) $matches = ''; else $matches = $block;

            } else {

                if (User::isUser()) $matches = ''; else $matches = $block;

            }
        }

        return preg_replace_callback($regex, array('self', 'check_group'), $matches);
    }

    public static function compile($tpl)
    {
        $find = array();
        $replace = array();
        $find_preg = array();
        $replace_preg = array();
        $time_before = self::get_real_time();
        foreach (self::$data as $key_find => $key_replace) {
            $find[] = $key_find;
            $replace[] = $key_replace;
        }
        $result = str_replace($find, $replace, self::$copy_template);
        if (count(self::$block_data)) {
            foreach (self::$block_data as $key_find => $key_replace) {
                $find_preg[] = $key_find;
                $replace_preg[] = $key_replace;
            }

            $result = preg_replace($find_preg, $replace_preg, $result);
        }

        if (strpos($result, "[declination=") !== false) {
            $result = preg_replace_callback("#\\[declination=(.+?)\\](.+?)\\[/declination\\]#is", array('self', 'declination'), $result);
        }

        if (isset(self::$result[$tpl])) self::$result[$tpl] .= $result; else self::$result[$tpl] = $result;
        self::_clear();
        self::$template_parse_time += self::get_real_time() - $time_before;

    }

    public static function _clear()
    {
        self::$data = array();
        self::$block_data = array();
        self::$copy_template = self::$template;
    }
}