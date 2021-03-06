<?php
namespace ConferenceScheduler\Controllers;

class Controller
{
    protected $view;

    protected $request;

    protected $controllerName;

    protected $conferencesAdministrators;

    protected $conferences;

    public function __construct(\ConferenceScheduler\View $view,
        \ConferenceScheduler\Request $request, $name)
    {
        $this->view = $view;
        $this->request = $request;
        $this->controllerName = $name;
    }

    public function redirect($controller = null, $action = null, $params = [])
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

        header("Location: " . $url);
        exit;
    }
}