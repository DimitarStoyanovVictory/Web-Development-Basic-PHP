<?php
namespace ShoppingCart;

class View
{
    private $controllerName;
    private $actionName;

    public function __construct($controllerName, $actionName = null)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
    }

    public function render()
    {
        if ($this->actionName == null && $this->controllerName == 'Remaland.com') {
            require_once '/Views/homepage/Remaland.php';
        }
        else {
            require_once '/Views/' . $this->controllerName . '/' . $this->actionName . '.php';
        }
    }

    public function url($controller = null, $action = null, $params = [])
    {
        $requestUri = explode('/', $_SERVER['REQUEST_URI']);
        $url = "//" . $_SERVER['HTTP_HOST'] . "/";
        foreach($requestUri as $k => $uri) {
            if($uri >= $this->controllerName) {
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
