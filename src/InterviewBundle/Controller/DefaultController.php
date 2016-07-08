<?php

namespace InterviewBundle\Controller;

use InterviewBundle\Document\Bio;
use InterviewBundle\Services\BioServices;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller {
  
  private $serializer;
		  
  function __construct() {
	
	$normalizers = array(new ObjectNormalizer());
	$encoders = array(new JsonEncoder());

	$this->serializer = new Serializer($normalizers, $encoders);
	
  }

  /**
   * @Route("/bios")
   */
  public function indexAction() {

//	  $bio = new Bio();
//	  $bio->setName(array(
//		  'first' => 'Mubashar',
//		  'last' => 'Khokhar'
//	  ));
//	  
//	  // iD : 577e9fddae2be4b4608b456a
//
//	  $dm = $this->get('doctrine_mongodb')->getManager();

	$bioRepo = $this->get('doctrine_mongodb')->getRepository('InterviewBundle:Bio');

//	$bios = $bioRepo->findByFirstName('John');
	$bios = $bioRepo->findByDeadBefore(1999);
//	$bios = $bioRepo->findByContribution('Ruby');
//        ->find("51df07b094c6acd67e492f41");

	$json = $this->serializer->serialize($bios, 'json');
	
	$response = new Response($json);	
	$response->headers->set('Content-Type', 'application/json');

	return $response;
  }
  
  /**
   * @Route("/awards")
   */
  public function awardsAction() {
	

//	$service = new BioServices();
	
	$bioRepo = $this->get('interview_bundle.bios_service');
	
	$bios = $bioRepo->getAllAwards();
	
//	$json = $this->serializer->serialize($bios, 'json');
	
	$json = json_encode($bios, JSON_PRETTY_PRINT);
	$response = new Response($json);
	$response->headers->set('Content-Type', 'application/json');

	return $response;
	
  }
}
