<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TestFixture;

use function assert;
use function ini_get;
use function ini_set;
use AssertionError;
use PHPUnit\Framework\TestCase;

class Issue3146Test extends TestCase
{
    public function testAlwaysTrueAssert(): void
    {
        $this->assertTrue(true);
        assert(true);
    }

    public function testAlwaysFalseAssert(): void
    {
        $this->assertTrue(true);
        assert(false);
    }

    public function testAssertionError(): void
    {
        $this->expectException(AssertionError::class);
        $this->expectExceptionMessage('assert(false)');
        assert(false);
    }

    public function testGetZendAssertions(): void
    {
        $this->assertSame('1', ini_get('zend.assertions'));
    }

    public function testSetZendAssertionsOne(): void
    {
        ini_set('zend.assertions', 1);
        $this->assertTrue(true);
    }

    public function testSetZendAssertionsZero(): void
    {
        ini_set('zend.assertions', 0);
        $this->assertTrue(true);
    }
}
