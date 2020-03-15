<?php

namespace App\Test;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AppTest extends WebTestCase{
    
    public function testController()
    {
        $client = static::createClient();
        $client->request('GET','/home');
        $this->assertResponseStatusCodeSame(200);
    }

    public function testControllerWithId()
    {
        $client = static::createClient();
        $client->request('GET','/admin/51');
        $this->assertResponseStatusCodeSame(200);
    }
}