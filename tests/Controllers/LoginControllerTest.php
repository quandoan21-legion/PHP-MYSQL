<?php

namespace BasicTest\Controllers;

use PHPUnit\Framework\TestCase;
use Basic\Controllers\LoginController;
use Basic\Database\MySqlConnect;

class LoginControllerTest extends TestCase
{
    public static function getRandomString()
    {
        $n = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    public static function getRandomEmail()
    {
        $n = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomEmail1 = '';
        $randomEmail2 = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomEmail1 .= $characters[$index];
        }

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomEmail2 .= $characters[$index];
        }

        $randomEmail = $randomEmail1.'@'. $randomEmail2.'.com';
        return $randomEmail;
    }

    public function testCheckAccExistFunction()
    {
        $_POST['username'] = 'qdoan21';
        $_POST['email']  = '123@gmail.com';
        $checkAccExist = MySqlConnect::connect()
            ->table('users')
            ->where([
                'username' => $_POST['username'],
                'email'    => $_POST['email']
            ], "OR")
            ->select();
        if (count($checkAccExist) == 1) {
            $this->assertNotEmpty($checkAccExist);
            $this->assertIsArray($checkAccExist);
        }
    }

    public function testCreateAccountFunction()
    {
        $randomString = LoginControllerTest::getRandomString();
        $randomEmail = LoginControllerTest::getRandomEmail();
        
        $_POST['username'] = $randomString;
        $_POST['email']    = $randomEmail;
        $_POST['address']   = $randomString;
        $_POST['password']  = $randomString;
        
        $createAcc = MySqlConnect::connect()
            ->table('users')
            ->values([
                'username' => $_POST['username'],
                'email'    => $_POST['email'],
                'address'   => $_POST['address'],
                'password'  => $_POST['password']
            ])
            ->insert();
        $this->assertTrue($createAcc);
    }
    public function testLoginFunction()
    {
        $_POST['username'] = 'qdoan21';
        $_POST['password']  = '123';
        $aResult = MySqlConnect::connect()
            ->table('users')
            ->where([
                'username' => $_POST['username'],
                'password'  => $_POST['password']
            ])
            ->select();
        $this->assertNotEmpty($aResult);
        $this->assertIsArray($aResult);
    }
}
