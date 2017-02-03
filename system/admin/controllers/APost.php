<?php

namespace admin;

use system\config;
use system\Mysql;
use system\User;

class APost
{

    static function index()
    {
        echo "<div class=\"card\">
                    <div class=\"card__header\">
                        <h2>Новости <small>Список всех новостей на сайте</small></h2>
                        <span style='float: right;'> <a href='" . config::$site_adr . config::$admin_file . "?c=post&f=add' class='btn btn-success'> <i class='zmdi zmdi-plus'></i> Добавить новость</a></span>
                    </div>

                    <div class=\"card__body\">
                        <div class=\"table-responsive\">
                            <table id=\"data-table-command\" class=\"table-striped\">
                                <thead>
                                    <tr>
                                        <th data-column-id=\"id\" data-type=\"numeric\">ID</th>
                                        <th data-column-id=\"name\">Название</th>
                                        <th data-column-id=\"author\">Автор</th>
                                        <th data-column-id=\"views\" data-type=\"numeric\">Просмотры</th>
                                        <th data-column-id=\"comments\" data-type=\"numeric\">Комментарии</th>
                                        <th data-column-id=\"date\">Дата</th>
                                        <th data-column-id=\"state\" data-formatter='status'>Состояние</th>
                                        <th data-column-id=\"manager\" data-formatter=\"commands\" data-sortable=\"false\">Действие</th>
                                    </tr>
                                </thead>
                                <tbody>";

        $result = Mysql::query("SELECT * FROM posts");
        foreach ($result as $post) {
            echo "<tr id='t_r_{$post['id_post']}'>
                                        <td>{$post['id_post']}</td>
                                        <td>{$post['title']}</td>
                                        <td>{$post['author']}</td>
                                        <td>{$post['views']}</td>
                                        <td>{$post['comments-num']}</td>
                                        <td>{$post['add_date']}</td>
                                        <td>{$post['publish']}</td>
                                        <td></td>
                                    </tr>";
        }
        echo "</tbody>
                            </table>
                        </div>
                    </div>
                </div>
                ";
    }

    static function category()
    {

    }

    static function edit()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $post = Mysql::squery("SELECT posts.*, category.* FROM posts, category WHERE posts.id_post='{$_GET['id']}' AND category.id_cat = posts.category");
            echo "<div class='card'>
                    <div class='card__header'>
                        <h2>Редактирование новости <small>Да поможет вам русский язык!</small></h2>
                    </div>
                    
