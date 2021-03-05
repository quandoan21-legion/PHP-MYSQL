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
    }
    public static function createDummyAccount()
    {
        UserModel::createUserAccount('wiloke', 'wiloke@gmail.com', 'Linh Dam, Hoang Mai', '123');
    }
}
