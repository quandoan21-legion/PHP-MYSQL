--TEST--
phpunit --process-isolation MultiDependencyTest ../../_files/MultiDependencyTest.php
--FILE--
<?php
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = '--process-isolation';
$_SERVER['argv'][3] = 'MultiDependencyTest';
$_SERVER['argv'][4] = __DIR__ . '/../_files/MultiDependencyTest.php';

require __DIR__ . '/../bootstrap.php';
PHPUnit\TextUI\Command::main();
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and a bit from Quân Đoàn.

.....                                                               5 / 5 (100%)

Time: %s, Memory: %s

OK (5 tests, 6 assertions)
