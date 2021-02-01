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
        $count = mysqli_num_rows($handleLogin);
        if ($count == 1) {
            $_SESSION["userName"] = $_POST['userName'];
            loadView("Login/welcome.php");
        }else {
            loadView("Login/login.php");
        }
    }
}
