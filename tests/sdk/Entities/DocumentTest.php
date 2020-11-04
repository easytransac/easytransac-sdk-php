<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class DocumentTest extends PHPUnit_Framework_TestCase
{
    public function testSettersGetters()
    {
    	$fixture = $this->getFixture();

        $c = new \EasyTransac\Entities\Document();
        $c->setDocumentType($fixture['DocumentType']);
        $c->setContent($fixture['Content']);
        $c->setExtension($fixture['Extension']);

        $this->assertEquals($c->getDocumentType(), $fixture['DocumentType']);
        $this->assertEquals($c->getContent(), $fixture['Content']);
        $this->assertEquals($c->getExtension(), $fixture['Extension']);
    }

    public function testToArray()
    {
    	$fixture = $this->getFixture();
		$c = new \EasyTransac\Entities\Document();
		$c->hydrate(json_decode(json_encode($fixture)));

    	$this->assertEquals($c->toArray(), $fixture);

		$this->assertEquals($c->getComment(), $fixture['Comment']);
		$this->assertEquals($c->getStatus(), $fixture['Status']);
		$this->assertEquals($c->getDate(), $fixture['Date']);
        $this->assertEquals($c->getDateUpdated(), $fixture['DateUpdated']);
		$this->assertEquals($c->getId(), $fixture['Id']);
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
