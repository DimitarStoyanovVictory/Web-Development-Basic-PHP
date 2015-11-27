<?php

namespace ConferenceScheduler\Models;

class Hall
{
    private $_floorNumber;

    private $_number;

    private $_usersLimit;

    public function __construct($floorNumber, $number, $usersLimit)
    {
        $this->_floorNumber = $floorNumber;
        $this->_number = $number;
        $this->_usersLimit = $usersLimit;
    }
}