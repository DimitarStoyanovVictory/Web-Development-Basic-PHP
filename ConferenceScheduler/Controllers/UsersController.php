<?php

namespace ConferenceScheduler\Controllers;

use ConferenceScheduler\Models\Conference;
use ConferenceScheduler\Repositories\UserRepository;
use ConferenceScheduler\Models\User;

class UsersController extends Controller
{
    public function login()
    {
        $this->view->error = false;
        $this->view->user = false;
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = UserRepository::create()->getOneByDetails(
                $username,
                $password
            );

            if (!$user) {
                $this->view->error = 'Invalid details';
                return;
            }

            $_SESSION['username'] = $user->getUsername();
            $_SESSION['id'] = $user->getId();

            $this->view->user = $user->getUsername();
            $this->redirect('users', 'mainPage');
        }
    }

    public function register()
    {
        $this->view->error = false;
        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $user = new User($username, $password, $role);

            if (!$user->save()) {
                $this->view->error = 'duplicate users';
            }

            $this->login();
        }
    }

    public function profile()
    {
    }

    public function mainPage()
    {
    }

    public function change()
    {
//        $this
    }

    public function allConferences()
    {
    }

    public function createConferences()
    {
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('ConfScheduler.com');
    }
}