<?php

namespace system;

class CUser
{

    static function authUser()
    {
        Temp::$folder = "user";
        Temp::load('auth');
        if (User::isUser()) {
            $user = User::getUser();
            Temp::set('{photo}', User::photoUser($user['id']));
            Temp::set('{username}', $user['username']);
            if ($user['is_admin'] == 1) {
                Temp::set('[admin]', "");
                Temp::set('[/admin]', "");
            } else {
                Temp::set_block("'\\[admin\\](.*?)\\[/admin\\]'si", "");
            }
        }
        Temp::compile('login');
        Temp::clear();
    }

    static function addUser()
    {
        Temp::$folder = "user";
        if (!User::isUser()) {
            if (isset($_COOKIE['rules']) == 1) {
                Temp::load("registration");
                if (isset($_COOKIE['add_user']) != "success") {
                    System::$title = "Регистрация";
                    Temp::set('[registration]', "");
                    Temp::set('[/registration]', "");
                    Temp::set_block("'\\[registered\\](.*?)\\[/registered\\]'si", "");
                } else {
                    System::$title = "Успешная регистрация";
                    Temp::set('[registered]', "");
                    Temp::set('[/registered]', "");
                    Temp::set_block("'\\[registration\\](.*?)\\[/registration\\]'si", "");
                }
                Temp::compile('content');
                Temp::clear();
                setcookie("add_user", "", 0);
            } else {
                System::$title = "Правила";
                $page = Mysql::squery("SELECT * FROM static WHERE `name`='rules'");
                //Temp::$result['speedbar'] .= " » Правила";
                Temp::load("static");
                Temp::set("{static}", $page['static']);
                Temp::set("{description}", $page['description']);
                Temp::set("{accept_button}", "<button onclick='acceptRules()'>Принять правила</button>");
                Temp::compile('content');
                Temp::clear();
                setcookie("rules", "", 0);
            }
        } else {
            Parse::$inform['info'] = "Вы уже являетесь пользователем!";
        }
    }

    static function exitUser()
    {
        unset($_SESSION['user']);
        session_destroy();
        setcookie("id", "");
        setcookie("session", "");
        header("Location:" . config::$site_adr);
    }

    static function profileUser($id = null)
    {
        Temp::$folder = "user";
        $getIDUser = ($id == "") ? $id = User::isUser('username') : $getIDUser = $id;
        Mysql::query("SELECT users.*, groups.*, city.*, country.* FROM users, groups, city, country WHERE city.id_city=users.city AND country.id_country=users.country AND groups.idg=users.group_id AND users.username='" . Mysql::safesql($getIDUser) . "'");
        if (Mysql::num() > 0) {
            $user = Mysql::fetch();
            System::$title = $user['username'];
            Temp::load("profile");
            $group = str_replace("{%title%}", $user['title'], $user['site_style']);
            Temp::set('{username}', $user['username']);
            Temp::set('{fullname}', $user['fullname']);
            Temp::set('{gender}', lang::$user_gender[$user['gender']]);
            Temp::set('{group}', $group);
            Temp::set('{create_time}', Parse::dateTime($user['registration_date']));
            Temp::set('{auth_time}', Parse::dateTime($user['auth_date']));
            Temp::set('{country}', $user['name_country']);
            Temp::set('{city}', $user['name_city']);

            if ($user['online'] > (time() - 180)) {
                Temp::set('[online]', "");
                Temp::set('[/online]', "");
                Temp::set_block("'\\[offline\\](.*?)\\[/offline\\]'si", "");

            } else {
                Temp::set('[offline]', "");
                Temp::set('[/offline]', "");
                Temp::set_block("'\\[online\\](.*?)\\[/online\\]'si", "");
            }
            Temp::set('{photo}', User::photoUser($user['id']));
            Temp::compile('content');
            Temp::clear();
        }else{
            Parse::$inform['info'] = "Пользователь не найден!";
        }
    }

    static function updateUser()
    {
        $user = Mysql::squery("SELECT users.*, groups.*, country.*, city.* FROM users, groups, country, city WHERE users.id='" . User::isUser('id') . "'");
        Temp::$folder = "user";
        Temp::load('edit');
        Temp::set("{uname}", $user['username']);
        Temp::set("{fullname}", $user['fullname']);
        Temp::set("{editmail}", $user['email']);
        Temp::set("{select_country}", "<select><option>1</option></select>");
        Temp::set("{select_city}", "<select><option>1</option></select>");
        Temp::compile('content');
        Temp::clear();
    }

    static function updateUserSelection()
    {

    }

    static function resetUser($token="")
    {
        if (!User::isUser()) {
            Temp::$folder = "user";
            Temp::load("reset");
            if (empty($token)) {
                Temp::set('[not-confirmed]', "");
                Temp::set('[/not-confirmed]', "");
                Temp::set_block("'\\[confirmed\\](.*?)\\[/confirmed\\]'si", "");
            } else {
                Temp::set('[confirmed]', "");
                Temp::set('[/confirmed]', "");
                Temp::set_block("'\\[not-confirmed\\](.*?)\\[/not-confirmed\\]'si", "");
                User::changePassword($token);
            }
            Temp::compile('content');
            Temp::clear();
        }else{
            Parse::$inform['info'] = "Данная страница недоступна для вас";
        }
    }

    static function im(){
        Temp::$folder = "user";
        Temp::load("message");
        Temp::compile('content');
        Temp::clear();
    }

}