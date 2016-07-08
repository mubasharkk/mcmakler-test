<?php

namespace InterviewBundle\Services;

use InterviewBundle\Repository\BioRepository;

class BioServices {

  private $bioRepo;

  function __construct(BioRepository $bioRepo) {

	$this->bioRepo = $bioRepo;
  }

  public function getAllAwards() {

	$awards = array();
	
	$results = $this->bioRepo->findAllAwards();
	
	foreach($results as $res){
	  foreach($res->getAwards() as $award){
		$awards[] = $award;
	  }
	}
	
	return $awards	;
  }
  
  public function getAllContributions() {

	$contributions = array();
	
	$results = $this->bioRepo->findByContribution(NULL);
	
	foreach($results as $res){
	  foreach($res->getContribs() as $contrib){
		$contributions[] = $contrib;
	  }
	}
	
	return $contributions;
  }

}
