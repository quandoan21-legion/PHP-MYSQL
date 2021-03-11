<?php

namespace BasicTest\Models;

use PHPUnit\Framework\TestCase;
use Basic\Models\UserModel;

class UserControllerTest extends TestCase
{
    public function getRandomString()
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

    public function getRandomEmail()
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

        $randomEmail = $randomEmail1 . '@' . $randomEmail2 . '.com';
        return $randomEmail;
    }

    public function testIsUserExist()
    {
        $email         = 'wiloke@gmail.com';
        $checkAccExist = UserModel::isUserExists($email);
        $this->assertNotEmpty($checkAccExist);
        $this->assertIsBool($checkAccExist);
        $this->assertGreaterThan(0, $checkAccExist);
    }


    public function testCreateUserAccount()
    {
        $oRandomString = $this->getRandomString();
        $oRandomEmail  = $this->getRandomEmail();

        $username = $oRandomString;
        $email    = $oRandomEmail;
        $address  = $oRandomString;
        $password = $oRandomString;
        UserModel::createUserAccount($username, $email, $address, $password);
        $this->assertGreaterThan(0, UserModel::isUserExists($email));
        $this->assertIsBool(UserModel::isUserExists($email));
    }
    public function testHandleLogin()
    {
        $username = 'wiloke';
        $password = '123';
        $aResult  = UserModel::handleLogin($username, $password);
        $this->assertNotEmpty($aResult);
        $this->assertGreaterThan(0, count($aResult));
    }
}
