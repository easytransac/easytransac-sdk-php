<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class DocumentTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$fixture = $this->getFixture();
    	
        $c = new \EasyTransac\Entities\Document();
        $c->setComment($fixture['Comment']);
        $c->setDocumentType($fixture['DocumentType']);
        $c->setStatus($fixture['Status']);
        $c->setDate($fixture['Date']);
        $c->setDateUpdated($fixture['DateUpdated']);
        $c->setContent($fixture['Content']);
        $c->setExtension($fixture['Extension']);
        $c->setId($fixture['Id']);
        
        $this->assertEquals($c->getComment(), $fixture['Comment']);
        $this->assertEquals($c->getDocumentType(), $fixture['DocumentType']);
        $this->assertEquals($c->getStatus(), $fixture['Status']);
        $this->assertEquals($c->getDate(), $fixture['Date']);
        $this->assertEquals($c->getDateUpdated(), $fixture['DateUpdated']);
        $this->assertEquals($c->getContent(), $fixture['Content']);
        $this->assertEquals($c->getExtension(), $fixture['Extension']);
        $this->assertEquals($c->getId(), $fixture['Id']);
    }
    
    public function testToArray()
    {
    	$fixture = $this->getFixture();
    	
    	$c = new \EasyTransac\Entities\Document();
    	$c->setComment($fixture['Comment']);
    	$c->setDocumentType($fixture['DocumentType']);
    	$c->setStatus($fixture['Status']);
    	$c->setDate($fixture['Date']);
    	$c->setDateUpdated($fixture['DateUpdated']);
    	$c->setContent($fixture['Content']);
    	$c->setExtension($fixture['Extension']);
    	$c->setId($fixture['Id']);

    	$this->assertEquals($c->toArray(), $fixture);
    }
    
    protected function getFixture() 
    {
    	return [
    		'Id' => 'WEX3SJ6B9G',
    		'DocumentType' => 'ACTIVITY_PROOF',
    		'Status' => 'valid',
    		'Date' => '2019-05-23 15:30:02',
    		'DateUpdated' => '2019-05-23 15:30:02',
    		'Content' => 'r8eg4er854ger4g6reg',
    		'Comment' => 'nothing to say',
    		'Extension' => 'png',
    	];
    }
}

?>