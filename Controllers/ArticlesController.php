<?php

namespace App\Controllers;


use App\models\Comment;
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
    public function homePage(): void
    {
        $articles = $this->articleManager->loadingArticles();
        require 'Views/Articles/articles.view.php';
    }

    /**
     * @return void
     * @throws Exception
     */
    public function displayArticles(): void
    {

        $articles = $this->articleManager->loadingArticles();
//
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

    public function add(Comment $comment)
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


//dd($errors);

//            if (count($errors) == 0) {
//
//                $comment = new Comment(null,
//                    $_POST['title'],
//                    $_POST['status'],
//                    $_POST['content'],
//                    $_POST['createdAt'],
//                    $_POST['createdBy'],
//                    $_POST['articleId'],
//
////                dd($article);
////                $comment = $this->articleManager->commentArticle($id);
//            }
        }
        require "Views/Articles/articles.view.php";
    }


}
