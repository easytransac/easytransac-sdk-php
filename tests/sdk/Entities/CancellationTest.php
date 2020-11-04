<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class CancellationTest extends PHPUnit_Framework_TestCase
{
    public function testToArray()
    {
    	$fixture = $this->getFixture();

    	$c = new \EasyTransac\Entities\Cancellation();
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

?>
