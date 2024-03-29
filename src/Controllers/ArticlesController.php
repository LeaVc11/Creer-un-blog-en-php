<?php

namespace App\Controllers;

use App\Models\Manager\ArticleManager;

use Exception;

class ArticlesController extends AbstractController
{
    public ArticleManager $articleManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager;
    }

    public function homePage():void
    {
        $this->render('accueil.view');
    }
    public function displayArticles(): void
    {
        $articles = $this->articleManager->loadingArticles();
        $this->render('Articles/articles.view', compact('articles'));
    }

    public function showArticle(int $id): void
    {
        $article = $this->articleManager->showArticle($id);
        $this->render('Admin/show', compact('article'));
    }


}
