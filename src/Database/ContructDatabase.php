<?php
namespace Basic\Database;
use Basic\Core\App as App;
// use Basic\Core\App as App;
use Basic\Database\MySqlConnect as MySqlConnect;

class ContructDatabase
{
    public static function createDatabase()
    {
        $oDbase = new \mysqli(
            App::get('configs/database')['host'],
            App::get('configs/database')['username'],
            App::get('configs/database')['password'],
            
        );
        $dbName = App::get('configs/database')['db'];
        $sql = "CREATE DATABASE IF NOT EXISTS $dbName ";
        $oDbase->query($sql);
    }
}
