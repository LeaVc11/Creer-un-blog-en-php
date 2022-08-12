<?php

namespace App\Controllers;

use App\Models\Manager\AdminManager;


class AdminController
{
    private AdminManager $adminManager;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
      $this->adminManager = new AdminManager;

        if (!$this->adminManager->isAdmin($user)) {
            header('Location: dashboard.php');
        }
    }
    public function dashboard(){
        $articles= $this->articleManager->loadingArticles();
        require 'Views/Admin/dashboard.php';
    }



}