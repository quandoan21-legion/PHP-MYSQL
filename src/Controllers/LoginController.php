<?php

namespace Basic\Controllers;

session_start();

use Basic\Database\MySqlConnect as MySqlConnect;

class LoginController
{
    public function login()
    {
        session_unset();
        loadview("Login/login.php");
    }

    public function register()
    {
        session_unset();
        loadview("Login/register.php");
    }

    public function logout()
    {
        session_destroy();
        loadview("Login/login.php");
    }

    public function createPost()
    {

        loadview("Login/createPost.php");
    }
    
    public static function showPost()
    {
        $getAllPosts = MySqlConnect::connect()
            ->table('posts')
            ->select();
        $_SESSION["Posts"] = $getAllPosts;
        loadView("Login/showPost.php");
    }

    public static function handleLogin()
    {
        $handleLogin = MySqlConnect::connect()
            ->table('users')
            ->where($aWhere = [
                'username' => $_POST['username'],
                'matKhau' => $_POST['matKhau']
            ])
            ->select();
        if (count($handleLogin) == 1) {
            $_SESSION["username"] = $_POST['username'];
            loadView("Login/createPost.php");
        } else {
            $_SESSION["errors"] =
                array("Your username or password was incorrect.");
            loadView("Login/login.php");
        }
    }

    public static function handleRegister()
    {
        $checkAccExist = MySqlConnect::connect()
            ->table('users')
            ->where($aWhere = [
                'username' => $_POST['username'],
                'email'    => $_POST['email']
            ], "OR")
            ->select();
        if (count($checkAccExist) > 1) {
            $_SESSION["errors"] = array("Your username or email already exits.");
            loadView("Login/register.php");
        } else {
            MySqlConnect::connect()
                ->table('users')
                ->values($aValues = [
                    'username' => $_POST['username'],
                    'email'    => $_POST['email'],
                    'diaChi'  => $_POST['diaChi'],
                    'matKhau' => $_POST['matKhau']
                ])
                ->insert();
            self::handleLogin($_POST['username'], $_POST['matKhau']);
        }
    }

    public static function handlePost()
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
            ->values($aValues = [
                'author'   => $_POST['id'],
                'postTitle'   => $_POST['postTitle'],
                'postContent' => $_POST['postContent'],
                'img' => $path_filename_ext,
            ])
            ->insert();
            self::showPost();
    }
}
