<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 4/1/17
 * Time: 4:06 PM
 */

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

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

	public function __construct()
	{
		parent::__construct();
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
}