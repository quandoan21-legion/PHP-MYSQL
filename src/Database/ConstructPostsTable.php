<?php
namespace Basic\Database;

use Basic\Database\MySqlConnect as MySqlConnect;

class ConstructPostsTable
{
    public static function createPostsTable()
    {
        
        $sql = "CREATE TABLE IF NOT EXISTS `posts`(
            `id` int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            `post_title` varchar(50) NOT NULL ,
            `post_content` varchar(50) NOT NULL ,
            `img`  varchar(50) NOT NULL ,
            `author_id` int(12) NOT NULL
            );";
        MySqlConnect::$oDb->query($sql);
    }
}
