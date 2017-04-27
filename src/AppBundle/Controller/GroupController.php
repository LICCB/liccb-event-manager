<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Group;
use AppBundle\Entity\PermissionRole;
use FOS\UserBundle\Controller\GroupController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use FOS\UserBundle\Event\GetResponseGroupEvent;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Event\FilterGroupResponseEvent;

class GroupController extends BaseController
{
    public function editAction(Request $request, $groupName)
    {
    	/** @var Group $group */
	    $group = $this->findGroupBy('name', $groupName);

	    /** @var $dispatcher EventDispatcherInterface */
	    $dispatcher = $this->get('event_dispatcher');

	    $event = new GetResponseGroupEvent($group, $request);
	    $dispatcher->dispatch(FOSUserEvents::GROUP_EDIT_INITIALIZE, $event);

	    if (null !== $event->getResponse()) {
		    return $event->getResponse();
	    }

	    // Get ArrayCollection of roles assigned to group
	    $roles = $this->getDoctrine()
		    ->getRepository('AppBundle:PermissionRole')
		    ->findBy(array('name' => $group->getRoles()));

	    /** @var $formFactory FactoryInterface */
	    $formFactory = $this->get('fos_user.group.form.factory');

	    // Set defaults
	    $data = array();
	    $data['name'] = $group->getName();
	    $data['rolesForm']['roles'] = $roles;

	    // Set form data_class to null to use an array
	    $form = $formFactory->createForm(array(
	    	'data_class' => null
	    ));
	    $form->setData($data);

	    $form->handleRequest($request);

	    if ($form->isSubmitted() && $form->isValid()) {
		    /** @var $groupManager \FOS\UserBundle\Model\GroupManagerInterface */
		    $groupManager = $this->get('fos_user.group_manager');

		    $data = $form->getData();

		    $event = new FormEvent($form, $request);
		    $dispatcher->dispatch(FOSUserEvents::GROUP_EDIT_SUCCESS, $event);
		    // Maybe coulda hooked into here?

		    // Convert the ArrayCollection of roles to an array of strings
		    $rolesArray = array();
		    foreach ($data['rolesForm']['roles'] as $role){
		    	/* @var PermissionRole $role */
		    	$rolesArray[] = strtoupper($role->getRole());
		    }

		    // Manually set name and roles
		    $group->setName($data['name']);
		    $group->setRoles($rolesArray);

		    // Updates group | Persists and flushes Database
		    $groupManager->updateGroup($group);

		    if (null === $response = $event->getResponse()) {
			    $url = $this->generateUrl('fos_user_group_show', array('groupName' => $group->getName()));
			    $response = new RedirectResponse($url);
		    }

		    $dispatcher->dispatch(FOSUserEvents::GROUP_EDIT_COMPLETED, new FilterGroupResponseEvent($group, $request, $response));

		    return $response;
	    }

	    return $this->render('@FOSUser/Group/edit.html.twig', array(
		    'form' => $form->createView(),
		    'group_name' => $group->getName(),
	    ));
    }
}
