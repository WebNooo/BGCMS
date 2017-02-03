<?php

namespace admin;

use system\CMain;
use system\config;
use system\Mysql;
use system\User;

class AUsers
{

    static function index()
    {

        echo "<div class=\"\">
                    <div class=\"content__header\">
                        <h2>Пользователи</h2>
                    </div>
                    </div>
                    
                    <div class=\"action-header action-header--dark\">
                        <ul class=\"action-header__menu action-header__menu--padding\">
                            <li class='active'><a class='AAll' href=\"javascript:void(0)\">Все пользователи</a></li>
                            <li><a class='AOnline' href=\"javascript:void(0)\">В сети</a></li>
                            <li><a class='ABlock' href=\"javascript:void(0)\">Заблокированные</a></li>
                        </ul>
                    
                    <div class=\"action-header__search\">
                            <input type=\"text\" name='AUser' placeholder=\"Поиск пользователей...\" class=\"action-header__input\">
                            <i class=\"action-header__close zmdi zmdi-long-arrow-left\"></i>
                        </div>

                        <div class=\"actions action-header__actions\">
                            <a href=\"\" class=\"action-header__toggle\"><i class=\"zmdi zmdi-search\"></i></a>

                            <div class=\"dropdown hidden-xs\">
                                <a href=\"\" data-toggle=\"dropdown\">
                                    <i class=\"zmdi zmdi-sort\"></i>
                                </a>

                                <ul class=\"dropdown-menu pull-right\">
                                    <li>
                                        <a href=\"\">по дате регистрации</a>
                                    </li>
                                    <li>
                                        <a href=\"\">По имени</a>
                                    </li>
                                    <li>
                                        <a href=\"\">По группе</a>
                                    </li>
                                    <li>
                                        <a href=\"\">По ID</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                        <div class=\"contacts row\">
                    ";
        echo "        <div id='AUser'></div>
                    
                        </div>
                    </div>
                    ";

    }

    static function groups()
    {

    }

    static function add()
    {

    }

    static function delete()
    {

    }

    static function edit()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {

            if (intval($_GET['id']))
                echo "edit - " . $_GET['id'];
            else {
                AMain::info("Не верный формат ID!", "info");
            }

        } else {
            AMain::info("Ошибка редактирования!", "info");
        }
    }

    static function getUsers($page = 0, $search = "", $online = "")
    {

        if (empty($search) && empty($online)) {
            $get = Mysql::query("SELECT users.*, groups.* FROM users, groups WHERE groups.idg = users.group_id");
        } else if (!empty($online)) {
            $get = Mysql::query("SELECT users.*, groups.* FROM users, groups WHERE groups.idg = users.group_id AND users.online > ".(time() - 180));
        } else {
            $get = Mysql::query("SELECT users.*, groups.* FROM users, groups WHERE users.group_id=groups.idg AND users.username LIKE '%" . $search . "%' OR users.group_id=groups.idg AND users.email LIKE '%" . $search . "%'");
        }
        if (Mysql::num() > 0) {
            foreach ($get as $user) {

                $status = ($user['online'] > (time() - 180)) ? config::$site_adr . "admin/template/img/online.png" : config::$site_adr . "admin/template/img/offline.png";
                echo "<div class=\"col-md-2 col-sm-4\">
                      <div class=\"contacts__item\">
                                <a href=\"\" class=\"contacts__img\">
                                    <img src=\"" . User::photoUser($user['id']) . "\" alt=\"\">
                                </a>

                                <div class=\"contacts__info\">
                                    <strong>{$user['username']} <img src='{$status}' /></strong>
                                    <span style='font-size:11px;'>" . str_replace("{%username%}", $user['title'], $user['style']) . "</span>
                                    <small>{$user['email']}</small>
                                </div>

                                <button class=\"contacts__btn btn btn--icon-text btn--light\"><i class=\"zmdi zmdi-edit\"></i> Редактировать</button>
                      </div>
                  </div>
            ";
            }
        } else {
            AMain::info('Пользователи не найдены', 'info');
        }
    }

}