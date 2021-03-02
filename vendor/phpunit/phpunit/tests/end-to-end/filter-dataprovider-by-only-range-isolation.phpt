--TEST--
phpunit --process-isolation --filter \#1-3 DataProviderFilterTest ../../_files/DataProviderFilterTest.php
--FILE--
<?php
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = '--process-isolation';
$_SERVER['argv'][3] = '--filter';
$_SERVER['argv'][4] = '#1-3';
$_SERVER['argv'][5] = 'DataProviderFilterTest';
$_SERVER['argv'][6] = __DIR__ . '/../_files/DataProviderFilterTest.php';

require __DIR__ . '/../bootstrap.php';
PHPUnit\TextUI\Command::main();
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and a bit from Quân Đoàn.

...                                                                 3 / 3 (100%)

Time: %s, Memory: %s

OK (3 tests, 3 assertions)
