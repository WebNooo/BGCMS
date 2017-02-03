<?php

namespace system;

class CPost
{

    static $pages;
    static $pagesUrl;

    static function index($page = "")
    {
        CMain::$title = "Главная страница";
        self::$pages = self::pages($page);
        $posts = Mysql::query("SELECT posts.*, users.*, category.* FROM posts, users, category WHERE users.id = posts.author AND posts.category=category.id_cat AND posts.publish=1 ORDER BY posts.fixed desc, posts.add_date DESC LIMIT " . self::$pages['start'] . "," . config::$post_on_page);
        if (Mysql::num() > 0) {
            self::$pagesUrl = config::$site_adr . "post/page/";
            self::shortGenTemp($posts);
        } else {
            Parse::$inform['info'] = "Новостей на найдено!";
        }
    }

    static function pages($count, $where = "", $table = "")
    {
        if (empty($table)) $table = "posts";
        if (!empty($where)) $w = $where; else $w = "publish=1";
        Mysql::query("SELECT *  FROM {$table} WHERE {$w}");
        $e = Mysql::num();
        $quantity = ($e == 0) ? 1 : $e;
        Mysql::clear();
        $total = intval(($quantity - 1) / config::$post_on_page + 1);
        if (empty($count) or $count < 0) $count = 1;
        if ($count > $total) $count = $total;
        $data['start'] = $count * config::$post_on_page - config::$post_on_page;
        $data['count'] = $count;
        $data['total'] = $total;
        return $data;
    }

    static function pagesTemp($count, $total)
    {
        Temp::load('pages');
        if ($count != 1) {
            Temp::set('[first]', "<a href='" . self::$pagesUrl . "1'>");
            Temp::set('[/first]', "</a>");
            Temp::set('[prev]', "<a href='" . self::$pagesUrl . ($count - 1) . "'>");
            Temp::set('[/prev]', "</a>");
        } else {
            Temp::set_block("'\\[first\\](.*?)\\[/first\\]'si", "");
            Temp::set_block("'\\[prev\\](.*?)\\[/prev\\]'si", "");
        }
        if ($count != $total) {
            Temp::set('[next]', "<a href='" . self::$pagesUrl . ($count + 1) . "'>");
            Temp::set('[/next]', "</a>");
            Temp::set('[last]', "<a href='" . self::$pagesUrl . $total . "'>");
            Temp::set('[/last]', "</a>");
        } else {
            Temp::set_block("'\\[last\\](.*?)\\[/last\\]'si", "");
            Temp::set_block("'\\[next\\](.*?)\\[/next\\]'si", "");
        }
        $page2left = ($count - 2 > 0) ? '<a href="' . self::$pagesUrl . ($count - 2) . '">' . ($count - 2) . '</a>' : "";
        $page1left = ($count - 1 > 0) ? '<a href="' . self::$pagesUrl . ($count - 1) . '">' . ($count - 1) . '</a>' : "";
        $page2right = ($count + 2 <= $total) ? '<a href="' . self::$pagesUrl . ($count + 2) . '">' . ($count + 2) . '</a>' : "";
        $page1right = ($count + 1 <= $total) ? '<a href="' . self::$pagesUrl . ($count + 1) . '">' . ($count + 1) . '</a>' : "";
        if ($total > 1) {
            Temp::set('{pages}', $page2left . $page1left . '<a class="current" >' . $count . '</a>' . $page1right . $page2right);
            Temp::compile('content');
        }
        Temp::clear();
    }

