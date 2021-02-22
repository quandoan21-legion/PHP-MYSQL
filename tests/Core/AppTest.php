<?php
namespace BasicTest\Core;

use PHPUnit\Framework\TestCase;
use Basic\Core\App;

class AppTest extends TestCase
{
    public function testIsString()
    {
        $oSet = App::get('configs/database');
        $this->assertNotNull($oSet);
        $this->assertIsArray($oSet);
    }
}
