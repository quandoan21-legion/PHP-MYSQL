<?php
namespace Basic\Database;

use Basic\Database\MySqlConnect as MySqlConnect;

class ConstructUsersTable
{
    public static function createUsersTable()
    {        
        $sql = "CREATE TABLE IF NOT EXISTS users(
            ID int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            username varchar(50) NOT NULL UNIQUE,
            email varchar(50) NOT NULL UNIQUE,
            matKhau  varchar(50) NOT NULL ,
            diaChi varchar(50) 
            );";
        MySqlConnect::$oDb->query($sql);
    }
}
