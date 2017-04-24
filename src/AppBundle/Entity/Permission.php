<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 4/12/17
 * Time: 2:35 PM
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @author Jake Israel <jcmisrael@gmail.com>
 */
class Permission {

	/**
	 * @var mixed
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var ArrayCollection
	 */
	protected $roles;

	/**
	 * Permission constructor.
	 * @param string $name
	 * @param ArrayCollection $roles
	 */
	public function __construct($name, $roles)
	{
		if(!$roles)
			$roles = new ArrayCollection();
		$this->name = $name;
		$this->roles = $roles;
	}

	/**
	 * Override inherited method to do nothing
	 * @param string $role
	 * @return $this
	 */
	public function addRole($role)
	{
		return $this;
	}

	/**
	 * @return ArrayCollection
	 */
	public function getRoles()
	{
		return $this->roles;
	}

	/**
	 * @param ArrayCollection $roles
	 */
	public function setRoles($roles)
	{
		$this->roles = $roles;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param $name
	 * @return $this
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}
}