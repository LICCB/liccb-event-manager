<?php

namespace AppBundle\Entity;

/**
 * Participant
 */
class Participant
{
    /**
     * @var string
     */
    private $participantEmail;

    /**
     * @var string
     */
    private $fullName;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var integer
     */
    private $numEventsInvited;

    /**
     * @var integer
     */
    private $numEventsAttended;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $party_participant_lists;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->party_participant_lists = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set participantEmail
     *
     * @param string $participantEmail
     *
     * @return Participant
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
     * Set fullName
     *
     * @param string $fullName
     *
     * @return Participant
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
     * Set comment
     *
     * @param string $comment
     *
     * @return Participant
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set numEventsInvited
     *
     * @param integer $numEventsInvited
     *
     * @return Participant
     */
    public function setNumEventsInvited($numEventsInvited)
    {
        $this->numEventsInvited = $numEventsInvited;

        return $this;
    }

    /**
     * Get numEventsInvited
     *
     * @return integer
     */
    public function getNumEventsInvited()
    {
        return $this->numEventsInvited;
    }

    /**
     * Set numEventsAttended
     *
     * @param integer $numEventsAttended
     *
     * @return Participant
     */
    public function setNumEventsAttended($numEventsAttended)
    {
        $this->numEventsAttended = $numEventsAttended;

        return $this;
    }

    /**
     * Get numEventsAttended
     *
     * @return integer
     */
    public function getNumEventsAttended()
    {
        return $this->numEventsAttended;
    }

    /**
     * Add partyParticipantList
     *
     * @param \AppBundle\Entity\Party_participant_list $partyParticipantList
     *
     * @return Participant
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

