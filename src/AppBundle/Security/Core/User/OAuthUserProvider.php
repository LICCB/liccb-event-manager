<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 4/1/17
 * Time: 5:08 PM
 */

namespace AppBundle\Security\Core\User;

use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\FOSUBUserProvider as BaseClass;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserChecker;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class OAuthUserProvider
 * @package AppBundle\Security\Core\User
 */
class OAuthUserProvider extends BaseClass
{
    /**
     * {@inheritdoc}
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
    	$socialID = $response->getUsername();
    	$socialEmail = $response->getEmail();
    	$user = $this->userManager->findUserBy(array(
    		$this->getProperty($response)=>$socialID
	    ));

    	if(!($user instanceof  UserInterface)){
    		$user = $this->userManager->findUserByEmail($socialEmail);
    		if($user instanceof UserInterface){
    			$user->setGoogleID($socialID);
		    }
	    }

    	if($user instanceof UserInterface) {
		    $checker = new UserChecker();
		    $checker->checkPreAuth($user);
	    }

	    return $user;
    }
}