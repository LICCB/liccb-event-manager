<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VolunteersController extends Controller
{
    public function addAction()
    {
        return $this->render('admin/volunteers/add.html.twig');
    }
}
