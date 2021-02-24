<?php
namespace Basic\Database;

use Basic\Database\MySqlConnect as MySqlConnect;

class ConstructPostsTable
{
    public static function createPostsTable()
    {
        
        $sql = "CREATE TABLE IF NOT EXISTS posts(
            ID int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            postTitle varchar(50) NOT NULL ,
            postContent varchar(50) NOT NULL ,
            img  varchar(50) NOT NULL 
            );";
        MySqlConnect::$oDb->query($sql);
    }
}
