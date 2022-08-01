<?php

namespace App\controllers;

use App\models\Article;
use App\models\ArticleManager;
use Exception;

class ArticlesController
{
    private ArticleManager $articleManager;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->articleManager = new ArticleManager;
        $this->articleManager->loadingArticles();
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
