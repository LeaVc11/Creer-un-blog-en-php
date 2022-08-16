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
            header('Location: dashboard');
        }
    }
    //affiche un article après avoir récu un user

    public function dashboard(){
        $articles=$this->articleManager->getArticles();
        require 'Views/Admin/dashboard.php';
    }


}