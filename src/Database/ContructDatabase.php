<?php
namespace Basic\Database;
use Basic\Database\MySqlConnect as MySqlConnect;

class ContructDatabase
{
    public static function createDatabase()
    {
        $oDbase = new \mysqli(
            'localhost',
            'root',
            '',
        );
        $sql = "CREATE DATABASE IF NOT EXISTS basic_php";
        $oDbase->query($sql);
    }
}
