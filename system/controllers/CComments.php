<?php
namespace system;

class CComments
{

    static function addComments()
    {
        Temp::load('addcomments');
        Temp::compile('addcomments');
        Temp::clear();
    }

    static function add($data)
    {
        if (Parse::isValid($data['post'], 'int') or !empty($data['post'])) {
            if (Parse::isValid($data['text']) or !empty($data['text'])) {
                Mysql::query("INSERT INTO comments (id_p, id_author, text_comment, date_comment) VALUES ('" . Mysql::safesql($data['post']) . "', '" . User::isUser('id') . "', '" . Mysql::safesql($data['text']) . "','" . time() . "')");
                Parse::jsi("success", "add comment");
            } else Parse::jsi('danger', "error text");
        } else Parse::jsi('danger', "error id");
}

    static function edit()
    {

    }

    static function delete()
    {

    }

    static function comments($id, $js = false, $page = 0)
    {
        $comments = Mysql::query("SELECT comments.*, users.* FROM comments,users WHERE comments.id_author=users.id AND comments.id_p='$id'");
        $count = Mysql::num($comments);
        if ($count > 0) {
            foreach ($comments as $comment) {
                Temp::load('comments');
                Temp::set('{author}', $comment['username']);
                Temp::set('{comment}', $comment['text_comment']);
                Temp::set('{date}', Parse::dateTime($comment['date_comment']));
                Temp::set('{photo}', User::photoUser($comment['id_author']));
                Temp::set('{comm-num}', $comment['comm-num']);
                Temp::set('{posts-num}', $comment['posts-num']);
                if (User::isUser('site_edit_comments') == 1) {
                    Temp::set('{mass-action}', "<input type=\"checkbox\" name=\"\" value='' />");
                } else {
                    Temp::set('{mass-action}', "");
                }
                Temp::set("[reply]", "<a href=\"javascript:;\">");
                Temp::set("[/reply]", "</a>");

                Temp::set("[com-edit]", "<a href=\"javascript:;\">");
                Temp::set("[/com-edit]", "</a>");

                Temp::set("[com-del]", "<a href=\"javascript:;\">");
                Temp::set("[/com-del]", "</a>");
                Temp::set("[profile]", "<a href=\"javascript:;\">");
                Temp::set("[/profile]", "</a>");

                Temp::compile('comments');
                Temp::clear();
            }
            if ($js) echo Temp::$result['comments'];

        } else {
            //Temp::$result['comments'] = "К данной статье комментариев не найдено";
            System::info('Информация', "К данной статье комментариев не найдено", "comments");
        }
    }

}