--TEST--
Test incorrect testFile is reported
--ARGS--
--no-configuration tests nonExistingFile.php
--FILE--
<?php declare(strict_types=1);
require __DIR__ . '/../../bootstrap.php';
PHPUnit\TextUI\Command::main();
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and a bit from Quân Đoàn.

Cannot open file "nonExistingFile.php".
