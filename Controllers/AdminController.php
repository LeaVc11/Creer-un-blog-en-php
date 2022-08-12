<?php

namespace App\Controllers;


class AdminController
{
    private $user;

    /**
     * @throws \Exception
     */
    public function __construct()
    {

        if (!$this->adminManager->isAdmin($user)) {
            header('Location: dashboard.php');
        }
    }
    public function dashboard(){
        $articles= $this->articleManager->loadingArticles();
        require 'Views/Admin/dashboard.php';
    }

    //affiche un article après avoir récu un user



}