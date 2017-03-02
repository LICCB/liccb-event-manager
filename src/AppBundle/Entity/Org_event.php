<?php

namespace AppBundle\Entity;

/**
 * Org_event
 */
class Org_event
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $orgEventName;

    /**
     * @var string
     */
    private $orgEventType;

    /**
     * @var int
     */
    private $capacity;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var \DateTime
     */
    private $signupStart;

    /**
     * @var \DateTime
     */
    private $signupEnd;

    /**
     * @var string
     */
    private $orgEventDescription;


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
     * Set orgEventName
     *
     * @param string $orgEventName
     *
     * @return Org_event
     */
    public function setOrgEventName($orgEventName)
    {
        $this->orgEventName = $orgEventName;

        return $this;
    }

    /**
     * Get orgEventName
     *
     * @return string
     */
    public function getOrgEventName()
    {
        return $this->orgEventName;
    }

    /**
     * Set orgEventType
     *
     * @param string $orgEventType
     *
     * @return Org_event
     */
    public function setOrgEventType($orgEventType)
    {
        $this->orgEventType = $orgEventType;

        return $this;
    }

    /**
     * Get orgEventType
     *
     * @return string
     */
    public function getOrgEventType()
    {
        return $this->orgEventType;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     *
     * @return Org_event
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Org_event
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set signupStart
     *
     * @param \DateTime $signupStart
     *
     * @return Org_event
     */
    public function setSignupStart($signupStart)
    {
        $this->signupStart = $signupStart;

        return $this;
    }

    /**
     * Get signupStart
     *
     * @return \DateTime
     */
    public function getSignupStart()
    {
        return $this->signupStart;
    }

    /**
     * Set signupEnd
     *
     * @param \DateTime $signupEnd
     *
     * @return Org_event
     */
    public function setSignupEnd($signupEnd)
    {
        $this->signupEnd = $signupEnd;

        return $this;
    }

    /**
     * Get signupEnd
     *
     * @return \DateTime
     */
    public function getSignupEnd()
    {
        return $this->signupEnd;
    }

    /**
     * Set orgEventDescription
     *
     * @param string $orgEventDescription
     *
     * @return Org_event
     */
    public function setOrgEventDescription($orgEventDescription)
    {
        $this->orgEventDescription = $orgEventDescription;

        return $this;
    }

    /**
     * Get orgEventDescription
     *
     * @return string
     */
    public function getOrgEventDescription()
    {
        return $this->orgEventDescription;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $parties;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->parties = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add party
     *
     * @param \AppBundle\Entity\Party $party
     *
     * @return Org_event
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
}
