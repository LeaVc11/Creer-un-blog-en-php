<?php

namespace App\Controllers;


use App\Models\Manager\ArticleManager;
use Exception;

class ArticlesController extends AbstractController
{

    public ArticleManager $articleManager;

    /**
     * @throws Exception
     */
    public function __construct()
    {
//        dd($this->articleManager = new ArticleManager);
        $this->articleManager = new ArticleManager;
//dd($this->articleManager->loadingArticles());
        $this->articleManager->loadingArticles();
//        dd($this->articleManager);
    }

    /**
     * @throws Exception
     */
    public function homePage(){
//        dd( $articles = $this->articleManager->loadingArticles());
        $articles = $this->articleManager->loadingArticles();
        $this->render('accueil.view');

    }

    /**
     * @return void
     * @throws Exception
     */
    public function displayArticles(): void
    {
        $articles = $this->articleManager->loadingArticles();
        $this->render('Articles/articles.view', compact('articles'));
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
        $this->render('Admin/show.article.view', compact('article'));
    }

}
