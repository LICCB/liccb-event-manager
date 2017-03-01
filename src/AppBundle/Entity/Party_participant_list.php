<?php

namespace AppBundle\Entity;

/**
 * Party_participant_list
 */
class Party_participant_list
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $partyId;

    /**
     * @var string
     */
    private $registrantEmail;

    /**
     * @var string
     */
    private $participantFullName;

    /**
     * @var string
     */
    private $emergencyContactName;

    /**
     * @var int
     */
    private $emergencyContactPhone;

    /**
     * @var string
     */
    private $participantEmail;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set partyId
     *
     * @param integer $partyId
     *
     * @return Party_participant_list
     */
    public function setPartyId($partyId)
    {
        $this->partyId = $partyId;

        return $this;
    }

    /**
     * Get partyId
     *
     * @return int
     */
    public function getPartyId()
    {
        return $this->partyId;
    }

    /**
     * Set registrantEmail
     *
     * @param string $registrantEmail
     *
     * @return Party_participant_list
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
     * Set participantFullName
     *
     * @param string $participantFullName
     *
     * @return Party_participant_list
     */
    public function setParticipantFullName($participantFullName)
    {
        $this->participantFullName = $participantFullName;

        return $this;
    }

    /**
     * Get participantFullName
     *
     * @return string
     */
    public function getParticipantFullName()
    {
        return $this->participantFullName;
    }

    /**
     * Set emergencyContactName
     *
     * @param string $emergencyContactName
     *
     * @return Party_participant_list
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
     * @param integer $emergencyContactPhone
     *
     * @return Party_participant_list
     */
    public function setEmergencyContactPhone($emergencyContactPhone)
    {
        $this->emergencyContactPhone = $emergencyContactPhone;

        return $this;
    }

    /**
     * Get emergencyContactPhone
     *
     * @return int
     */
    public function getEmergencyContactPhone()
    {
        return $this->emergencyContactPhone;
    }

    /**
     * Set participantEmail
     *
     * @param string $participantEmail
     *
     * @return Party_participant_list
     */
    public function setParticipantEmail($participantEmail)
    {
        $this->participantEmail = $participantEmail;

        return $this;
    }

    /**
     * Get participantEmail
     *
     * @return string
     */
    public function getParticipantEmail()
    {
        return $this->participantEmail;
    }
}

