// src/AppBundle/Entity/RegistrationForm.php
namespace AppBundle\Entity;

class RegistrationForm
{
    private $name;
    private $email;
	private $event;
    private $over18;
	private $swim_experience;
	private $boat_experience;
	private $cpr_certification;
	private $phone;
	private $emergency_contact_name;
	private $emergency_contact_phone;
	private $participant_type;
	private $seats;
	private $paired_boater;
	private $zip;
	private $event_discovery;
	private $boathouse_discovery;

	// additional information volunteering
	private $prior;
	private $role_familiarity;
	private $vehicle_capacity;
}
