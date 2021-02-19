<?php
namespace Basic\Database;
use Basic\Core\App as App;
// use Basic\Core\App as App;
use Basic\Database\MySqlConnect as MySqlConnect;

class ConstructDatabase
{
    public static function createDatabase()
    {
        $dbName = App::get('configs/database')['db'];
        $sql = "CREATE DATABASE IF NOT EXISTS $dbName ";
        MySqlConnect::$oDb->query($sql);
    }
}
