<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 4/17/17
 * Time: 11:06 PM
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\Group as BaseGroup;

class Group extends BaseGroup
{
	protected $id;

	// The rest is inherited from the parent class
}