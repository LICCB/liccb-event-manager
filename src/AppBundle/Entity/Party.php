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
}

