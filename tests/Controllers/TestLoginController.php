<?php

namespace ProjectUnitTest\Controllers;

use Basic\Controllers\LoginController;
use PHPUnit\Framework\TestCase;
use Basic\ControllersLoginController;

class TestLoginController
{
    public function testLogin()
    {
        $aValidation = (new LoginController())->validation(['username' => 'qdoan21']);
        $this->assertFalse($aValidation['suscess']);
    }
}
