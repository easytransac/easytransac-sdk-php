<?php

use PHPUnit\Framework\TestCase;

class CancellationTest extends TestCase
{
    public function testToArray()
    {
        $fixture = $this->getFixture();

        $c = new EasyTransac\Entities\Cancellation();
        $c->setLanguage($fixture['Language']);
        $c->setTid($fixture['Tid']);

        $this->assertEquals($c->toArray(), $fixture);
    }

    protected function getFixture(): array
    {
        return [
            'Language' => 'FRE',
            'Tid' => '123456',
        ];
    }
}
