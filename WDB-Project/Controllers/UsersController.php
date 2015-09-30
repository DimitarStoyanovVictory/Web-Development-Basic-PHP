<?php
namespace ShoppingCart\Controllers;

class UsersController extends Controller
{
    public function login() {
        $this->view->username = "pesho";
    }

    public function register() {
        echo 'register called';
    }

    public function test() {
        echo 'test';
    }
}
