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
     * @return void
     */
    public function testStripQuotes()
    {
        $result = Foo::stripQuotes('"some text"');
        $this->assertSame('some text', $result, 'stripping quotes failed');

        $result = Foo::stripQuotes("some 'text'");
        $this->assertSame("some 'text'", $result, 'failed with quotes in string');

        $result = Foo::stripQuotes(false);
        $this->assertSame('', $result, 'failed with non-string input');
    }
}
