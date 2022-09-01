<?php

namespace App\Controllers;

use App\models\Manager\UserManager;

class ContactController extends AbstractController
{
    private UserManager $userManager;

    /*
    * @param $userManager
    */
    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    public function formContact()
    {

    }
}