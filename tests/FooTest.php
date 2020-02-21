<?php

namespace PHPUnit_Demo\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit_Demo\Foo;

/**
 * Tests for various stand-alone utility functions in the Foo class.
 */
class FooTest extends TestCase
{

    /**
     * Test the Foo::stripQuotes() method.
     *
     * @dataProvider dataStripQuotes
     *
     * @param string $input    The input string.
     * @param string $expected The expected function output.
     *
     * @return void
     */
    public function testStripQuotes($input, $expected)
    {
        $result = Foo::stripQuotes($input);
        $this->assertSame($expected, $result);
    }

    /**
     * Data provider for the testStripQuotes() test.
     *
     * @see testStripQuotes()
     *
     * @return array[]
     */
    public function dataStripQuotes()
    {
        return [
            ['"some text"', 'some text'],
            ["'some text'", 'some text'],
            ["'some text", "'some text"],
            ['some text"', 'some text"'],
            ["some 'text'", "some 'text'"],
            ['"some \'string\" with\' quotes"', 'some \'string\" with\' quotes'],
            ['"\'quoted_name\'"', "'quoted_name'"],
            [
                "'some text
another line
final line'",
                "some text
another line
final line",
            ],
            ['', ''],
            [false, ''],
            [12.345, '12.345'],
        ];
    }
}
