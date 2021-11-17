<?php

use EasyTransac\Entities\Cancellation;
use PHPUnit\Framework\TestCase;

class CancellationTest extends TestCase
{
    public function testToArray()
    {
        $fixture = $this->getFixture();

        $c = new Cancellation();
        $c->setLanguage($fixture['Language']);
        $c->setTid($fixture['Tid']);

        $this->assertEquals($c->toArray(), $fixture);
    }

    protected function getFixture()
    {
        return [
            'Language' => 'FRE',
            'Tid' => '123456',
        ];
    }
}
