<?php

namespace App\Controllers;

use App\Models\Manager\DbManager;
use App\Models\Manager\FlashManager;
use App\Models\Manager\UserManager;
use App\Routing\Router;


class UserController extends DbManager
{
    private UserManager $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    public function deleteUser(int $id):void
    {
        $user = $this->userManager->findById($id);

        $this->userManager->deleteUser($user);
        FlashManager::addSuccess('Votre compte a été supprimé');
        header('Location: ' . Router::generate("/dashboard"));

    }

}

