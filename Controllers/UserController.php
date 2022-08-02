<?php
namespace App\Controllers;


use App\models\Manager\DbManager;
use App\Models\UserManager;


class UserController extends DbManager
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }




}
