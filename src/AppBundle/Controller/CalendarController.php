<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CalendarController extends Controller
{
    public function calendarAction()
    {
        return $this->render('calendar.html.twig',);
    }
	
	public function updateAction ()
	{
		$str_json = file_get_contents('php://input');
		
		
	}
}
