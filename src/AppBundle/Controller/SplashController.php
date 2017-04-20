<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SplashController extends Controller
{
    public function splashAction()
    {

        return $this->render('splash.html.twig');
    }
}
