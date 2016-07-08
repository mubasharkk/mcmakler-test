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

/**
 * Description of ContributionsController
 *
 * @author mubasharkk
 */
class ContributionsController extends Controller {

  private $serializer;
		  
  function __construct() {
	
	$normalizers = array(new ObjectNormalizer());
	$encoders = array(new JsonEncoder());

	$this->serializer = new Serializer($normalizers, $encoders);
	
  }
  
  /**
   * @Route("/contributions")
   */
  
  function indexAction(){
	
	$bioRepo = $this->get('interview_bundle.bios_service');
	$contribs = $bioRepo->getAllContributions();
	
	$json = json_encode($contribs, JSON_PRETTY_PRINT);
	$response = new Response($json);
	$response->headers->set('Content-Type', 'application/json');

	return $response;
	
  }
    
  /**
   * @Route("/contributions/{contributionName}")
   */
  
  function biosByContributionAction($contributionName){
	
	$bioRepo = $this->get('interview_bundle.bios_service');
	$contribs = $bioRepo->findContributions($contributionName);
	
	$json = $this->serializer->serialize($contribs, 'json');
	
	$response = new Response($json);
	$response->headers->set('Content-Type', 'application/json');

	return $response;
	
  }
  
  
  
}
