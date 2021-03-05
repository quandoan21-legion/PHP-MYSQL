<?php
namespace Basic\Models;

use Basic\Database\MySqlConnect as MySqlConnect;


class UserModel
{
    private static $aHandleLogin;
    public static function isUserExists($usernameOrEmail)
    {
        return count( MySqlConnect::connect()
            ->table('users')
            ->where([
                'username' => $usernameOrEmail,
                'email'    => $usernameOrEmail
            ], "OR")
            ->select()
        ) > 0;
    }

    public static function handleLogin($usernameOrEmail, $password)
    {
        if (self::$aHandleLogin === null) {
            self::$aHandleLogin = MySqlConnect::connect()
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
            return self::$aHandleLogin;
        }else {
            return self::$aHandleLogin;
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
