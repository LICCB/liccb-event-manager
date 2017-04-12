<?php

namespace AppBundle\Entity;

/**
 * Strategy
 */
class Strategy
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $owner;

    /**
     * @var boolean
     */
    private $over18;

    /**
     * @var integer
     */
    private $over18W;

    /**
     * @var boolean
     */
    private $swimExperience;

    /**
     * @var integer
     */
    private $swimExperienceW;

    /**
     * @var boolean
     */
    private $boatExperience;

    /**
     * @var integer
     */
    private $boatExperienceW;

    /**
     * @var boolean
     */
    private $cpr;

    /**
     * @var integer
     */
    private $cprW;

    /**
     * @var string
     */
    private $participantType;

    /**
     * @var integer
     */
    private $participantTypeW;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Strategy
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set owner
     *
     * @param string $owner
     *
     * @return Strategy
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set over18
     *
     * @param boolean $over18
     *
     * @return Strategy
     */
    public function setOver18($over18)
    {
        $this->over18 = $over18;

        return $this;
    }

    /**
     * Get over18
     *
     * @return boolean
     */
    public function getOver18()
    {
        return $this->over18;
    }

    /**
     * Set over18W
     *
     * @param integer $over18W
     *
     * @return Strategy
     */
    public function setOver18W($over18W)
    {
        $this->over18W = $over18W;

        return $this;
    }

    /**
     * Get over18W
     *
     * @return integer
     */
    public function getOver18W()
    {
        return $this->over18W;
    }

    /**
     * Set swimExperience
     *
     * @param boolean $swimExperience
     *
     * @return Strategy
     */
    public function setSwimExperience($swimExperience)
    {
        $this->swimExperience = $swimExperience;

        return $this;
    }

    /**
     * Get swimExperience
     *
     * @return boolean
     */
    public function getSwimExperience()
    {
        return $this->swimExperience;
    }

    /**
     * Set swimExperienceW
     *
     * @param integer $swimExperienceW
     *
     * @return Strategy
     */
    public function setSwimExperienceW($swimExperienceW)
    {
        $this->swimExperienceW = $swimExperienceW;

        return $this;
    }

    /**
     * Get swimExperienceW
     *
     * @return integer
     */
    public function getSwimExperienceW()
    {
        return $this->swimExperienceW;
    }

    /**
     * Set boatExperience
     *
     * @param boolean $boatExperience
     *
     * @return Strategy
     */
    public function setBoatExperience($boatExperience)
    {
        $this->boatExperience = $boatExperience;

        return $this;
    }

    /**
     * Get boatExperience
     *
     * @return boolean
     */
    public function getBoatExperience()
    {
        return $this->boatExperience;
    }

    /**
     * Set boatExperienceW
     *
     * @param integer $boatExperienceW
     *
     * @return Strategy
     */
    public function setBoatExperienceW($boatExperienceW)
    {
        $this->boatExperienceW = $boatExperienceW;

        return $this;
    }

    /**
     * Get boatExperienceW
     *
     * @return integer
     */
    public function getBoatExperienceW()
    {
        return $this->boatExperienceW;
    }

    /**
     * Set cpr
     *
     * @param boolean $cpr
     *
     * @return Strategy
     */
    public function setCpr($cpr)
    {
        $this->cpr = $cpr;

        return $this;
    }

    /**
     * Get cpr
     *
     * @return boolean
     */
    public function getCpr()
    {
        return $this->cpr;
    }

    /**
     * Set cprW
     *
     * @param integer $cprW
     *
     * @return Strategy
     */
    public function setCprW($cprW)
    {
        $this->cprW = $cprW;

        return $this;
    }

    /**
     * Get cprW
     *
     * @return integer
     */
    public function getCprW()
    {
        return $this->cprW;
    }

    /**
     * Set participantType
     *
     * @param string $participantType
     *
     * @return Strategy
     */
    public function setParticipantType($participantType)
    {
        $this->participantType = $participantType;

        return $this;
    }

    /**
     * Get participantType
     *
     * @return string
     */
    public function getParticipantType()
    {
        return $this->participantType;
    }

    /**
     * Set participantTypeW
     *
     * @param integer $participantTypeW
     *
     * @return Strategy
     */
    public function setParticipantTypeW($participantTypeW)
    {
        $this->participantTypeW = $participantTypeW;

        return $this;
    }

    /**
     * Get participantTypeW
     *
     * @return integer
     */
    public function getParticipantTypeW()
    {
        return $this->participantTypeW;
    }
}

