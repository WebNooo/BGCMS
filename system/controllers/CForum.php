<?php
namespace system;

class CForum
{

    static function index()
    {
        CMain::$title = "Форум";
        foreach (Mysql::query('SELECT * FROM forum') as $forum) {
            Temp::$result['forum_sub'] = "";
            foreach (Mysql::query("SELECT * FROM forum_sub WHERE forum_id='{$forum['id_forum']}'") as $sub) {
                Temp::load('forum_sub_theme');
                Temp::set('{name}', $sub['name_sub']);
                Temp::set('{id}', $sub['id_sub']);
                Temp::compile('forum_sub');
                Temp::clear();
            }

            Temp::load('forum_theme');
            Temp::set('{name}', $forum['name_forum']);
            Temp::set('{id}', $forum['id_forum']);
            Temp::set('{forum_sub}', Temp::$result['forum_sub']);
            Temp::compile('forum');
            Temp::clear();
        }

        Temp::load('forum');
        Temp::set('{forum}', Temp::$result['forum']);
        Temp::compile('content');
        Temp::clear();

    }


}