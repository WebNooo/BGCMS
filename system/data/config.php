<?php

//File BGSystem configuration
//Author: Jony Kook (BGSrv.ru)

namespace system;

class config
{

    static $site_title = "BlackGame";

    static $site_short_name = "BlackGame";

    static $site_skin = "default";

    static $site_charset = "utf-8";

    static $site_adr = "https://bgsrv.ru/";

    static $site_index_mode = "CPost/index";

    static $site_description = "Система управления вашим сайтом с набором модулей для управления игровыми серверами";

    static $site_keywords = "black, game, blackgame, cms, bg, панель управления, игры";

    static $site_lang = "ru";

    static $site_set_timezone = "no";

    static $site_timezone = "Europe/Moscow";

    static $site_offline = "no";

    static $site_offline_reason = "{include=/shared/site_offline.html}";

    static $admin_file = "admin.php";

    static $user_group = "4";

    static $user_allow_register = "yes";

    static $user_min_username = "3";

    static $user_min_password = "6";

    static $user_user_one_ip = "2";

    static $post_on_page = "10";

    static $post_navigate = "bottom";

    static $post_hide_full_link = "yes";

    static $comment_max_page = "10";

}