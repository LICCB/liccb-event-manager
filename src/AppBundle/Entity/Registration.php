<?php

// src/AppBundle/Entity/RegistrationForm.php
namespace AppBundle\Entity;

class RegistrationForm
{
	// Step 1
	private $registration_type;

	// Step 2
	private $event_selection;

	// Step 3
    private $over18;
	private $can_swim;
	private $boat_experience;
	private $cpr_certification;

	// Step 4
	private $full_name;
	private $email;
	private $phone_number;
	private $emergency_contact_name;
	private $emergency_contact_phone;
	private $boat_seats;
	private $paired_boater;

	// Step 5
	private $event_discovery;

	// Step 6
	private $boathouse_discovery;

	// additional information volunteering
	private $prior;
	private $role_familiarity;
	private $vehicle_capacity;
}
