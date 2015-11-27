<?php

namespace ConferenceScheduler\Models;

class HallProgram
{
    private $hall;

    private $lectures;

    private $breaks;

    public function __construct($hall, $lectures, $breaks)
    {
        $this->hall = $hall;
        $this->lectures = $lectures;
        $this->lectures = $breaks;
    }
}