<?php

namespace AppBundle\Entity;

/**
 * OrgEvent
 */
class OrgEvent
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $eventName;

    /**
     * @var string
     */
    private $eventType;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set eventName
     *
     * @param string $eventName
     *
     * @return OrgEvent
     */
    public function setEventName($eventName)
    {
        $this->eventName = $eventName;

        return $this;
    }

    /**
     * Get eventName
     *
     * @return string
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * Set eventType
     *
     * @param string $eventType
     *
     * @return OrgEvent
     */
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;

        return $this;
    }

    /**
     * Get eventType
     *
     * @return string
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     *
     * @return OrgEvent
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
     * @return OrgEvent
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
     * @return OrgEvent
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
     * @return OrgEvent
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
}

