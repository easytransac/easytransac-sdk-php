<?php

use EasyTransac\Converters\YesNoLowerCase;
use PHPUnit\Framework\TestCase;

class YesNoLowerCaseTest extends TestCase
{
    public function testConvert()
    {
        $converter = new YesNoLowerCase();

        $this->assertEquals('yes', $converter->convert('Yes'));
        $this->assertEquals('no', $converter->convert('No'));
        $this->assertEquals('no', $converter->convert('no'));
        $this->assertEquals('yes', $converter->convert('yes'));
        $this->assertEquals('Test', $converter->convert('Test'));
    }
}
