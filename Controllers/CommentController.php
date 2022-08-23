<?php

namespace App\Controllers;

use App\models\Comment;
use App\models\Manager\CommentManager;
use App\models\Manager\DbManager;

class CommentController extends DbManager
{
    private CommentManager $commentManager;

    public function __construct()
    {
        $this->commentManager = new CommentManager();
    }

    public function addComment()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $imageFileName = null;

            $errors = $this->CommentErrors();

            if (count($errors) == 0) {

                $article = new Comment(
                    $_POST['title'],
                    $_POST['comment'];

//                dd($article);

                $this->commentManager->addComment($comment);
                header('Location: dashboard');
                exit();
            }
        }
        require 'Views/Articles/articles.view.php';

    }

    public function commentErrors($id = null): array
    {
        $errors = [];
        if (empty($_POST['title'])){
            $errors[]='Veuillez saisir un titre';
        }
        if (empty($_POST['comment'])){
            $errors[]='Veuillez saisir un commentaire';
        }

        $comment = $this->commentManager->findByTitle($_POST['title']);

        if (!is_null($comment) && $comment->getId() != $id) {
            $errors[] = 'Un article avec ce commentaire existe déjà !';
        }

        return $errors;

    }
}