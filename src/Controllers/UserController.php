<?php

namespace Basic\Controllers;

session_start();

use Basic\Models\UserModel as UserModel;
use Basic\Models\PostModel as PostModel;

class UserController
{
    public function login()
    {
        loadview("Login/login.php");
    }

    public function register()
    {
        if (isset($_SESSION["username"])) {
            loadView("Login/welcome.php");
        } else {
            loadview("Login/register.php");
        }
    }

    public function logout()
    {
        session_destroy();
        loadview("Login/login.php");
    }


    public static function handleLogin()
    {
        if (UserModel::handleLogin($_POST['usernameOrEmail'], $_POST['password']) > 0) {
            $_SESSION["usernameOrEmail"] = $_POST['usernameOrEmail'];
            loadView("Login/welcome.php");
        } else {
            $_SESSION["errors"] = array("Your username or password was incorrect.");
            loadView("Login/login.php");
        }
    }

    public function handleRegister()
    {
        if (UserModel::isUserExist($_POST['email']) > 0) {
            loadView("Login/register.php");
        } else {
            UserModel::createUserAccount($_POST['username'], $_POST['email'], $_POST['address'], $_POST['password']);
            UserModel::handleLogin($_POST['username'], $_POST['password']);
            $_SESSION["usernameOrEmail"] = $_POST['username'];
            loadView("Login/welcome.php");
        }
    }

    public function handlePost()
    {
        PostModel::createPost($_POST['postTitle'], $_POST['postContent'], ($_FILES['my_file']['name']), $_POST['id']);        
    }
}
