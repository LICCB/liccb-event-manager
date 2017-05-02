<?php

namespace AppBundle\Entity;

/**
 * Question
 */
class Question
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $question;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $eventTypes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->eventTypes = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set question
     *
     * @param string $question
     *
     * @return Question
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Add eventType
     *
     * @param \AppBundle\Entity\Event_type $eventType
     *
     * @return Question
     */
    public function addEventType(\AppBundle\Entity\Event_type $eventType)
    {
        $this->eventTypes[] = $eventType;

        return $this;
    }

    /**
     * Remove eventType
     *
     * @param \AppBundle\Entity\Event_type $eventType
     */
    public function removeEventType(\AppBundle\Entity\Event_type $eventType)
    {
        $this->eventTypes->removeElement($eventType);
    }

    /**
     * Get eventTypes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEventTypes()
    {
        return $this->eventTypes;
    }
}

