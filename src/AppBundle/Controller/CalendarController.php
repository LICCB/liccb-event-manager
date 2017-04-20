<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Org_event;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class CalendarController extends Controller
{
    public function calendarAction()
    {
        return $this->render('calendar.html.twig');
<<<<<<< HEAD
=======
    }
	
	public function updateAction()
    {
        $request = $this->container->get('request');
        $data = $this->get("request")->getContent();
        if(!empty($data)){
			$params = json_decode($data, true, 4);
		}
>>>>>>> origin/Google-Calendar
    }
	
	public function updateAction(Request $request)
	{
		/* Because the database can only process so many events at once
		 * we need a batch processing size
		 */
		$batchSize=5;
		
		//Set the timezone for this execution - relevant to datetime objects
		date_default_timezone_set('America/New_York');
		
		//Get the raw content of the array
		$content = $request->getContent();
		//Use native json_decode method to get array contents
		$jsonArray = json_decode(utf8_encode($content),true);			
		
		//Get the entity manager for interacting with the Database
		$em = $this->getDoctrine()->getManager();
		
		$arrayLength = count($jsonArray);
		
		//$event = new Org_event;
		//$event->setOrgEventName("Not a Real Event");
		//$event->setOrgEventType("Just a jolly good time");
		//$event->setOrgEventDescription("Hey guys how you doing");
		//$event->setCapacity(30);
		//$event->setDate(new \DateTime('now'));
		//$event->setSignupStart(new \DateTime('yesterday'));
		//$event->setSignupEnd(new \DateTime('tomorrow'));
		//$em->persist($event);
			
		//This function parses the array and creates events
		for($i = 0; $i < $arrayLength ; $i++) {
			$event = new Org_event;
			//Date is set here because PHP does not use a real format
			$date = $jsonArray[$i]['start'];
			$fixed = date('Y-m-d', strtotime(substr($date,0,10)));
			
			$event->setOrgEventName($jsonArray[$i]['summary']);
			$event->setOrgEventType("Unspecified");
			$event->setCapacity(30);
			$event->setDate($fixed);
			$event->setOrgEventDescription($jsonArray[$i]['description']);
			$event->setSignupStart(new \DateTime('yesterday'));
			$event->setSignupEnd(new \DateTime('yesterday'));
			
			$em->persist($event);
			echo $jsonArray[$i]['id'];
			if(($i % $batchSize) === 0) {
				$em->flush();
				$em->clear();
			}
		}
		
		$em->flush();
		$em->clear();

		return $this->render('calendar.html.twig');
	}
}
