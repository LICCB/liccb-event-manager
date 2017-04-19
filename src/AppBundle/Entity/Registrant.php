<?php

namespace AppBundle\Entity;

/**
 * Registrant
 */
class Registrant
{
    /**
     * @var string
     */
    private $registrantEmail;

    /**
     * @var boolean
     */
    private $over18;

    /**
     * @var boolean
     */
    private $hasSwimExperience;

    /**
     * @var boolean
     */
    private $hasBoatExperience;

    /**
     * @var boolean
     */
    private $hasCprCertification;

    /**
     * @var string
     */
    private $fullName;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $emergencyContactName;

    /**
     * @var string
     */
    private $emergencyContactPhone;

    /**
     * @var string
     */
    private $participantType;

    /**
     * @var integer
     */
    private $zip;

    /**
     * @var integer
     */
    private $numTimesApplied;

    /**
     * @var integer
     */
    private $numTimesInvited;

    /**
     * @var integer
     */
    private $numTimesConfirmed;

    /**
     * @var integer
     */
    private $numTimesAttended;

    /**
     * @var string
     */
    private $comments;

    /**
     * @var boolean
     */
    private $isPriorVolunteer;

    /**
     * @var boolean
     */
    private $roleFamiliarity;

    /**
     * @var integer
     */
    private $vehicleCapacity;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $parties;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $party_participant_lists;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->parties = new \Doctrine\Common\Collections\ArrayCollection();
        $this->party_participant_lists = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set registrantEmail
     *
     * @param string $registrantEmail
     *
     * @return Registrant
     */
    public function setRegistrantEmail($registrantEmail)
    {
        $this->registrantEmail = $registrantEmail;

        return $this;
    }

    /**
     * Get registrantEmail
     *
     * @return string
     */
    public function getRegistrantEmail()
    {
        return $this->registrantEmail;
    }

    /**
     * Set over18
     *
     * @param boolean $over18
     *
     * @return Registrant
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
     * Set hasSwimExperience
     *
     * @param boolean $hasSwimExperience
     *
     * @return Registrant
     */
    public function setHasSwimExperience($hasSwimExperience)
    {
        $this->hasSwimExperience = $hasSwimExperience;

        return $this;
    }

    /**
     * Get hasSwimExperience
     *
     * @return boolean
     */
    public function getHasSwimExperience()
    {
        return $this->hasSwimExperience;
    }

    /**
     * Set hasBoatExperience
     *
     * @param boolean $hasBoatExperience
     *
     * @return Registrant
     */
    public function setHasBoatExperience($hasBoatExperience)
    {
        $this->hasBoatExperience = $hasBoatExperience;

        return $this;
    }

    /**
     * Get hasBoatExperience
     *
     * @return boolean
     */
    public function getHasBoatExperience()
    {
        return $this->hasBoatExperience;
    }

    /**
     * Set hasCprCertification
     *
     * @param boolean $hasCprCertification
     *
     * @return Registrant
     */
    public function setHasCprCertification($hasCprCertification)
    {
        $this->hasCprCertification = $hasCprCertification;

        return $this;
    }

