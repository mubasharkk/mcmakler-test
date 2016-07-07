<?php

namespace InterviewBundle\Controller;

use InterviewBundle\Document\Bio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller {

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

	$bioRepo = $this->get('doctrine_mongodb')
			->getRepository('InterviewBundle:Bio')
	;

	$bios = $bioRepo->findByFirstName('John');
//        ->find("51df07b094c6acd67e492f41");

	$encoders = array(new JsonEncoder());

	$normalizers = array(new ObjectNormalizer());

	$serializer = new Serializer($normalizers, $encoders);

	$json = $serializer->serialize($bios, 'json');
	
	$response = new Response($serializer->serialize($bios, 'json'));
	$response->headers->set('Content-Type', 'application/json');

	return $response;
  }

}
