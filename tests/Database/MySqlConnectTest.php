<?php

namespace BasicTest\Database;

use PHPUnit\Framework\TestCase;
use Basic\Database\MySqlConnect;
use Basic\Controllers\UserController;

class MySqlConnectTest extends TestCase
{
    public function testSelect()
    {
        $oSelect = MySqlConnect::connect()
            ->table('posts')
            ->select();
        $this->assertIsArray($oSelect);
    }
    
}
