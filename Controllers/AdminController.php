<?php

namespace App\Controllers;


class AdminController
{
    private $user;

    public function dashboard(){
        require 'Views/Admin/dashboard.php';
    }

    /**
     * @throws \Exception
     */
    public function __construct()
    {

        if (!$this->adminManager->isAdmin($user)) {
            header('Location: dashboard.php');
        }
    }

    //affiche un article après avoir récu un user



}