<?php

namespace Basic\Models;

use Basic\Database\MySqlConnect as MySqlConnect;


class UserModel
{
    public static function isUserExist()
    {
        $checkAccExist = MySqlConnect::connect()
            ->table('users')
            ->where([
                'username' => $_POST['username'],
                'email'    => $_POST['email']
            ], "OR")
            ->select();
        return count($checkAccExist);
    }

    public static function handleLogin($usernameOrEmail, $password)
    {
        $handleLogin = MySqlConnect::connect()
            ->table('users')
            ->where([
                'username' => $usernameOrEmail,
                'password' => md5($password)
            ])
            ->orWhere([
                'email'    => $usernameOrEmail,
                'password' => md5($password)
            ])
            ->select();

        $_SESSION['id'] = $handleLogin[0][0];
        return count($handleLogin);
    }

    public static function createUserAccount($username, $email, $address, $password)
    {
        MySqlConnect::connect()
            ->table('users')
            ->values([
                'username' => $username,
                'email'    => $email,
                'address'  => $address,
                'password' => md5($password)
            ])
            ->insert();
    }
}
