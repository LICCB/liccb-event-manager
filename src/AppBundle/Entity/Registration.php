<?php

// src/AppBundle/Entity/RegistrationForm.php
namespace AppBundle\Entity;

class Registration
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
	private $emergency_contact_number;
	private $boat_seats;
	private $pairing_boater;

	// Step 5
	private $event_discovery;

	// Step 6
	private $boathouse_discovery;

	// additional information volunteering
	private $prior;
	private $role_familiarity;
	private $vehicle_capacity;

    /**
     * @var integer
     */
    private $id;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set registrationType
     *
     * @param string $registrationType
     *
     * @return Registration
     */
    public function setRegistrationType($registrationType)
    {
        $this->registration_type = $registrationType;

        return $this;
    }

    /**
     * Get registrationType
     *
     * @return string
     */
    public function getRegistrationType()
    {
        return $this->registration_type;
    }

    /**
     * Set eventSelection
     *
     * @param string $eventSelection
     *
     * @return Registration
     */
    public function setEventSelection($eventSelection)
    {
        $this->event_selection = $eventSelection;

        return $this;
    }

    /**
     * Get eventSelection
     *
     * @return string
     */
    public function getEventSelection()
    {
        return $this->event_selection;
    }

    /**
     * Set over18
     *
     * @param boolean $over18
     *
     * @return Registration
     */
    public function setOver18($over18)
    {
        $this->over18 = $over18;

        return $this;
    }

    /**
     * Get over18
     *
     * @return boolean
     */
    public function getOver18()
    {
        return $this->over18;
    }

    /**
     * Set canSwim
     *
     * @param boolean $canSwim
     *
     * @return Registration
     */
    public function setCanSwim($canSwim)
    {
        $this->can_swim = $canSwim;

        return $this;
    }

    /**
     * Get canSwim
     *
     * @return boolean
     */
    public function getCanSwim()
    {
        return $this->can_swim;
    }

    /**
     * Set boatExperience
     *
     * @param boolean $boatExperience
     *
     * @return Registration
     */
    public function setBoatExperience($boatExperience)
    {
        $this->boat_experience = $boatExperience;

        return $this;
    }

    /**
     * Get boatExperience
     *
     * @return boolean
     */
    public function getBoatExperience()
    {
        return $this->boat_experience;
    }

    /**
     * Set cprCertification
     *
     * @param boolean $cprCertification
     *
     * @return Registration
     */
    public function setCprCertification($cprCertification)
    {
        $this->cpr_certification = $cprCertification;

        return $this;
    }

    /**
     * Get cprCertification
     *
     * @return boolean
     */
    public function getCprCertification()
    {
        return $this->cpr_certification;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     *
     * @return Registration
     */
    public function setFullName($fullName)
    {
        $this->full_name = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Registration
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return Registration
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phone_number = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * Set emergencyContactNumber
     *
     * @param string $emergencyContactNumber
     *
     * @return Registration
     */
    public function setEmergencyContactNumber($emergencyContactNumber)
    {
        $this->emergency_contact_number = $emergencyContactNumber;

        return $this;
    }

    /**
     * Get emergencyContactNumber
     *
     * @return string
     */
    public function getEmergencyContactNumber()
    {
        return $this->emergency_contact_number;
    }

    /**
     * Set emergencyContactName
     *
     * @param string $emergencyContactName
     *
     * @return Registration
     */
    public function setEmergencyContactName($emergencyContactName)
    {
        $this->emergency_contact_name = $emergencyContactName;

        return $this;
    }

    /**
     * Get emergencyContactName
     *
     * @return string
     */
    public function getEmergencyContactName()
    {
        return $this->emergency_contact_name;
    }

    /**
     * Set boatSeats
     *
     * @param integer $boatSeats
     *
     * @return Registration
     */
    public function setBoatSeats($boatSeats)
    {
        $this->boat_seats = $boatSeats;

        return $this;
    }

    /**
     * Get boatSeats
     *
     * @return integer
     */
    public function getBoatSeats()
    {
        return $this->boat_seats;
    }

    /**
     * Set pairingBoater
     *
     * @param string $pairingBoater
     *
     * @return Registration
     */
    public function setPairingBoater($pairingBoater)
    {
        $this->pairing_boater = $pairingBoater;

        return $this;
    }

    /**
     * Get pairingBoater
     *
     * @return string
     */
    public function getPairingBoater()
    {
        return $this->pairing_boater;
    }

    /**
     * Set eventDiscovery
     *
     * @param string $eventDiscovery
     *
     * @return Registration
     */
    public function setEventDiscovery($eventDiscovery)
    {
        $this->event_discovery = $eventDiscovery;

        return $this;
    }

    /**
     * Get eventDiscovery
     *
     * @return string
     */
    public function getEventDiscovery()
    {
        return $this->event_discovery;
    }
}
