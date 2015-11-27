<?php
namespace ConferenceScheduler\Repositories;

use ConferenceScheduler\Database;
use ConferenceScheduler\Models\Conference;

class ConferenceRepository
{
    private $db;

    private static $inst = null;

    private function __construct(\ConferenceScheduler\Database $db)
    {
        $this->db = $db;
    }

    public static function create()
    {
        if (self::$inst == null)
        {
            self::$inst = new self(Database::getInstance());
        }

        return self::$inst;
    }
}