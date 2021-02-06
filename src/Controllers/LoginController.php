<?php
namespace Basic\Controllers;
session_start();

use Basic\Database\MySqlConnect as MySqlConnect;

class LoginController
{
    public function login()
    {
        loadview("Login/login.php");
    }

    public function register()
    {

        loadview("Login/register.php");
    }

    public function createPost()
    {

        loadview("Login/createPost.php");
    }
    // public static function checkDbExist()
    // {
        
    // }
    public function showPost()
    {
        $getAllPosts = MySqlConnect::connect()
            ->table('posts')
            ->select();
        // $result = mysqli_fetch_all($getAllPosts, MYSQLI_ASSOC);
        // while ($result = mysqli_fetch_object($getAllPosts)) {
        //     $results[] = $result;
        // }
        $result = $this->result;
        var_dump($result);
        die;
        loadView("Login/showPosts.php");
    }

    public function handleLogin()
    {
        session_unset();
        $handleLogin = MySqlConnect::connect()
            ->table('users')
            ->where($aWhere = [
                'username' => $_POST['username'],
                'matKhau' => $_POST['matKhau']
            ])
            ->select();
        $row = mysqli_fetch_array($handleLogin, MYSQLI_ASSOC);
        $count = mysqli_num_rows($handleLogin);
        if ($count == 1) {
            $_SESSION["username"] = $_POST['username'];
            $_SESSION["id"] = $row['ID'];
            loadView("Login/createPost.php");
        } else {
            $_SESSION["errors"] =
                array("Your username or matKhau was incorrect.");
            loadView("Login/login.php");
        }
    }

    public function handleRegister()
    {
        $checkAccExist = MySqlConnect::connect()
            ->table('users')
            ->where($aWhere = [
                'username' => $_POST['username'],
                'email'    => $_POST['email']
            ], "OR")
            ->select();
        $count = mysqli_num_rows($checkAccExist);
        if ($count == 1) {
            $_SESSION["errors"] = array("Your username or email already exits.");
            loadView("Login/register.php");
        } else {
            session_unset();
            MySqlConnect::connect()
                ->table('users')
                ->values($aValues = [
                    'username' => $_POST['username'],
                    'email'    => $_POST['email'],
                    'diaChi'  => $_POST['diaChi'],
                    'matKhau' => $_POST['matKhau']
                ])
                ->insert();

            $_SESSION["errors"] =
                array("Your account has been created.");
            loadView("Login/register.php");
        }
    }

    public function handlePost()
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


        $getAllPosts = MySqlConnect::connect()
            ->table('posts')
            ->select();
        $_SESSION["results"] = $getAllPosts;
        // echo "<pre>";
        // var_export($getAllPosts);
        // echo "</pre>";
        // die;
        loadView("Login/showPosts.php");
    }
}
