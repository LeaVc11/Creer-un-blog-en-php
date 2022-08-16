<?php

namespace App\Controllers;


class AdminController
{

    public function dashboard(){

        require 'Views/Admin/dashboard.php';
    }

    /**
     * @throws \Exception
     */
    public function __construct()
    {

        if (!$this->adminManager->isAdmin($user)) {
            header('Location: Admin/dashboard');
        }
    }

}