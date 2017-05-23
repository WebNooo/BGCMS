<?php

namespace system;

class Upgrade
{

    static $reader = "";


    static function getUpdate()
    {

    }

    static function compileUpdate()
    {

    }

    //Чтение и запись в файл, при рабте с функциями выполняйте очистку переменных self::clear()
    static function writeFile($string)
    {

    }

    static function readFile($file)
    {

    }

    //Копирование не измененного файла по пути /system/backup/folder/filename.php

    static function backupFile()
    {

    }

    //Замена данных функции

    static function replaceData()
    {

    }

    //Работа с функциями

    static function updateFunction($string, $function, $params = array(), $file)
    {

    }

    static function addFunction($string, $function, $params = array(), $file)
    {

    }

    static function deleteFunction($function, $file)
    {

    }

    //Работа с маршрутами

    static function addRouters($uri, $function, $title, $allowUser)
    {

    }

    //Работа с файлом

    static function addFile($folder, $filename)
    {

    }

    static function deleteFile($file)
    {

    }

    static function updateFile()
    {

    }


    //Работа с папками

    static function addFolder()
    {

    }

    static function deleteFolder()
    {

    }

    //Вывод информации об обновлении и рекомендации по изменению переменных в шаблоне

    static function viewUpdate()
    {

    }

    //Очистка переменных

    static function clear()
    {
        self::$reader = "";
    }

}