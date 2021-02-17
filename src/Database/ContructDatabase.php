<?php
namespace Basic\Database;
use Basic\Core\App as App;
// use Basic\Core\App as App;
use Basic\Database\MySqlConnect as MySqlConnect;

class ContructDatabase
{
    public static function createDatabase()
    {
        $dbName = App::get('db');
        $oDbase = new \mysqli(
            App::get('host'),
            App::get('username'),
            App::get('password'),
        );
        $sql = "CREATE DATABASE IF NOT EXISTS $dbName ";
        $oDbase->query($sql);
    }
}
