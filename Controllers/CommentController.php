<?php

namespace App\Controllers;

use App\models\Manager\CommentManager;
use App\models\Manager\DbManager;


class CommentController extends DbManager
{
    private CommentManager $commentManager;

    public function __construct()
    {
        $this->commentManager = new CommentManager();
    }

    /**
     * @throws \Exception
     */
    public function list(): void
    {
        $articles = $this->commentManager->list();
        require 'Views/articles/list.php';
    }
    /**
     * @throws \Exception
     */
    public function addComment($id): void
    {

        $errors = [];

        if (empty($_POST['title'])) {
            $errors[] = 'Veuillez saisir un titre';
        }
        $errors = [];
        if (empty($_POST['comment'])) {
            $errors[] = 'Veuillez saisir un commentaire';
        }
        header('Location : ../articles');

        require "Views/Articles/articles.view.php";
    }

}