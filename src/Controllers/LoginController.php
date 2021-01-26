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
        MySqlConnect::connect()->table('user')->pluck();
    }
}
