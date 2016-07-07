<?php

namespace InterviewBundle\Controller;

use InterviewBundle\Document\Bio;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;



class DefaultController extends Controller
{
    /**
     * @Route("/bios")
     */
    public function indexAction()
    {
	  
//	  $bio = new Bio();
//	  $bio->setName(array(
//		  'first' => 'Mubashar',
//		  'last' => 'Khokhar'
//	  ));
//	  
//	  // iD : 577e9fddae2be4b4608b456a
//
//	  $dm = $this->get('doctrine_mongodb')->getManager();
	  
	  $my_bio = $this->get('doctrine_mongodb')
        ->getRepository('InterviewBundle:Bio')
        ->find("51df07b094c6acd67e492f41");
	  

	  return new Response('My Bio: '.$my_bio->getFullname());
	
    }
}
