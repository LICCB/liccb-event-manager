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
    /**
     * @var \AppBundle\Entity\Registrant
     */
    private $registrant;

    /**
     * @var \AppBundle\Entity\Party
     */
    private $party;

    /**
     * @var \AppBundle\Entity\Participant
     */
    private $participant;


    /**
     * Set registrant
     *
     * @param \AppBundle\Entity\Registrant $registrant
     *
     * @return Party_participant_list
     */
    public function setRegistrant(\AppBundle\Entity\Registrant $registrant = null)
    {
        $this->registrant = $registrant;

        return $this;
    }

    /**
     * Get registrant
     *
     * @return \AppBundle\Entity\Registrant
     */
    public function getRegistrant()
    {
        return $this->registrant;
    }

    /**
     * Set party
     *
     * @param \AppBundle\Entity\Party $party
     *
     * @return Party_participant_list
     */
    public function setParty(\AppBundle\Entity\Party $party = null)
    {
        $this->party = $party;

        return $this;
    }

    /**
     * Get party
     *
     * @return \AppBundle\Entity\Party
     */
    public function getParty()
    {
        return $this->party;
    }

    /**
     * Set participant
     *
     * @param \AppBundle\Entity\Participant $participant
     *
     * @return Party_participant_list
     */
    public function setParticipant(\AppBundle\Entity\Participant $participant = null)
    {
        $this->participant = $participant;

        return $this;
    }

    /**
     * Get participant
     *
     * @return \AppBundle\Entity\Participant
     */
    public function getParticipant()
    {
        return $this->participant;
    }
}
