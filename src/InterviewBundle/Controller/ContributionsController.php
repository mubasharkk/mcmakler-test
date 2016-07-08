<?php

namespace InterviewBundle\Controller;

use InterviewBundle\Document\Bio;
use InterviewBundle\Services\BioServices;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of ContributionsController
 *
 * @author mubasharkk
 */
class ContributionsController extends Controller {
  
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
}
