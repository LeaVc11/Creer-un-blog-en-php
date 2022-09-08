<?php

namespace App\Controllers;

use App\Models\Manager\DbManager;
use App\models\Manager\UserManager;
use App\Routing\Router;


class UserController extends DbManager
{
    private UserManager $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }
    public function deleteUser($id): void
    {
        $user = $this->userManager->findById($id);

        $this->userManager->deleteUser($user);
        header('Location: ' . Router::generate("/dashboard"));
        exit();
    }

}

