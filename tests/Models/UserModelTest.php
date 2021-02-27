<?php

namespace BasicTest\Models;

use PHPUnit\Framework\TestCase;
use Basic\Models\UserModel as UserModel;

class LoginControllerTest extends TestCase
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
        $_POST['username'] = 'qdoan21';
        $_POST['email']  = 'qdoan21@gmail.com';
        $checkAccExist = UserModel::isUserExist($_POST['username'], $_POST['email']);
        if ($checkAccExist) {
            $this->assertNotEmpty($checkAccExist);
            $this->assertGreaterThan(0, $checkAccExist);
        }
    }
    

    public function testCreateUserAccount()
    {
        new LoginControllerTest;
        $oRandomString = $this->getRandomString();
        $oRandomEmail = $this->getRandomEmail();

        $_POST['username'] = $oRandomString;
        $_POST['email']    = $oRandomEmail;
        $_POST['address']   = $oRandomString;
        $_POST['password']  = md5($oRandomString);
        UserModel::createUserAccount($_POST['username'], $_POST['email'], $_POST['address'], $_POST['password']);
        $this->assertGreaterThan(0, UserModel::isUserExist($_POST['username'] || $_POST['email']));
    }
    public function testHandleLogin()
    {
        $_POST['username'] = 'qdoan21';
        $_POST['password']  = '123';
        $aResult = UserModel::handleLogin($_POST['username'], $_POST['password']);
        $this->assertNotEmpty($aResult);
        $this->assertGreaterThan(0, UserModel::handleLogin($_POST['username'], $_POST['password']));
    }
}
