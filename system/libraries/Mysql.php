<?php

namespace system;

use mysqli;

class Mysql
{

    private static $connect;
    static $mysqlError;
    static $queryID;
    static $queryNUM = 0;

    public function __construct()
    {
        self::Run();
    }

    private static function Run()
    {
        self::$connect = @new mysqli(dbconfig::$host, dbconfig::$user, dbconfig::$password, dbconfig::$table);
        if (self::$connect->connect_errno) {
            printf("Connect failed: %s\n", self::$connect->connect_error);
            exit();
        } else {
            self::$connect->query("SET NAMES " . dbconfig::$charset);
            return self::$connect;
        }
    }

    public static function getError()
    {
        if ($e = mysqli_error(self::$connect)) {
            //echo "MySQL reports: '$e' on query\n" . self::$queryID;
        }
        return false;
    }

    public static function squery($value, $cycle = 0)
    {
        if ($cycle == 0) {
            $data = self::assoc(self::query($value));
            self::free();
            return $data;
        } else {
            $data = self::query($value);
            $rows = array();
            while ($row = self::assoc($data)) {
                $rows[] = $row;
            }
            self::free();
            return $rows;
        }
    }

    public static function assoc($value = "")
    {
        if (empty($value))
            return mysqli_fetch_assoc(self::$queryID);
        else return mysqli_fetch_assoc($value);
    }

    public static function query($value)
    {
        self::$queryID = self::Run()->query($value);
        if (self::$queryID) {
            self::$queryNUM++;
            return self::$queryID;
        } else {
            printf("Error: %s", mysqli_error(self::$connect));
            exit(0);
        }
    }

    public static function update($table, $data, $where = "")
    {
        $query = "";
        $data = explode(';;', $data);
        foreach ($data as $value) {
            $value = explode('::', $value);
            $query .= "$value[0]='$value[1]',";
        }
        if (!empty($where)) {
            $where = "WHERE $where";
        }
        self::query("UPDATE $table SET " . trim($query, ',') . " $where");
    }

    public static function insert($table, $array)
    {
        $col = "";
        $vals = "";
        $i = 0;
        foreach ($array as $item) {
            $val = "";
            if ($i == 0) {
                foreach ($item as $cols) {
                    $col .= "$cols, ";
                }
            } else {
                foreach ($item as $value) {
                    $val .= "'$value', ";
                }
                $val = trim($val, ", ");
                $vals .= "($val), ";
            }
            $i++;
        }
        $col = trim($col, ", ");
        $vals = trim($vals, ', ');
        self::query("INSERT $table ($col) VALUES $vals");

    }

    public static function free($value = "")
    {
        if (empty($value)) $value = self::$queryID;
        @mysqli_free_result($value);
    }

    public static function fetch($value = "")
    {
        if (empty($value)) $value = self::$queryID;
        return mysqli_fetch_array($value);
    }


    public static function num($value = "")
    {
        if (empty($value)) $value = self::$queryID;
        return mysqli_num_rows($value);
    }

    public static function getID()
    {
        return mysqli_insert_id(self::$connect);
    }

    public static function safesql($value)
    {
        return self::Run()->real_escape_string($value);
    }

    public static function escape($value)
    {
        return self::Run()->escape_string($value);
    }

    public static function clear()
    {
        self::$queryNUM = "";
        self::$queryID = "";
    }

    function __destruct()
    {
        self::Run()->close();
        self::clear();
    }

}