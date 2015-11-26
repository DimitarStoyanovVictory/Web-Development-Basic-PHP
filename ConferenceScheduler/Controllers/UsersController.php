<?php
namespace ConferenceScheduler\Controllers;

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
            $this->view->user = $user->getUsername();
            $this->redirect('users', 'profile');
        }
    }

    public function register()
    {
        $this->view->error = false;
        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User($username, $password);

            if (!$user->save()) {
                $this->view->error = 'duplicate users';
            }

            $this->login();
        }
    }

    public function profile()
    {
    }

    public function logout()
    {
        session_destroy();
        die;
    }
}