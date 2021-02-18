<?php

namespace Basic\Database;

use Basic\Core\App as App;

class CheckDatabaseExist
{
    public static function CheckDatabaseExist()
    {
        if (App::get('configs/database')['db'] === '') {
            echo "You need to add your database name. Pls go to C:\xampp\htdocs\PHP-MYSQL\configs\database.php 
    and add your db name to 'db' => 'Your db name'";
            die;
        }else {
            ConstructDatabase::createDatabase();
            ConstructUsersTable::createUsersTable();
            ConstructPostsTable::createPostsTable();
        }
    }
}
