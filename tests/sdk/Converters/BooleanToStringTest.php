<?php

use EasyTransac\Converters\BooleanToString;
use PHPUnit\Framework\TestCase;

class BooleanToStringTest extends TestCase
{
    public function testConvert()
    {
        $converter = new BooleanToString();

        $this->assertEquals('yes', $converter->convert(true));
        $this->assertEquals('no', $converter->convert(false));
        $this->assertEquals('test', $converter->convert('test'));
        $this->assertEquals(123, $converter->convert(123));
        $this->assertEquals(0, $converter->convert(0));
        $this->assertEquals(1, $converter->convert(1));
        $this->assertEquals('0', $converter->convert('0'));
        $this->assertEquals('1', $converter->convert('1'));
    }
}
