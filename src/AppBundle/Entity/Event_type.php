<?php

namespace AppBundle\Entity;

/**
 * Event_type
 */
class Event_type
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $eventType;


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
     * Set eventType
     *
     * @param string $eventType
     *
     * @return Event_type
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
}

