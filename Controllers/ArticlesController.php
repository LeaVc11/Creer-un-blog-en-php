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

    /**
     * @throws Exception
     */
    public function homePage(){
        $articles= $this->articleManager->loadingArticles();
        require 'Views/Articles/articles.view.php';
    }

    /**
     * @return void
     * @throws Exception
     */
    public function displayArticles(): void
    {

        $articles= $this->articleManager->loadingArticles();

var_dump($articles);
die();
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
        require "Views/Admin/show.article.view.php";
    }

}
