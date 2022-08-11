<?php

namespace App\Controllers;

use App\models\Manager\AdminManager;

class AdminController
{
    private AdminManager $adminManager;

    public function __construct()
    {
        $this->adminManager = new AdminManager();
    }

    public function dashboard()
    {
        // $user est à récupérer juste ici

        if (!$this->adminManager->isAdmin($user)) {
            header('Location: homepage.php');
        }
        require 'Views/Admin/dashboard.php';
    }
    public function displayArticles(): void
    {
        $articles = $this->articleManager->getArticles();
        require "Views/Articles/articles.view.php";
    }
    /**
     * @param int $id
     *
     * @return void
     *
     * @throws Exception
     */
    public function showArticle(int $id): void
    {
        $article = $this->articleManager->showArticle($id);
        require "Views/Articles/show.article.view.php";
    }
}