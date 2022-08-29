<?php

namespace App\Controllers;

use App\Models\Manager\DbManager;
use App\models\Manager\UserManager;


class UserController extends DbManager
{
    private UserManager $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }






}

