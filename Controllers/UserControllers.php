<?php

namespace App\Controllers;

use App\Models\Manager\DbManager;
use App\Models\UserManager;

class UserControllers extends DbManager
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }


}

