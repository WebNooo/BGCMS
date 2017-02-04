<?php
namespace system;

class CForum
{
    static $speedBar = array();

    static function tempForum()
    {
        self::speedBar();
        Temp::load('forum');
        Temp::set('{forum}', Temp::$result['forum']);
        Temp::compile('content');
        Temp::clear();
    }

    static function speedBar(){
        //if (!empty(self::$speedBar) or is_array(self::$speedBar)) {
            $speedBar1 = "";
        var_dump(self::$speedBar);
        foreach (self::$speedBar as $value) {
                if (isset($value[1])) {
                    $speedBar1 .= " > " . "<a href='javascript:history.go(-1)'>" . $value[0] . "</a>";
                } else {
                    $speedBar1 .= " > " . $value[0];
                }
            }
            Temp::$result['speedbar'] .= $speedBar1;
        //
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
            Temp::set('{forum-link}', "/forum/topic/".$sub['id_topic']."-".str_replace(lang::$main, lang::$end, str_replace(" ", "-", $sub['title_topic']).".html"));
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

    static function topic($id=null){
        Temp::$result['forum_sub'] = "";
        $topic = Mysql::squery("SELECT forum_topic.*, users.* FROM forum_topic, users WHERE forum_topic.id_topic='{$id}' AND users.id=forum_topic.author_topic");
            Temp::load('forum_topic');
            Temp::set('{photo}', User::photoUser($topic['id']));
            Temp::set('{author}', $topic['username']);
            Temp::set('{name}', $topic['title_topic']);
            Temp::set('{text}', $topic['text_topic']);
            Temp::compile('forum');
            Temp::clear();
        self::$speedBar = array(array("test","test"),array("test2"));
        self::tempForum();
    }


}