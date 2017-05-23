<?php

namespace system;

class User
{
    static $token;

    static function isUser($key = "")
    {
        if (isset($_SESSION['user'])) {
            Mysql::query("UPDATE users SET online='" . time() . "' WHERE id='{$_SESSION['user']['id']}'");
            if (empty($key)) return $_SESSION['user']; else return $_SESSION['user'][$key];
        } else {
            if (isset($_COOKIE['id']) && isset($_COOKIE['session'])) {
                $user = Mysql::squery("SELECT users.*, groups.* FROM users, groups WHERE users.id='" . Mysql::safesql($_COOKIE['id']) . "' AND groups.idg=users.group_id");
                if ($_COOKIE['session'] === $user['token']) {
                    if ($user['ip'] === $_SERVER['REMOTE_ADDR']) {
                        $_SESSION['user'] = $user;
                        if (!empty($key)) return $user[$key]; else return true;
                    } else {
                        setcookie("id", "");
                        setcookie("session", "");
                        return false;
                    }
                } else return false;
            } else return false;
        }
    }

    static function authUser($data)
    {
        $errors = array();
        if (strlen($data['username']) < config::$user_min_username or !Parse::isValid($data['username'])) $errors[] = lang::$auth_3;
        if (!Parse::isValid($data['password'], "password")) $errors[] = lang::$auth_2;

        if (empty($errors)) {
            Mysql::query("SELECT users.*, groups.* FROM users, groups WHERE username='".Mysql::safesql($data['username'])."' AND password='" . md5(Mysql::safesql($data['password'])) . "' AND users.group_id=groups.idg");
            if (Mysql::num() == 1) {
                self::$token = Parse::token(25);
                $user = Mysql::assoc();
                if ($user['site_view'] == 1) {
                    $_SESSION['user'] = $user;
                    Mysql::clear();
                    Mysql::query("UPDATE users SET token='" . self::$token . "', auth_date='" . time() . "', online='" . time() . "', ip='{$_SERVER['REMOTE_ADDR']}' WHERE id='{$_SESSION['user']['id']}'");
                    setcookie("id", $_SESSION['user']['id'], time() + 60 * 60 * 24 * 30);
                    setcookie("session", self::$token, time() + 60 * 60 * 24 * 30);
                    Parse::jsi('reload');
                } else
                    Parse::jsi('danger', lang::$auth_4);
            } else {
                Parse::jsi('info', lang::$auth_1);
            }
        } else {
            Parse::jsi('danger', $errors);
        }
    }

    static function getUser($id = null)
    {
        if ($id != null) {
            if (Parse::isValid($id, "int") != false) {
                Mysql::query("SELECT users.*, groups.*, country.*, city.* FROM users, groups, country, city WHERE users.id='".Mysql::safesql($id)."' AND groups.idg=users.group_id AND country.id_country=users.country AND city.id_city=users.city");
                if (Mysql::num() == 0) {
                    Parse::$inform['danger'] = lang::$user_1;
                    return false;
                }
            } else {
                Parse::$inform['danger'] = lang::$user_2;
                return false;
            }
        } else {
            if (isset($_SESSION['user']) && !empty($_SESSION['user']))
                Mysql::query("SELECT users.*, groups.*, country.*, city.* FROM users, groups, country, city WHERE users.id='" .  Mysql::safesql($_SESSION['user']['id']) . "' AND groups.idg=users.group_id AND country.id_country=users.country AND city.id_city=users.city");
            else
                return false;
        }
        return Mysql::assoc();
    }

    static function photoUser($id)
    {
        if (file_exists(PUB . "/shared/users/photos/" . md5($id) . ".jpg")) {
            return config::$site_adr . "photos/" . md5($id) . ".jpg";
        } else {
            return config::$site_adr . "templates/" . config::$site_skin . "/system/images/noavatar.png";
        }
    }

    static function addUser($data)
    {
        $errors = array();
        if (!User::isUser()) {
            if (strlen($data['username']) < config::$user_min_username or !Parse::isValid($data['username'])) $errors[] = sprintf(lang::$add_user_1, config::$user_min_username);
            if (!Parse::isValid($data['password1'], "password")) $errors[] = lang::$add_user_4;
            if (!Parse::isValid($data['email'], "email")) $errors[] = lang::$add_user_5;
            if (strlen($data['password1']) < config::$user_min_password or strlen($data['password2']) < config::$user_min_password) $errors[] = sprintf(lang::$add_user_2, config::$user_min_password);
            if ($data['password1'] !== $data['password2']) $errors[] = lang::$add_user_3;

            if (!empty($errors)) {
                Parse::jsi("danger", $errors);
            } else {
                if (Mysql::num(Mysql::query("SELECT * FROM users WHERE username='" . Mysql::safesql($data['username']) . "'")) > 0) Parse::jsi('info', "Пользователь с таким Именем уже существует"); else {
                    if (Mysql::num(Mysql::query("SELECT * FROM users WHERE email='" .  Mysql::safesql($data['email']) . "'")) > 0) Parse::jsi('info', "Пользователь с такой Почтой уже существует"); else {
                        if (Mysql::num(Mysql::query("SELECT * FROM users WHERE ip='" .  Mysql::safesql($_SERVER['REMOTE_ADDR']) . "'")) >= config::$user_user_one_ip) Parse::jsi('info', "Вы привысили лимит пользователей на 1 IP"); else {
                            @Mysql::query("INSERT INTO users (username, password, email, registration_date, ip, group_id) VALUES ('" .  Mysql::safesql($data['username']) . "','" .  Mysql::safesql(md5($data['password1'])) . "','" .  Mysql::safesql($data['email']) . "','" . time() . "','" .  Mysql::safesql($_SERVER['REMOTE_ADDR']) . "','" . config::$user_group . "')");
                            setcookie("add_user", "success", time() + 60);
                            Parse::jsi('reload');
                        }
                    }
                }
            }
        } else {
            Parse::$inform['dander'] = "Error auth user";
        }

    }

    static function updateUser()
    {

    }

    static function resetUser()
    {

    }

}