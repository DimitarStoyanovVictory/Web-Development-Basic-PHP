<?php
namespace ShoppingCart;

class View
{
    private $controllerName;
    private $actionName;

    public function __constructor($controllerName, $actionName)
    {
        var_dump($controllerName);
        var_dump($actionName);
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
    }

    public function render()
    {
        require_once '/Views/' . $this->controllerName . '/' . $this->actionName . '.php';
    }
}