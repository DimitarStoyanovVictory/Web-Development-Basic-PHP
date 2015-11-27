<?php

namespace ConferenceScheduler\Models;

class Hall
{
    private $floorNumber;

    private $number;

    private $usersLimit;

    public function __construct($floorNumber, $number, $usersLimit)
    {
        $this->_floorNumber = $floorNumber;
        $this->_number = $number;
        $this->_usersLimit = $usersLimit;
    }
}