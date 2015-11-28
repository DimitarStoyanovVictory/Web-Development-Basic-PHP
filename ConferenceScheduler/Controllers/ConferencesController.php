<?php

namespace ConferenceScheduler\Controllers;

use ConferenceScheduler\Models\Conference;
use ConferenceScheduler\Models\User;
use ConferenceScheduler\Repositories\UserRepository;
use ConferenceScheduler\Request;

class ConferencesController extends Controller
{
    public function addAdmins()
    {
        $this->view->error = false;

        if (isset($_POST{'addAdmins'}))
        {
            $user = UserRepository::create()->getOneByUsername($_POST['addAdmins']);
            $userAlreadyAdded = false;

            foreach($this->conferencesAdministrators as $userAdmin => $value)
            {
                if ($value->getUsername() == $user->getUsername())
                {
                    $this->view->error = 'User already added!';
                    $userAlreadyAdded = true;
                    break;
                }
            }

            if(!$userAlreadyAdded)
            {
                Request::CurrentUser()->SetRole('conference administrator');
                array_push($this->conferencesAdministrators, $user);
            }
        }
    }

    public function allConferences()
    {
    }

    public function createConferences()
    {
    }
}