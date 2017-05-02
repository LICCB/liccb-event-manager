<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use AppBundle\Entity\Group;

class User extends BaseUser
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $googleID;

	/*
	 * @var ArrayCollection
	 */
	protected $groups;

	public function __construct()
	{
		parent::__construct();
		$this->groups = new ArrayCollection();
	}

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set googleID
     *
     * @param string $googleID
     *
     * @return User
     */
    public function setGoogleID($googleID)
    {
        $this->googleID = $googleID;

        return $this;
    }

	/**
	 * {@inheritdoc}
	 */
	public function setEmail($email)
	{
		parent::setUsername($email);
		return parent::setEmail($email);
	}
}
