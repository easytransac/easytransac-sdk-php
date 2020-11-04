<?php

require_once(__DIR__.'/../../../sdk/EasyTransac/autoload.php');

class AddCreditCardTest extends PHPUnit_Framework_TestCase
{
    public function testToArray()
    {
        $cust = (new \EasyTransac\Entities\Customer())->setEmail("test@test.com");
        $card = (new \EasyTransac\Entities\CreditCard())->setCVV("123");

        $c = new \EasyTransac\Entities\AddCreditCard();
        $c->setLanguage('FR');
        $c->setClientIp('127.0.0.1');
        $c->setCustomer($cust);
        $c->setCreditCard($card);

        $a = [
            'Email' => 'test@test.com',
            'CardCVV' => '123',
            'Language' => 'FR',
            'ClientIp' => '127.0.0.1'
        ];

        $this->assertEquals($c->toArray(), $a);
    }

	public function testEntityMisc()
	{
		$c = new \EasyTransac\Entities\AddCreditCard();
		$c->setFakeArg('test');
		$r = $c->toArray();
		$this->assertEquals($r['FakeArg'], 'test');
		$this->assertEquals($c->getFakeArg(), 'test');
		$this->assertEquals($c->getFakeArgInexistant(), null);
	}
}

?>
