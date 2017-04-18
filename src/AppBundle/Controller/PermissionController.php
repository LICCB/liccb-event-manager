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

    	$permissions = $this->getDoctrine()
		    ->getRepository('AppBundle:Permission')
		    ->findAll();
    	$data = array(
    		'permissions' => $permissions
	    );

        $form = $this->createForm(PermissionRolesMatrix::class, $data);
        $form->handleRequest($request);

        if($form->isSubmitted()){
        	$data = $form->getData();

        	$permissions = $data['permissions'];
        	$em = $this->getDoctrine()->getManager();
        	foreach ($permissions as $permission){
        		$em->persist($permission);
	        }
	        $em->flush();

	        return $this->redirectToRoute('permission_edit'); // Redirect
        }

        return $this->render('permission/edit.html.twig', array(
        	'form' => $form->createView()
        ));
    }
}
