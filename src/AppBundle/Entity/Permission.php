<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 4/12/17
 * Time: 2:35 PM
 */

namespace AppBundle\Entity;

use FOS\UserBundle\Model\Group as Base; // Extend group because it does what we want

/**
 * @author Jake Israel <jcmisrael@gmail.com>
 */
class Permission extends Base {

	/**
	 * @var mixed
	 */
	protected $id;

	/**
	 * @var \Doctrine\Common\Collections\Collection
	 */
	protected $permissionRoles;

	public function __construct($name, array $roles = array())
	{
		parent::__construct($name, $roles);
		$this->permissionRoles = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Returns true or false whether a set of roles contains a valid permission role
	 *
	 * @param array $roles
	 * @return bool
	 */
	public function hasRoleInArray($roles){
		foreach ($roles as $role){
			if($this->hasRole($role)){
				return true;
			}
		}
		return false;
	}

	public function setRolesFromArray(\Doctrine\Common\Collections\ArrayCollection $roles)
	{
		$this->permissionRoles = $roles;

		$rolesArr = array();
		foreach ($roles as $role){
			$rolesArr[] = strtoupper($role->getRole());
		}

		return $this->setRoles($rolesArr);
	}

	public function getRolesFromArray(){
		return $this->permissionRoles;
	}

}