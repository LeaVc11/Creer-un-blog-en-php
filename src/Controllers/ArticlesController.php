<?php

namespace App\Controllers;

use App\Models\Manager\ArticleManager;
use App\Routing\Router;
use Exception;

class ArticlesController extends AbstractController
{
    public ArticleManager $articleManager;


    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->articleManager = new ArticleManager;
    }

    public function homePage()
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
