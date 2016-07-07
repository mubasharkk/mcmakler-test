<?php

namespace InterviewBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

class BioRepository extends DocumentRepository {

  /**
   * Search by First Name
   * 
   * @param string $firstName
   */
  public function findByFirstName($firstName) {
	
	return $this->createQueryBuilder()
			->field('name.first')->equals($firstName)
            ->sort('name', 'ASC')
            ->getQuery()
            ->execute();
  }

  /**
   * Search by First Name
   * 
   * @param string $contributionName
   */  
  public function findByContribution($contributionName) {
	
  }

  /**
   * Search by Dead before
   * 
   * @param string $year
   */  
  public function findByDeadBefore($year) {
	
  }

}
