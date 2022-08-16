<?php

namespace App\Controllers;


use App\Models\Manager\ArticleManager;

class AdminController
{

    private $articleManager;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->articleManager = new ArticleManager;

        $this->articleManager->loadingArticles();
//        dd($this->articleManager);
    }
    public function dashboard(){
        $articles= $this->articleManager->loadingArticles();
        require 'Views/Admin/dashboard.php';
    }


}


