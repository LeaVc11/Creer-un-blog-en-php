<?php

namespace App\Controllers;


use App\Models\Manager\ArticleManager;
use Exception;

class ArticlesController
{
    public ArticleManager $articleManager;

    private array $articles = [];

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->articleManager = new ArticleManager;

        $this->articles = $this->articleManager->loadingArticles();
//        dd($this->articleManager);
    }

    /**
     * @throws Exception
     */
    public function homePage(): void
    {
        require 'Views/Articles/articles.view.php';
    }

    /**
     * @return void
     * @throws Exception
     */
    public function displayArticles(): void
    {
        $articles = $this->articles;
//author
//var_dump($articles);
//die();
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
        require "Views/Admin/show.php";
    }


}
