<?php 
namespace Basic\Controllers;

use Basic\Database\MySqlConnect as MySqlConnect;
use Basic\Models\PostModel as PostModel;

class PostController
{
    public function createPost()
    {
        loadview("Login/createPost.php");
    }

    public static function showPost()
    {
        PostModel::getPost();
        loadView("Login/showPost.php");
    }

    public function handlePost()
    {
        PostModel::createPost($_POST['postTitle'], $_POST['postContent'], ($_FILES['my_file']['name']), $_POST['id']);
    }
}
