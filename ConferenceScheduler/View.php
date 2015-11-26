<?php
namespace ConferenceScheduler;

class View
{
    private $contollerName;
    private $actionName;

    public function __construct($controllerName, $actionName)
    {
        $this->contollerName = $controllerName;
        $this->actionName = $actionName;
    }

    public function render()
    {
        require_once '/Views/' . $this->contollerName . '/' . $this->actionName . '.php';
    }
}