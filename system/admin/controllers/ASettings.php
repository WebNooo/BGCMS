<?php

namespace admin;

use system\config;
use system\Mysql;
use system\Parse;
use system\timezone;
use system\User;
use admin\lang;

class ASettings
{

    static function index()
    {
        if (User::isUser() && User::getUser()['admin_settings'] == 1) {

            require_once SYS . "/data/timezone.php";

            echo "
                <div class=\"card\">
                    <div class=\"card__header\">
                        <h2>" . lang::$setting_title . " <small>" . lang::$setting_desc . "</small></h2>
                    </div>

                    <div class=\"card__body form-horizontal\">
                    
                    <div class=\"tab\">
                            <ul class=\"tab-nav tab-nav--justified\">
                                <li class=\"active\"><a href=\"#tab-main-2\" data-toggle=\"tab\" aria-expanded=\"true\">" . lang::$setting_main . "</a></li>
                                <li class=\"\"><a href=\"#tab-admin-2\" data-toggle=\"tab\" aria-expanded=\"false\">" . lang::$setting_admin . "</a></li>
                                <li class=\"\"><a href=\"#tab-user-2\" data-toggle=\"tab\" aria-expanded=\"false\">" . lang::$setting_user . "</a></li>
                                <li class=\"\"><a href=\"#tab-mail-2\" data-toggle=\"tab\" aria-expanded=\"false\">" . lang::$setting_mail . "</a></li>
                                <li class=\"\"><a href=\"#tab-news-2\" data-toggle=\"tab\" aria-expanded=\"false\">" . lang::$setting_post . "</a></li>
                                <li class=\"\"><a href=\"#tab-comments-2\" data-toggle=\"tab\" aria-expanded=\"false\">" . lang::$setting_comments . "</a></li>
                            </ul>

                            <div class=\"tab-content\">
                                <div class=\"tab-pane active\" id=\"tab-main-2\">
                                    " . self::input("site_title") .
                self::input("site_short_name") .
                self::select("site_skin", self::getTemp()) .
                self::select("site_charset", array('utf8' => "UTF-8", 'cp1251' => "CP1251")) .
                self::input("site_adr") .
                self::input("site_index_mode") .
                self::text("site_description") .
                self::text("site_keywords") .
                self::select("site_lang", self::getLang()) .
                self::radio("site_set_timezone") .
                self::select("site_timezone", timezone::$timezones) .
                self::input("site_separator") .
                self::radio("site_offline") .
                self::text("site_offline_reason") . "
                                </div>
                            
                                <div class=\"tab-pane\" id=\"tab-admin-2\">
                                
                                    " . self::input("admin_file") . "
                                </div>
                            
                                <div class=\"tab-pane\" id=\"tab-user-2\">
                                    " . self::select("user_group", self::getGroups()) .
                self::radio("user_allow_register") .
                self::input("user_min_username") .
                self::input("user_min_password") .
                self::input("user_user_one_ip") . "
                                </div>
                                
                                <div class=\"tab-pane\" id=\"tab-mail-2\">
                                
                                    " . self::input("email_title") . "
                                    " . self::input("email_from_adr") . "
                                </div>
                                    
                                <div class=\"tab-pane\" id=\"tab-news-2\">
                                    " . self::input("post_on_page") . "
                                    " . self::select("post_navigate", array('top' => 'С верху', 'bottom' => 'С низу', 'top_bottom' => 'Сверху и снизу')) . "
                                    " . self::radio("post_hide_full_link") . "
                                </div>
                                    
                                <div class=\"tab-pane\" id=\"tab-comments-2\">
                                    " . self::input("comment_max_page") . "
                                </div>
                            </div>
                    
                       
                        <div class=\"form-group\">
                            <div class=\"col-sm-offset-5\">
                                <button class=\"btn btn-success\" onclick='save()'><i class='zmdi zmdi-save'></i> " . lang::$setting_save . "</button>
                            </div>
                        </div>
                    </div>
                </div>";
        } else {
            AMain::info(lang::$session_not_found, "info");
        }
    }

