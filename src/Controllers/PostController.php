<?php 
namespace Basic\Controllers;

use Basic\Models\PostModel as PostModel;

class PostController
{
    public function createPost()
    {
        loadview("Login/createPost.php");
    }

    public static function showPost()
    {
        $aPosts = PostModel::getPost();
        var_export($aPosts);die;
        $_SESSION["posts"] = $aPosts;      
        loadView("Login/showPost.php");
    }

    public function handlePost()
    {        
        PostModel::createPost($_POST['postTitle'], $_POST['postContent'], $_FILES['my_file'], $_POST['id']);
        self::showPost();
    }
}
