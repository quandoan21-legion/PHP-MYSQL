<?php

namespace Basic\Database;

use Basic\Database\MySqlConnect as MySqlConnect;

class ContructPostsTables
{
    public static function createPostsTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS posts(
            ID int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            postTitle varchar(50) NOT NULL UNIQUE,
            postContent varchar(50) NOT NULL UNIQUE,
            img  varchar(50) NOT NULL ,
            author int(12)
            );";
        MySqlConnect::$oDb->query($sql);
    }
}