    static function getTemp()
    {
        $_arr = array();
        if (!$handle = opendir(PUB . "/templates")) {
            die(lang::$folder_not_found . " ./templates");
        }
        while (FALSE !== ($file = readdir($handle))) {
            if (is_dir(PUB . "/templates/$file") and ($file != "." and $file != "..")) {
                $_arr[$file] = $file;
            }
        }
        closedir($handle);
        return $_arr;
    }

    static function getGroups()
    {
        $arr_group = array();
        foreach (Mysql::query("SELECT * FROM groups") as $group) {
            $arr_group[$group['idg']] = $group['title'];
        }
        return $arr_group;
    }

    static function getLang()
    {
        $_arr_lng = array();
        if (!$handle = opendir(SYS . "/data/lang")) {
            die(lang::$folder_not_found . " ./lang");
        }
        while (FALSE !== ($file = readdir($handle))) {
            if (is_dir(SYS . "/data/lang/$file") and ($file != "." and $file != "..")) {
                $_arr_lng[$file] = $file;
            }
        }
        closedir($handle);
        return $_arr_lng;
    }

    static function input($name, $desc = "")
    {
        $mode = "setting_" . $name;

        return "<div class=\"form-group\">
                        <label class=\"col-sm-2 control-label\">" . lang::$$mode . "</label>
                    <div class=\"col-sm-10\">
                        <input type=\"text\" name='save[$name]' class=\"form-control\" value='" . config::$$name . "'>
                    </div>
                </div>";
    }

    static function text($name, $desc = "")
    {
        $mode = "setting_" . $name;

        return "<div class=\"form-group\">
                        <label class=\"col-sm-2 control-label\">" . lang::$$mode . "</label>
                    <div class=\"col-sm-10\">
                        <textarea name='save[$name]' rows='4' class=\"form-control\">" . config::$$name . "</textarea>
                    </div>
                </div>";
    }

    static function select($name, $options)
    {
        $mode = "setting_" . $name;

        $output = "<div class=\"form-group\">
                        <label class=\"col-sm-2 control-label\">" . lang::$$mode . "</label>
                        <div class=\"col-sm-3\">
                            <select class='select2' name=\"save[$name]\">\r\n";
        foreach ($options as $value => $description) {
            $output .= "<option value=\"$value\"";
            if (config::$$name == $value) {
                $output .= " selected ";
            }
            $output .= ">$description</option>\n";
        }
        $output .= "</select></div></div>";

        return $output;
    }

    static function radio($name)
    {
        $mode = "setting_" . $name;

        $radio = "<div class=\"form-group\"><label class=\"col-sm-2 control-label\">" . lang::$$mode . "</label><div class=\"col-sm-3\"><label class=\"radio-inline\">";
        if (config::$$name == "yes") $ch = "checked"; else $ch = "";
        $radio .= "<input type=\"radio\" name=\"save[$name]\" value=\"yes\" $ch><i class=\"input-helper\"></i>" . lang::$yes . "</label><label class=\"radio-inline\">";
        if (config::$$name == "no") $ch1 = "checked"; else $ch1 = "";
        $radio .= "<input type=\"radio\" name=\"save[$name]\" value=\"no\" $ch1><i class=\"input-helper\"></i>" . lang::$no . "</label></div></div>";
        return $radio;
    }


    static function save($data)
    {
        if (User::isUser() == true && User::getUser()['admin_settings'] == 1) {
            global $save;
            if (!$handler = @fopen(SYS . '/data/config.php', "w")) {
                return AMain::jsi('danger', lang::$setting_error_write_file);
            } else {
                $save = "<?php\n\n//File BGSystem configuration\n//Author: Jony Kook (BGSrv.ru)\n\nnamespace system;\n\nclass config{\n\n";
                $data['save[site_adr'] = Parse::addhttp($data['save[site_adr']);
                foreach ($data as $value => $key) {
                    $save .= "  static $" . str_replace("save[", "", $value) . " = \"$key\";\n\n";
                }
                $save .= "}";
                if (!@fwrite($handler, $save)) {
                    return AMain::jsi('danger', lang::$setting_error_write_file);
                } else {
                    return AMain::jsi('success', lang::$setting_success_save);
                }
            }
        } else {
            return AMain::jsi('danger', lang::$session_not_found);
        }
    }

}