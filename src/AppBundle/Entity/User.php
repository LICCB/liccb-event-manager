<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 4/1/17
 * Time: 4:06 PM
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use AppBundle\Entity\Group;

class User extends BaseUser
{
	/*
	 * @var int
	 */
	protected $id;

	/*
	 * @var string
	 */
	private $googleID;

	/*
	 * @var ???
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
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get googleID
	 *
	 * @return string
	 */
	public function getGoogleID(){
		return $this->googleID;
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