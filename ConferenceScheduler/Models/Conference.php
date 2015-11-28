<?php

namespace ConferenceScheduler\Models;

class Conference
{
    private $conferenceOwner;

    private $conferenceAdministrators;

    private $conferenceDays;

    private $conferenceDate;



    private $venueName;

    private $venueHalls;

    private $programPerDay;

    private $speeakers;

    private $id;

    public function __construct(
        $conferenceOwner, $venueName, $conferenceDays = null, $conferenceDate = null, $conferenceAdministrators = null,
        $venueHalls = null, $programPerDay = null, $speakers = null, $id = null)
    {
        $this->setConferenceOwner($conferenceOwner);
        $this->setConferenceAdministrators($conferenceAdministrators);
        $this->setVenueName($venueName);
        $this->setVenueHalls($venueHalls);
        $this->setProgramPerDay($programPerDay);
        $this->setSpeeakers($speakers);
        $this->setId($id);
    }

    /**
     * @return mixed
     */
    public function getConferenceOwner()
    {
        return $this->conferenceOwner;
    }

    /**
     * @param mixed $conferenceOwner
     */
    public function setConferenceOwner($conferenceOwner)
    {
        $this->conferenceOwner = $conferenceOwner;
    }

    /**
     * @return mixed
     */
    public function getConferenceAdministrators()
    {
        return $this->conferenceAdministrators;
    }

    /**
     * @param mixed $conferenceAdministrators
     */
    public function setConferenceAdministrators($conferenceAdministrators)
    {
        $this->conferenceAdministrators = $conferenceAdministrators;
    }

    public function getConferenceDays()
    {
        return $this->conferenceDays;
    }

    /**
     * @param mixed $conferenceDays
     */
    public function setConferenceDays($conferenceDays)
    {
        $this->conferenceDays = $conferenceDays;
    }

    public function getConferenceDate()
    {
        return $this->conferenceDate;
    }

    public function setConferenceDate($conferenceDate)
    {
        $this->conferenceDate = $conferenceDate;
    }

    /**
     * @return mixed
     */
    public function getVenueName()
    {
        return $this->venueName;
    }

    /**
     * @param mixed $venueName
     */
    public function setVenueName($venueName)
    {
        $this->venueName = $venueName;
    }

    /**
     * @return mixed
     */
    public function getVenueHalls()
    {
        return $this->venueHalls;
    }

    /**
     * @param mixed $venueHalls
     */
    public function setVenueHalls($venueHalls)
    {
        $this->venueHalls = $venueHalls;
    }

    /**
     * @return mixed
     */
    public function getProgramPerDay()
    {
        return $this->programPerDay;
    }

    /**
     * @param mixed $programPerDay
     */
    public function setProgramPerDay($programPerDay)
    {
        $this->programPerDay = $programPerDay;
    }

    /**
     * @return mixed
     */
    public function getSpeeakers()
    {
        return $this->speeakers;
    }

    /**
     * @param mixed $speeakers
     */
    public function setSpeeakers($speeakers)
    {
        $this->speeakers = $speeakers;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}