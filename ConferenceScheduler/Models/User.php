<?php

namespace ConferenceScheduler\Models;

use ConferenceScheduler\Extensions\Roles;
use ConferenceScheduler\Repositories\UserRepository;

class User extends Roles
{
    private $id;

    private $username;

    private $password;

    private $role;

    public function __construct($username, $password, $role, $id = null)
    {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setRole($role);
        $this->setId($id);
    }

    /**
     * @return mixed
     */
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

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = md5($password);
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        switch($role)
        {
            case $this::User: $this->role = $role; break;
            case $this::SiteAdmin: $this->role = $role; break;
            case $this::ConferenceOwner: $this->role = $role; break;
            case $this::ConferenceAdministrator: $this->role = $role; break;
        }
    }

    public function save()
    {
        return UserRepository::create()->save($this);
    }

    public function redirect()
    {
        require_once('Views/home/homepage.php');
    }
}