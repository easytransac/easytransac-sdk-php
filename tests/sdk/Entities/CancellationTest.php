<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class CancellationTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$c = new \EasyTransac\Entities\Cancellation();
    	
    	$c->setLanguage('FR');
    	$c->setTid('123456');
    	
    	$this->assertEquals($c->getLanguage(), 'FR');
    	$this->assertEquals($c->getTid(), '123456');
    }

    public function testToArray()
    {
    	$c = new \EasyTransac\Entities\Cancellation();
    	$c->setLanguage('FR');
    	$c->setTid('123456');
    	
    	$a = [
    		'Language' => 'FR',
    		'Tid' => '123456'
    	];
    	
    	$this->assertEquals($c->toArray(), $a);
    }
}

?>