<?php

namespace PHPUnit_Demo\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Examples of the different ways to conditionally skip a test.
 */
class SkipTest extends TestCase
{

    /**
     * Conditional test.
     *
     * This test will:
     * - Only run on PHP >= 7.3.
     * - Be marked as "risky" for not performing an assertion when run on PHP < 7.3.
     *
     * @dataProvider dataIsCountable
     * @coversNothing
     */
    public function testIsCountableNoSkipMarking($input, $expected)
    {
        if (\version_compare(\PHP_VERSION_ID, '70300', '<')) {
            return;
        }

        $this->assertSame($expected, is_countable($input));
    }

    /**
     * Conditional test.
     *
     * This test will:
     * - Only run on PHP >= 7.3.
     * - Show in runs on every PHP version (stable test count).
     *
     * This test will not:
     * - Give any indication about *why* the test was skipped.
     *
     * @dataProvider dataIsCountable
     * @coversNothing
     */
    public function testIsCountable($input, $expected)
    {
        if (\version_compare(\PHP_VERSION_ID, '70300', '<')) {
            $this->markTestSkipped();
            return;
        }

        $this->assertSame($expected, is_countable($input));
    }

    /**
     * Conditional test.
     *
     * This test will:
     * - Only run on PHP >= 7.3.
     * - Show in runs on every PHP version (stable test count).
     * - In verbose mode, show a message why the test was skipped.
     *
     * @dataProvider dataIsCountable
     * @coversNothing
     */
    public function testIsCountableWithMsg($input, $expected)
    {
        if (\version_compare(\PHP_VERSION_ID, '70300', '<')) {
            $this->markTestSkipped(
              'This test requires PHP 7.3.0+'
            );
        }

        $this->assertSame($expected, is_countable($input));
    }

    /**
     * Conditional test.
     *
     * This test will:
     * - Only run on PHP >= 7.3.
     * - Show in runs on every PHP version (stable test count).
     * - In verbose mode, show a message why the test was skipped.
     *
     * @requires PHP >= 7.3.0
     *
     * @dataProvider dataIsCountable
     * @coversNothing
     */
    public function testIsCountableAnnotation($input, $expected)
    {

        $this->assertSame($expected, is_countable($input));
    }

    /**
     * Data provider.
     *
     * @return array[]
     */
    public function dataIsCountable()
    {
        return [
            [[1, 2, 3], true],
            [false, false],
        ];
    }
}
