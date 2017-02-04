<?php
namespace system;

class CForum
{

    static function tempForum()
    {
        Temp::load('forum');
        Temp::set('{forum}', Temp::$result['forum']);
        Temp::compile('content');
        Temp::clear();
    }

    static function index()
    {
        CMain::$title = "Форум";
        foreach (Mysql::query('SELECT * FROM forum') as $forum) {
            Temp::$result['forum_sub'] = "";
            foreach (Mysql::query("SELECT * FROM forum_sub WHERE forum_id='{$forum['id_forum']}'") as $sub) {
                Temp::load('forum_sub_theme');
                Temp::set('{name}', $sub['name_sub']);
                Temp::set('{forum-link}', "/forum/".$sub['id_sub']."-".str_replace(lang::$main, lang::$end, str_replace(" ", "-", $sub['name_sub']).".html"));
                Temp::compile('forum_sub');
                Temp::clear();
            }

            Temp::load('forum_theme');
            Temp::set('{name}', $forum['name_forum']);
            Temp::set('{forum_sub}', Temp::$result['forum_sub']);
            Temp::compile('forum');
            Temp::clear();
        }
        self::tempForum();
    }

    static function forum($id=null){
        Temp::$result['forum_sub'] = "";
        foreach (Mysql::query("SELECT * FROM forum_topic WHERE id_sf='{$id}'") as $sub) {
            Temp::load('forum_sub_theme');
            Temp::set('{name}', $sub['title_topic']);
            Temp::set('{id}', $sub['id_topic']);
            Temp::compile('forum_sub');
            Temp::clear();
        }

        Temp::load('forum_theme');
        Temp::set('{name}', $id);
        Temp::set('{id}', $id);
        Temp::set('{forum_sub}', Temp::$result['forum_sub']);
        Temp::compile('forum');
        Temp::clear();

        self::tempForum();
    }

    static function topic(){

    }


}