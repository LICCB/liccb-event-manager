<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CalendarController extends Controller
{
    public function calendarAction()
    {
        return $this->render('calendar.html.twig',);
    }
	
	public function updateAction()
    {
        $request = $this->container->get('request');
        $data = $this->get("request")->getContent();
        if(!empty($data)){
			$params = json_decode($data, true, 4);
		}
    }
}
