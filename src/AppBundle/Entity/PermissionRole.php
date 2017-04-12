<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 4/12/17
 * Time: 3:05 PM
 */

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;

class PermissionRole implements RoleInterface
{

	/**
	 * @var mixed
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * PermissionRole constructor.
	 * @param $name
	 */
	function __construct($name)
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getRole()
	{
		return strtoupper($this->getName());
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
}