    static function fullPost($id = null)
    {
        if ($id != null) {
            if (Parse::isValid($id, "int") != false) {
                Mysql::query("SELECT posts.*, users.* FROM posts, users WHERE id_post='" . Mysql::safesql($id) . "' AND users.id = posts.author");
                if (Mysql::num() >= 1) {
                    $post = Mysql::assoc();
                    CComments::addComments();
                    CComments::comments($id);
                    CMain::$title = $post['title'];
                    Temp::$result['speedbar'] .= " » " . $post['title'];

                    Mysql::query("SELECT * FROM comments WHERE id_p='{$post['id_post']}'");
                    if (Mysql::num() >= 10) {
                        Temp::load('uploading_page');
                        Temp::compile('navigation');
                        Temp::clear();
                    }

                    Temp::load('post-full');
                    Temp::set("{title}", $post['title']);
                    Temp::set("{comments}", "<div id='SComments'>" . Temp::$result['comments'] . "</div>");
                    Temp::set("{addcomments}", Temp::$result['addcomments']);
                    Temp::set("{navigation}", (isset(Temp::$result['navigation'])) ? Temp::$result['navigation'] : "");
                    Temp::set("{full}", Parse::parsePost($post['full']));
                    Temp::compile('content');
                    Temp::clear();
                    Mysql::query("UPDATE posts SET views=views+1 WHERE id_post='{$id}'");
                } else Parse::$inform['danger'] = "Новость не найдена, возможно она была удалена";
            } else Parse::$inform['danger'] = "Не возможно найти новость с таким ID";
        } else Parse::$inform['danger'] = "Не возможно найти новость с таким ID";
    }

    static function sortPost($type, $data, $page = 0)
    {
        if (Parse::isValid($type) && Parse::isValid($data)) {
            switch ($type) {
                case "date":
                    CMain::$title = "Новости за " . $data;
                    $sort = "posts.sort_date='{$data}' AND";
                    break;
                case "category":
                    CMain::$title = "Новости из категории " . $data;
                    $sort = "category.link_cat='{$data}' AND";
                    break;
                default:
                    $sort = "";
            }

            self::$pages = self::pages($page);
            $posts = Mysql::query("SELECT posts.*, users.*, category.* FROM posts, users, category WHERE {$sort} users.id = posts.author AND posts.category=category.id_cat AND posts.publish=1 ORDER BY posts.fixed desc, posts.add_date DESC LIMIT " . self::$pages['start'] . "," . config::$post_on_page);
            if (Mysql::num() > 0) {
                self::$pagesUrl = config::$site_adr . "sort/" . $type . "/" . $data . "/page/";
                self::shortGenTemp($posts);
            } else Parse::$inform['info'] = "Новостей на найдено!";
        } else Parse::$inform['info'] = "Не думаю что подмена параметров это хорошая идея!";

    }

    static function shortGenTemp($posts)
    {
        if (config::$post_navigate == "top" or config::$post_navigate == "top_bottom") self::pagesTemp(self::$pages['count'], self::$pages['total']);
        foreach ($posts as $post) {
            Temp::load('post-short');
            $link = ($post['full'] == "<p><br></p>" && config::$post_hide_full_link == "yes") ? "javascript:void(0)" : "/post/{$post['id_post']}-" . str_replace(lang::$main, lang::$end, str_replace(" ", "-", $post['title']) . ".html");
            Temp::set('[title]', "<a href='$link'>");
            Temp::set('[/title]', "</a>");
            Temp::set("{title}", $post['title']);
            Temp::set("{short}", Parse::parsePost($post['short']));
            Temp::set("{views}", $post['views']);
            Temp::set("{category}", "<a href='/sort/category/{$post['link_cat']}'>{$post['name_cat']}</a>");
            Temp::set("{comments-num}", $post['comments-num']);
            Temp::set("{date}", Parse::dateTime($post['add_date']));
            Temp::set("{date_link}", "/sort/date/{$post['sort_date']}");
            Temp::set("{author}", "<a href='/user/" . $post['username'] . "'>{$post['username']}</a>");
            Temp::set("{views}", $post['views']);
            Temp::set("{full_link}", $link);
            Temp::compile('content');
            Temp::clear();
        }
        if (config::$post_navigate == "bottom" or config::$post_navigate == "top_bottom") self::pagesTemp(self::$pages['count'], self::$pages['total']);

    }

}