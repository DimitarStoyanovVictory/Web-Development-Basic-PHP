<?php

namespace ConferenceScheduler;

use ConferenceScheduler\Repositories\UserRepository;
use ConferenceScheduler\Controllers\Controller;

class Request
{
    private $params;

    public function __construct(array $params = [])
    {
        $this->params = $params;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function __get($name)
    {
        return $this->params[$name];
    }

    public static function CurrentUser()
    {
        return UserRepository::create()->getOne($_SESSION['id']);
    }

    public static function getAllConfAdmins()
    {
        return UserRepository::create()->getAllConfAdmins();
    }

    public static function getAllUsers()
    {
        return UserRepository::create()->getAll();
    }
}