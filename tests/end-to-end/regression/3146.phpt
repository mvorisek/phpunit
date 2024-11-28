--TEST--
Always evaluate php assertions
--INI--
zend.assertions=0
--FILE--
<?php declare(strict_types=1);
$_SERVER['argv'][] = '--do-not-cache-result';
$_SERVER['argv'][] = '--no-configuration';
$_SERVER['argv'][] = __DIR__ . '/3146/Issue3146Test.php';

require_once __DIR__ . '/../../bootstrap.php';
(new PHPUnit\TextUI\Application)->run($_SERVER['argv']);
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

Runtime: %s

.F....                                                              6 / 6 (100%)

Time: %s, Memory: %s

There was 1 failure:

1) PHPUnit\TestFixture\Issue3146Test::testAlwaysFalseAssert
assert(false)

%sIssue3146Test.php:%i

FAILURES!
Tests: 6, Assertions: 8, Failures: 1.
