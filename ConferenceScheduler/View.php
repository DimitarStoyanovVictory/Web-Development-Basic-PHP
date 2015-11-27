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

    public function url($controller = null, $action = null, $params = [])
    {
        $requestUri = explode('/', $_SERVER['REQUEST_URI']);
        $url = "//" . $_SERVER['HTTP_HOST'] . "/";
        foreach($requestUri as $k => $uri)
        {
            if($uri >= $this->controllerName)
            {
                break;
            }

            $url .= "$uri";
        }

        if ($controller) {
            $url .= "/$controller";
        }

        if ($action) {
            $url .= "/$action";
        }

        foreach ($params as $key => $param) {
            $url .= "/$key/$param" ;
        }

        return $url;
    }
}