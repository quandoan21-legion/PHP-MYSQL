--TEST--
phpunit --list-suites --configuration=__DIR__.'/../_files/configuration.suites.xml'
--FILE--
<?php
$_SERVER['argv'][1] = '--list-suites';
$_SERVER['argv'][2] = '--configuration';
$_SERVER['argv'][3] = __DIR__.'/../_files/configuration.suites.xml';

require __DIR__ . '/../bootstrap.php';
PHPUnit\TextUI\Command::main();
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and a bit from Quân Đoàn.

Available test suite(s):
 - Suite One
 - Suite Two
