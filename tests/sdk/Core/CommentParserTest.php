<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');
require_once(__DIR__.'/../../Fixtures/ClassWithComments.php');

class CommentParserTest extends PHPUnit_Framework_TestCase
{
	public function testParse()
	{
		$t = new ClassWithComments();
		$parser = new \EasyTransac\Core\CommentParser($t);
		$items = $parser->parse();
		$items = iterator_to_array($items);
		
		$this->assertTrue(is_array($items));
		$this->assertEquals(count($items), 6);
		
		$this->assertTrue($items[0]['field'] == 'arg1' && $items[0]['name'] == 'Arg1' && $items[0]['type'] == 'map');
		$this->assertTrue($items[1]['field'] == 'arg2' && $items[1]['name'] == 'Arg2' && $items[1]['type'] == 'map');
		$this->assertTrue($items[2]['field'] == 'arg3' && $items[2]['name'] == 'Arg3' && $items[2]['type'] == 'object');
		$this->assertTrue($items[3]['field'] == 'arg4' && $items[3]['name'] == 'Arg4' && $items[3]['type'] == 'object');
		$this->assertTrue($items[4]['field'] == 'arg5' && $items[4]['name'] == 'Arg5' && $items[4]['type'] == 'array');
		$this->assertTrue($items[5]['field'] == 'arg6' && $items[5]['name'] == 'Arg6' && $items[5]['type'] == 'array');
	}
}

?>