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
        $this->assertSame('some text', $result);

        $result = Foo::stripQuotes("some 'text'");
        $this->assertSame("some 'text'", $result);

        $result = Foo::stripQuotes(false);
        $this->assertSame('', $result);
    }
}
