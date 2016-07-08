<?php

namespace InterviewBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
		
		// 1. check request statue of "/hello"
        $crawler = $client->request('GET', '/hello');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
		
		// 2. check response type of "/hello"
        $crawler = $client->request('GET', '/hello');
		$json = json_decode($client->getResponse()->getContent());		
		$is_json = is_object($json) ? TRUE : FALSE;		
        $this->assertEquals(TRUE, $is_json);
				
		// 3. check request statue of "/contributions"
        $crawler = $client->request('GET', '/contributions');		
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
		
		// 4. check request statue of "/contributions/fake"
        $crawler = $client->request('GET', '/contributions/fake');		
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
		
		//5. check request statue of "/contributions/OOP"
        $crawler = $client->request('GET', '/contributions/OOP');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
				
    }
}
