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

//        dd($this->articleManager);
    }

    /**
     * @throws \Exception
     */
    public function dashboard(){
        $articles= $this->articleManager->loadingArticles();
        require 'Views/Admin/dashboard.php';
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
        require "Views/Admin/show.article.view.php";
    }

    /**
     * @return void
     */
    public function addArticle(): void
    {
        require "Views/Articles/comment.view.php";
    }

    /**
     * @param int $id
     *
     * @return void
     *
     * @throws Exception
     */
    public function deleteArticle( int $id): void
    {
        $article = $this->articleManager->deleteArticle($id);

    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function editArticle(): void
    {
        require "Views/Admin/edit.article.view.php";
    }


}


