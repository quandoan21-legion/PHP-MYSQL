<?php

namespace Basic\Controllers;
use Basic\Database\MySqlConnect as MySqlConnect;
class LoginController
{
    public function login()
    {
        loadview("Login/index.php");
    }
    
    public function getUser()
    {
        
        loadview("Login/getUser.php");

    }

    public function insertUser()
    {
        
        loadview("Login/insertUser.php");

    }

    public function updateUser()
    {
        
        loadview("Login/updateUser.php");

    }
    public function deleteUser()
    {
        
        loadview("Login/deleteUser.php");

    }
}
