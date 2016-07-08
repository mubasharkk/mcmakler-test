<?php

namespace InterviewBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;


/**
 * Description of Bio
 *
 * @author mubasharkk
 * 
 * @MongoDB\Document(repositoryClass="InterviewBundle\Repository\BioRepository")
 *  
 */
class Bio
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="hash")
     */
    protected $name;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $title;

    /**
     * @MongoDB\Field(type="date")
     */
    protected $birth;

    /**
     * @MongoDB\Field(type="date")
     */
    protected $death;

    /**
     * @MongoDB\Field(type="collection")
     */
    protected $contribs;

    /**
     * @MongoDB\Field(type="collection")
     */
    protected $awards;
    

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param hash $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return hash $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set birth
     *
     * @param date $birth
     * @return self
     */
    public function setBirth($birth)
    {
        $this->birth = $birth;
        return $this;
    }

    /**
     * Get birth
     *
     * @return date $birth
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * Set death
     *
     * @param date $death
     * @return self
     */
    public function setDeath($death)
    {
        $this->death = $death;
        return $this;
    }

    /**
     * Get death
     *
     * @return date $death
     */
    public function getDeath()
    {
        return $this->death;
    }

    /**
     * Set contribs
     *
     * @param collection $contribs
     * @return self
     */
    public function setContribs($contribs)
    {
        $this->contribs = $contribs;
        return $this;
    }

    /**
     * Get contrib
     *
     * @return collection $contrib
     */
    public function getContribs()
    {
        return $this->contribs;
    }

    /**
     * Set awards
     *
     * @param collection $awards
     * @return self
     */
    public function setAwards($awards)
    {
        $this->awards = $awards;
        return $this;
    }

    /**
     * Get awards
     *
     * @return collection $awards
     */
    public function getAwards()
    {
        return $this->awards;
    }
	
	/**
	 * Get Fullname
	 */
	
	public function getFullname(){
	  return implode(' ', $this->name);
	}
}
