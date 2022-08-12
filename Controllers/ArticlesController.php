<?php

namespace App\Controllers;


use App\Models\Manager\ArticleManager;
use Exception;

class ArticlesController
{
    public ArticleManager $articleManager;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->articleManager = new ArticleManager;

        $this->articleManager->loadingArticles();
//        dd($this->articleManager);
    }
    public function homePage(){
        $articles= $this->articleManager->loadingArticles();
        require 'Views/Articles/articles.view.php';
    }
    /**
     * @return void
     */
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

    /**
     * @return void
     */
    public function addArticle(): void
    {
        require "Views/Articles/add.article.view.php";
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
        require "Views/Articles/edit.article.view.php";
    }
}
