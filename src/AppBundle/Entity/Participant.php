<?php

namespace AppBundle\Entity;

/**
 * Participant
 */
class Participant
{
    /**
     * @var int
     */
    private $id;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
}

