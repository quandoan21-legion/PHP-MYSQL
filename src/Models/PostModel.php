<?php

namespace Basic\Models;

use Basic\Database\MySqlConnect as MySqlConnect;

class PostModel
{
    public $geeks = "test attribute"; 
    public static function createPost($postTitle, $postContent, $img, $author_id)
    {
        if (($_FILES['my_file']['name'] != "")) {
            // Where the file is going to be stored
            $target_dir = "assets/img/";
            $file = $_FILES['my_file']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['my_file']['tmp_name'];
            $path_filename_ext = $target_dir . $filename . "." . $ext;

            move_uploaded_file($temp_name, $path_filename_ext);
            $_SESSION["img"]   = $path_filename_ext;
        }

        MySqlConnect::connect()
            ->table('posts')
            ->values([
                'post_title'   => $postTitle,
                'post_content' => $postContent,
                'img'          => $path_filename_ext,
                'author_id'    => $author_id,
            ])
            ->insert();
        // PostController::showPost();
    }

    public static function getPost()
    {
        $aPosts =
            MySqlConnect::connect()
            ->table('posts')
            ->select();
        return $aPosts;
    }
}
