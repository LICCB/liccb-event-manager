<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 4/12/17
 * Time: 3:05 PM
 */

namespace AppBundle\Entity;

use AppBundle\AppBundle;
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
	 * @var integer
	 */
	protected $permission_id;

	/**
	 * @var AppBundle\Entity\Permission
	 */
	protected $permission;

	/**
	 * PermissionRole constructor.
	 * @param $name
	 * @param $perm_id
	 */
	public function __construct($name, $perm_id)
	{
		$this->name = $name;
		$this->permission_id = $perm_id;
	}

	public function getPermissionId(){
		return $this->permission_id;
	}

	public function getPermission(){
		return $this->permission;
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