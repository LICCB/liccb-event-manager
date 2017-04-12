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

	protected $id;

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
		$rolesArr = array();
		foreach ($roles as $role){
			$rolesArr[] = strtoupper($role->getRole());
		}

		return $this->setRoles($rolesArr);
	}

	public function getRolesFromArray(){
		return new \Doctrine\Common\Collections\ArrayCollection($this->getRoles());
	}

}