                    <div class='card__body form-horizontal'>
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Название:</label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name='title' class=\"form-control\" value='{$post['title']}'>
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Категория:</label>
                            <div class=\"col-sm-10\">
                                <select class='select2' name=\"category\">";
            foreach (Mysql::query("SELECT * FROM category") as $item) {
                $select = ($item['id_cat'] == $post['category']) ? "selected" : "";
                echo "<option value='{$item['id_cat']}' $select>{$item['name_cat']}</option>";
            }
            echo "</select>
                            </div>
                        </div>
                        
                       
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Дата:</label>
                            <div class=\"col-sm-10\">
                                <input type='text' name='date' class=\"form-control date-time-picker\" placeholder=\"Сегодня\" value='" . date('d.m.Y H:i', $post['add_date']) . "' />
                                <i class=\"form-group__bar\"></i>
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Закрепить новость:</label>
                            <div class=\"col-sm-10 toggle-switch\">
                                <input type='checkbox' name='fixed' class=\"toggle-switch__checkbox\">
                                <i class=\"toggle-switch__helper\"></i>
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Опубликовать:</label>
                            <div class=\"col-sm-10 toggle-switch\">
                                <input type='checkbox' name='publish' class=\"toggle-switch__checkbox\" checked>
                                <i class=\"toggle-switch__helper\"></i>
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Краткая новость:</label>
                            <div class=\"col-sm-10\">
                                <div class='short_post'>{$post['short']}</div>
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Полная новость:</label>
                            <div class=\"col-sm-10\">
                                <div class='full_post'>{$post['full']}</div>           
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <div class=\"col-sm-offset-5\">
                                <button onclick=\"updatePost('" . $post['id_post'] . "')\" class='btn btn-success'>Oбновить новость</button>          
                            </div>
                        </div>
                    </div>
              </div>";
        }
    }

    static function updatePost($data)
    {
        $data['date'] = (empty($data['date'])) ? time() : strtotime($data['date']);
        if (Mysql::query("UPDATE posts SET title='{$data['title']}', add_date='{$data['date']}', sort_date='".date("Y-m-d", $data['date'])."', short='{$data['short']}', `full`='{$data['full']}', fixed={$data['fixed']}, publish={$data['publish']}, category='{$data['category']}' WHERE id_post='{$data['id']}'")) {
            AMain::jsi('success', lang::$post_add);
        } else {
            AMain::jsi('danger', lang::$post_add_error);
        }
    }

    static function delete($data)
    {
        echo $data['id'];
    }

    static function add()
    {
        echo "<div class='card'>
                    <div class='card__header'>
                        <h2>Добавление новости <small>Да поможет вам русский язык!</small></h2>
                    </div>
                    
                    <div class='card__body form-horizontal'>
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Название:</label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name='title' class=\"form-control\" value=''>
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Категория:</label>
                            <div class=\"col-sm-10\">
                                <select class='select2' name='category'>";
        foreach (Mysql::query("SELECT * FROM category") as $item) {
            echo "<option value = '{$item['id_cat']}' >{$item['name_cat']}</option >";
        }
        echo "</select>
                            </div>
                        </div>
                        
                       
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Дата:</label>
                            <div class=\"col-sm-10\">
                                <input type='text'  name='date' class=\"form-control date-time-picker\" placeholder=\"Сегодня\">
                                <i class=\"form-group__bar\"></i>
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Закрепить новость:</label>
                            <div class=\"col-sm-10 toggle-switch\">
                                <input type='checkbox' name='fixed' class=\"toggle-switch__checkbox\">
                                <i class=\"toggle-switch__helper\"></i>
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Опубликовать:</label>
                            <div class=\"col-sm-10 toggle-switch\">
                                <input type='checkbox' name='publish' class=\"toggle-switch__checkbox\" checked>
                                <i class=\"toggle-switch__helper\"></i>
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Краткая новость:</label>
                            <div class=\"col-sm-10\">
                                <div class='short_post'></div>
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">Полная новость:</label>
                            <div class=\"col-sm-10\">
                                <div class='full_post'></div>           
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <div class=\"col-sm-offset-5\">
                                <button onclick='addPost()' class='btn btn-success'><i class='zmdi zmdi-plus'></i> Добавить новость</button>          
                            </div>
                        </div>
                    </div>
              </div>";
    }

    static function addPost($data)
    {
        $data['date'] = (empty($data['date'])) ? time() : strtotime($data['date']);
        if (Mysql::query("INSERT INTO posts (title, author, short, `full`, add_date, sort_date, fixed, publish,category) VALUES ('{$data['title']}','" . User::isUser('id') . "','{$data['short']}','{$data['full']}','{$data['date']}','".date("Y-m-d", $data['date'])."',{$data['fixed']},{$data['publish']},'{$data['category']}')")) {
            AMain::jsi('success', lang::$post_add);
        } else {
            AMain::jsi('danger', lang::$post_add_error);
        }
    }

    static function updateState($id, $state)
    {
        if (User::isUser() == true && User::getUser()['admin_settings'] == 1) {
            if (Mysql::query("UPDATE posts SET publish='{$state}' WHERE id_post='{$id}'")) {
                if ($state == 1)
                    AMain::jsi('success', "Новость опубликована");
                else
                    AMain::jsi('info', 'Новость скрыта');
            } else {
                AMain::jsi('danger', 'Произошла ошибка!');
            }
        } else {
            AMain::jsi('danger', "Ошибка, для изменения параметров вы должны иметь привилегии администратора");
        }
    }

}