<?php

namespace Basic\Controllers;

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

    public function handleLogin()
    {
        session_unset();
        $handleLogin = MySqlConnect::connect()
            ->table('users')
            ->where($aWhere = [
                'userName' => $_POST['userName'],
                'password' => $_POST['password']
            ])
            ->select();
        $row = mysqli_fetch_array($handleLogin, MYSQLI_ASSOC);
        $count = mysqli_num_rows($handleLogin);
        if ($count == 1) {
            $_SESSION["userName"] = $_POST['userName'];
            $_SESSION["id"] = $row['ID'];
            loadView("Login/createPost.php");
        } else {
            $_SESSION["errors"] =
                array("Your username or password was incorrect.");
            loadView("Login/login.php");
        }
    }

    public function handleRegister()
    {
        $checkAccExist = MySqlConnect::connect()
            ->table('users')
            ->where($aWhere = [
                'userName' => $_POST['userName'],
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
                    'userName' => $_POST['userName'],
                    'email'    => $_POST['email'],
                    'address'  => $_POST['address'],
                    'password' => $_POST['password']
                ])
                ->insert();

            $_SESSION["errors"] =
                array("Your account has been created.");
            loadView("Login/login.php");
        }
    }

    public function handlePost()
    {
        MySqlConnect::connect()
            ->table('post')
            ->values($aValues = [
                'author'   => $_POST['id'],
                'postTitle'   => $_POST['postTitle'],
                'postContent' => $_POST['postContent'],
            ])
            ->insert();

        $getAllPosts = MySqlConnect::connect()
            ->table('post')
            ->select();
        // $result = mysqli_fetch_all($getAllPosts, MYSQLI_ASSOC);
        while ($result = mysqli_fetch_object($getAllPosts)) {
            $results[] = $result;
        }
        $_SESSION["results"] = $results;
        loadView("Login/showPosts.php");
    }
}
