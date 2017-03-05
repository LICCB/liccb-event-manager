<?php

namespace AppBundle\Entity;

/**
 * Party
 */
class Party
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $registrantEmail;

    /**
     * @var int
     */
    private $orgEventId;

    /**
     * @var int
     */
    private $numSeats;

    /**
     * @var bool
     */
    private $wantsPairedWithBoater;

    /**
     * @var string
     */
    private $selectionStatus;

    /**
     * @var string
     */
    private $selectionStatusReason;

    /**
     * @var bool
     */
    private $confirmedAttending;

    /**
     * @var int
     */
    private $numActuallyAttended;


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
     * Set registrantEmail
     *
     * @param string $registrantEmail
     *
     * @return Party
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
     * Set orgEventId
     *
     * @param integer $orgEventId
     *
     * @return Party
     */
    public function setOrgEventId($orgEventId)
    {
        $this->orgEventId = $orgEventId;

        return $this;
    }

    /**
     * Get orgEventId
     *
     * @return int
     */
    public function getOrgEventId()
    {
        return $this->orgEventId;
    }

    /**
     * Set numSeats
     *
     * @param integer $numSeats
     *
     * @return Party
     */
    public function setNumSeats($numSeats)
    {
        $this->numSeats = $numSeats;

        return $this;
    }

    /**
     * Get numSeats
     *
     * @return int
     */
    public function getNumSeats()
    {
        return $this->numSeats;
    }

    /**
     * Set wantsPairedWithBoater
     *
     * @param boolean $wantsPairedWithBoater
     *
     * @return Party
     */
    public function setWantsPairedWithBoater($wantsPairedWithBoater)
    {
        $this->wantsPairedWithBoater = $wantsPairedWithBoater;

        return $this;
    }

    /**
     * Get wantsPairedWithBoater
     *
     * @return bool
     */
    public function getWantsPairedWithBoater()
    {
        return $this->wantsPairedWithBoater;
    }

    /**
     * Set selectionStatus
     *
     * @param string $selectionStatus
     *
     * @return Party
     */
    public function setSelectionStatus($selectionStatus)
    {
        $this->selectionStatus = $selectionStatus;

        return $this;
    }

    /**
     * Get selectionStatus
     *
     * @return string
     */
    public function getSelectionStatus()
    {
        return $this->selectionStatus;
    }

    /**
     * Set selectionStatusReason
     *
     * @param string $selectionStatusReason
     *
     * @return Party
     */
    public function setSelectionStatusReason($selectionStatusReason)
    {
        $this->selectionStatusReason = $selectionStatusReason;

        return $this;
    }

    /**
     * Get selectionStatusReason
     *
     * @return string
     */
    public function getSelectionStatusReason()
    {
        return $this->selectionStatusReason;
    }

    /**
     * Set confirmedAttending
     *
     * @param boolean $confirmedAttending
     *
     * @return Party
     */
    public function setConfirmedAttending($confirmedAttending)
    {
        $this->confirmedAttending = $confirmedAttending;

        return $this;
    }

    /**
     * Get confirmedAttending
     *
     * @return bool
     */
    public function getConfirmedAttending()
    {
        return $this->confirmedAttending;
    }

    /**
     * Set numActuallyAttended
     *
     * @param integer $numActuallyAttended
     *
     * @return Party
     */
    public function setNumActuallyAttended($numActuallyAttended)
    {
        $this->numActuallyAttended = $numActuallyAttended;

        return $this;
    }

    /**
     * Get numActuallyAttended
     *
     * @return int
     */
    public function getNumActuallyAttended()
    {
        return $this->numActuallyAttended;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $party_participant_lists;

    /**
     * @var \AppBundle\Entity\Registrant
     */
    private $registrant;

    /**
     * @var \AppBundle\Entity\Org_event
     */
    private $org_event;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->party_participant_lists = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add partyParticipantList
     *
     * @param \AppBundle\Entity\Party_participant_list $partyParticipantList
     *
     * @return Party
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

    /**
     * Set registrant
     *
     * @param \AppBundle\Entity\Registrant $registrant
     *
     * @return Party
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
     * Set orgEvent
     *
     * @param \AppBundle\Entity\Org_event $orgEvent
     *
     * @return Party
     */
    public function setOrgEvent(\AppBundle\Entity\Org_event $orgEvent = null)
    {
        $this->org_event = $orgEvent;

        return $this;
    }

    /**
     * Get orgEvent
     *
     * @return \AppBundle\Entity\Org_event
     */
    public function getOrgEvent()
    {
        return $this->org_event;
    }
}
