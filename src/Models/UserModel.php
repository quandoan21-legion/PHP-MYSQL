<?php
namespace Basic\Models;

use Basic\Database\MySqlConnect as MySqlConnect;


class UserModel
{
    public static function isUserExist($usernameOrEmail)
    {
        $checkAccExist = MySqlConnect::connect()
            ->table('users')
            ->where([
                'username' => $usernameOrEmail,
                'email'    => $usernameOrEmail
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
            
        if (count($handleLogin) > 0) {
            $_SESSION['id'] = $handleLogin[0][0];
            return $handleLogin;
        }else {
            return count($handleLogin);
        }
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
