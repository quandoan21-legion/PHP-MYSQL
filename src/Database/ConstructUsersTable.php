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
        $username = 'wiloke';
        $email = 'wiloke@gmail.com';
        $address = 'Linh Dam, Hoang Mai';
        $password = '123';
        UserModel::createUserAccount($username, $email, $address, $password);
    }
}
