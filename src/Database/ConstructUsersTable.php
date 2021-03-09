<?php

namespace Basic\Database;

use Basic\Database\MySqlConnect as MySqlConnect;
use Basic\Models\UserModel as UserModel;

class ConstructUsersTable
{
    public static function createUsersTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `users`(
            `id` int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            `username` varchar(50) NOT NULL UNIQUE,
            `email` varchar(50) NOT NULL UNIQUE,
            `password`  varchar(32) NOT NULL ,
            `address` varchar(50) 
            );";
        MySqlConnect::$oDb->query($sql);
        self::createDummyAccount();
        
    }
    public static function createDummyAccount()
    {
        $password = md5('123');
        $sql = "INSERT INTO users 
        (`username`, `email`, `password`, `address`)
            SELECT * FROM (SELECT 'wiloke', 'wiloke@gmail.com', $password, 'Linh Dam, Hoang Mai') AS tmp
            WHERE NOT EXISTS (
                SELECT username FROM users WHERE `username` = 'wiloke'
            ) LIMIT 1;";
        MySqlConnect::$oDb->query($sql);
    }
}