    /**
     * Get hasCprCertification
     *
     * @return boolean
     */
    public function getHasCprCertification()
    {
        return $this->hasCprCertification;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     *
     * @return Registrant
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Registrant
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set emergencyContactName
     *
     * @param string $emergencyContactName
     *
     * @return Registrant
     */
    public function setEmergencyContactName($emergencyContactName)
    {
        $this->emergencyContactName = $emergencyContactName;

        return $this;
    }

    /**
     * Get emergencyContactName
     *
     * @return string
     */
    public function getEmergencyContactName()
    {
        return $this->emergencyContactName;
    }

    /**
     * Set emergencyContactPhone
     *
     * @param string $emergencyContactPhone
     *
     * @return Registrant
     */
    public function setEmergencyContactPhone($emergencyContactPhone)
    {
        $this->emergencyContactPhone = $emergencyContactPhone;

        return $this;
    }

    /**
     * Get emergencyContactPhone
     *
     * @return string
     */
    public function getEmergencyContactPhone()
    {
        return $this->emergencyContactPhone;
    }

    /**
     * Set participantType
     *
     * @param string $participantType
     *
     * @return Registrant
     */
    public function setParticipantType($participantType)
    {
        $this->participantType = $participantType;

        return $this;
    }

    /**
     * Get participantType
     *
     * @return string
     */
    public function getParticipantType()
    {
        return $this->participantType;
    }

    /**
     * Set zip
     *
     * @param integer $zip
     *
     * @return Registrant
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return integer
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set numTimesApplied
     *
     * @param integer $numTimesApplied
     *
     * @return Registrant
     */
    public function setNumTimesApplied($numTimesApplied)
    {
        $this->numTimesApplied = $numTimesApplied;

        return $this;
    }

    /**
     * Get numTimesApplied
     *
     * @return integer
     */
    public function getNumTimesApplied()
    {
        return $this->numTimesApplied;
    }

    /**
     * Set numTimesInvited
     *
     * @param integer $numTimesInvited
     *
     * @return Registrant
     */
    public function setNumTimesInvited($numTimesInvited)
    {
        $this->numTimesInvited = $numTimesInvited;

        return $this;
    }

    /**
     * Get numTimesInvited
     *
     * @return integer
     */
    public function getNumTimesInvited()
    {
        return $this->numTimesInvited;
    }

    /**
     * Set numTimesConfirmed
     *
     * @param integer $numTimesConfirmed
     *
     * @return Registrant
     */
    public function setNumTimesConfirmed($numTimesConfirmed)
    {
        $this->numTimesConfirmed = $numTimesConfirmed;

        return $this;
    }

    /**
     * Get numTimesConfirmed
     *
     * @return integer
     */
    public function getNumTimesConfirmed()
    {
        return $this->numTimesConfirmed;
    }

    /**
     * Set numTimesAttended
     *
     * @param integer $numTimesAttended
     *
     * @return Registrant
     */
    public function setNumTimesAttended($numTimesAttended)
    {
        $this->numTimesAttended = $numTimesAttended;

        return $this;
    }

    /**
     * Get numTimesAttended
     *
     * @return integer
     */
    public function getNumTimesAttended()
    {
        return $this->numTimesAttended;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return Registrant
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set isPriorVolunteer
     *
     * @param boolean $isPriorVolunteer
     *
     * @return Registrant
     */
    public function setIsPriorVolunteer($isPriorVolunteer)
    {
        $this->isPriorVolunteer = $isPriorVolunteer;

        return $this;
    }

    /**
     * Get isPriorVolunteer
     *
     * @return boolean
     */
    public function getIsPriorVolunteer()
    {
        return $this->isPriorVolunteer;
    }

    /**
     * Set roleFamiliarity
     *
     * @param boolean $roleFamiliarity
     *
     * @return Registrant
     */
    public function setRoleFamiliarity($roleFamiliarity)
    {
        $this->roleFamiliarity = $roleFamiliarity;

        return $this;
    }

    /**
     * Get roleFamiliarity
     *
     * @return boolean
     */
    public function getRoleFamiliarity()
    {
        return $this->roleFamiliarity;
    }

    /**
     * Set vehicleCapacity
     *
     * @param integer $vehicleCapacity
     *
     * @return Registrant
     */
    public function setVehicleCapacity($vehicleCapacity)
    {
        $this->vehicleCapacity = $vehicleCapacity;

        return $this;
    }

    /**
     * Get vehicleCapacity
     *
     * @return integer
     */
    public function getVehicleCapacity()
    {
        return $this->vehicleCapacity;
    }

    /**
     * Add party
     *
     * @param \AppBundle\Entity\Party $party
     *
     * @return Registrant
     */
    public function addParty(\AppBundle\Entity\Party $party)
    {
        $this->parties[] = $party;

        return $this;
    }

    /**
     * Remove party
     *
     * @param \AppBundle\Entity\Party $party
     */
    public function removeParty(\AppBundle\Entity\Party $party)
    {
        $this->parties->removeElement($party);
    }

    /**
     * Get parties
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParties()
    {
        return $this->parties;
    }

    /**
     * Add partyParticipantList
     *
     * @param \AppBundle\Entity\Party_participant_list $partyParticipantList
     *
     * @return Registrant
     */
    public function addPartyParticipantList(\AppBundle\Entity\Party_participant_list $partyParticipantList)
    {
        $this->party_participant_lists[] = $partyParticipantList;

        return $this;
    }

    /**
     * Remove partyParticipantList
     *
     * @param \AppBundle\Entity\Party_participant_list $partyParticipantList
     */
    public function removePartyParticipantList(\AppBundle\Entity\Party_participant_list $partyParticipantList)
    {
        $this->party_participant_lists->removeElement($partyParticipantList);
    }

    /**
     * Get partyParticipantLists
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartyParticipantLists()
    {
        return $this->party_participant_lists;
    }
}

