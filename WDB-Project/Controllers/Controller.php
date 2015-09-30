<?php
namespace ShoppingCart\Controllers;

class Controller
{
    /**
     * @var \ShoppingCart\View;
     */
    protected $view;

    public function __construct(\ShoppingCart\View $view)
    {
        $this->view = $view;
    }
}
