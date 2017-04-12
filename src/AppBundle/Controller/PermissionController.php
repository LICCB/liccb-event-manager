<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PermissionRole;
use AppBundle\Form\PermissionRoles;
use AppBundle\Form\PermissionRolesMatrix;
use AppBundle\Entity\Permission;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PermissionController extends Controller
{
    public function editAction(Request $request)
    {

    	$permission = $this->getDoctrine()
		    ->getRepository('AppBundle:Permission')
		    ->find(1);
    	$data = $permission;

        $form = $this->createForm(PermissionRoles::class, $data);
        $form->handleRequest($request);

        if($form->isSubmitted()){
        	$data = $form->getData();
        	// Do things
        }

        return $this->render('permission/edit.html.twig', array(
        	'form' => $form->createView()
        ));
    }
}
