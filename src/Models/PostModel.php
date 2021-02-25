<?php

namespace Basic\Models;

use Basic\Database\MySqlConnect as MySqlConnect;
use Basic\Controllers\LoginController as LoginController;

class PostModel
{
    public static function createPost($postTitle, $postContent, $img, $author_id)
    {
        if (($_FILES['my_file'] != "")) {
            // Where the file is going to be stored
            $target_dir        = "assets/img/";
            $file              = $img;
            $path              = pathinfo($file);
            $filename          = $path['filename'];
            $ext               = $path['extension'];
            $temp_name         = $_FILES['my_file']['tmp_name'];
            $path_filename_ext = $target_dir . $filename . "." . $ext;

            // Check if file already exists
            if (file_exists($path_filename_ext)) {
                // echo "Sorry, file already exists.";
            } else {
                move_uploaded_file($temp_name, $path_filename_ext);
                $_SESSION["img"] = $path_filename_ext;
                // echo "Congratulations! File Uploaded Successfully.";
            }
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
        LoginController::showPost();
    }
    
    public static function getPost()
    {
        $aPosts =
            MySqlConnect::connect()
            ->table('posts')
            ->select();
        $_SESSION["posts"] = $aPosts;
    }
}
