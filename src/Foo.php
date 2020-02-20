<?php

namespace PHPUnit_Demo;

class Foo
{
    /**
     * Strip quotes surrounding an arbitrary string.
     *
     * @param string $string The raw string.
     *
     * @return string String without quotes around it.
     */
    public static function stripQuotes($string)
    {
        return preg_replace('`^([\'"])(.*)\1$`Ds', '$2', $string);
    }
}
