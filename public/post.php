<?php
define("PUB", dirname(__FILE__));
define("SYS", dirname(dirname(__FILE__)) . "/system");


if (isset($_GET['post'])) {
    require_once SYS . '/init.php';

    switch ($_GET['post']) {
        case "post":
            if (isset($_POST['c']) && isset($_POST['f']) && isset($_POST['d']) && !empty($_POST['c']) && !empty($_POST['f']) && !empty($_POST['d'])) {
                $recv = system\CMain::post($_POST['c'], $_POST['f'], $_POST['d']);
                if ($recv == 1) {
                    echo 1;
                } else {
                    echo $recv;
                }
            } else
                system\CMain::exception();
            break;

        case "adduser":
            \system\User::addUser($_POST);
            break;

        case "accept_rules":
            setcookie("rules", 1, time() + 60);
            break;

        case "addcomment":
            \system\CComments::add($_POST);
            break;

        case "search":
            system\CPost::search($_POST['search'], $_POST['js']);
            break;
    }
} else {
    if (isset($_GET['admin'])) {

        require_once SYS . "/data/config.php";
        require_once SYS . "/data/dbconfig.php";
        require_once SYS . "/data/lang/" . \system\config::$site_lang . "/admin.php";

        function __autoload($class_name)
        {
            $class_name = str_replace("system\\", "", $class_name);
            $file = sprintf('%s/libs/%s.php', SYS, $class_name);
            if (is_file($file)) require_once $file;
            $class_name = str_replace("admin\\", "", $class_name);
            $file = sprintf('%s/admin/controllers/%s.php', SYS, $class_name);
            if (is_file($file)) require_once $file;
        }

        switch ($_GET['admin']) {
            case "getUser":
                admin\AUsers::getUsers($_POST['page'], $_POST['search'], $_POST['online']);
                break;

            case "save":
                admin\ASettings::save($_POST['save']);
                break;

            case "state_post":
                admin\APost::updateState($_POST['id'], $_POST['state']);
                break;

            case "add_post":
                admin\APost::addPost($_POST);
                break;

            case "update_post":
                admin\APost::updatePost($_POST);
                break;

            case "delete_post":
                admin\APost::delete($_GET);
                break;

            case "save_routing":
                admin\ARouting::saveRouting($_POST);
        }
    }
}