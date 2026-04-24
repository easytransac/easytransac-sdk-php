<?php

use PHPUnit\Framework\TestCase;

class DropinSessionTest extends TestCase
{
    public function testHydrateWithUppercaseSessionToken()
    {
        $entity = new EasyTransac\Entities\DropinSession();
        $fixture = [
            'SESSION_TOKEN' => 'sess_uppercase',
            'RequestId' => 'req_uppercase',
            'Status' => 'pending',
        ];

        $entity->hydrate(json_decode(json_encode($fixture)));

        $this->assertEquals($fixture, $entity->toArray());
        $this->assertTrue($entity->hasToken());
        $this->assertEquals('sess_uppercase', $entity->getToken());
        $this->assertEquals('sess_uppercase', $entity->getSessionToken());
        $this->assertEquals('sess_uppercase', $entity->getUppercaseSessionToken());
    }

    public function testHydrateWithSessionToken()
    {
        $entity = new EasyTransac\Entities\DropinSession();
        $fixture = [
            'SessionToken' => 'sess_camel_case',
            'RequestId' => 'req_camel_case',
            'Status' => 'pending',
        ];

        $entity->hydrate(json_decode(json_encode($fixture)));

        $this->assertEquals($fixture, $entity->toArray());
        $this->assertTrue($entity->hasToken());
        $this->assertEquals('sess_camel_case', $entity->getToken());
        $this->assertEquals('sess_camel_case', $entity->getSessionToken());
    }

    public function testHydrateWithTokenFallback()
    {
        $entity = new EasyTransac\Entities\DropinSession();
        $fixture = [
            'Token' => 'sess_fallback',
            'RequestId' => 'req_fallback',
            'Status' => 'pending',
        ];

        $entity->hydrate(json_decode(json_encode($fixture)));

        $this->assertEquals($fixture, $entity->toArray());
        $this->assertTrue($entity->hasToken());
        $this->assertEquals('sess_fallback', $entity->getToken());
        $this->assertEquals('sess_fallback', $entity->getSessionToken());
        $this->assertEquals('sess_fallback', $entity->getRawToken());
    }

    public function testHasTokenReturnsFalseWhenNoTokenExists()
    {
        $entity = new EasyTransac\Entities\DropinSession();
        $entity->hydrate((object) [
            'RequestId' => 'req_missing',
            'Status' => 'pending',
        ]);

        $this->assertFalse($entity->hasToken());
        $this->assertNull($entity->getToken());
        $this->assertNull($entity->getSessionToken());
    }
}
