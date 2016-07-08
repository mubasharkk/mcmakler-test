<?php

namespace InterviewBundle\Tests\Services;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ServicesTest extends WebTestCase {
  
  static $container;
  
  static $repo;

  public static function setUpBeforeClass() {
	//start the symfony kernel
	$kernel = static::createKernel();
	$kernel->boot();

	//get the DI container
	self::$container = $kernel->getContainer();

	//now we can instantiate our service (if you want a fresh one for
	//each test method, do this in setUp() instead
	self::$repo = self::$container->get('interview_bundle.bios_service');
	
  } 
  
  public function testService(){
	
	$contribs = self::$repo->getAllContributions();
		
	$this->assertEquals(TRUE, is_array($contribs));
	
  }

}
