<?php

namespace App\Controllers;

use App\models\Comment;
use App\models\Manager\CommentManager;
use App\models\Manager\DbManager;
use DateTime;


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
    public function addComment():void
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//dd($errors);

            if (count($errors) == 0) {

                $errors = $this->commentErrors();

                $comment = new Comment(null,
                    $_POST['title'],
                    $_POST['status'],
                    $_POST['content'],
                    new DateTime($_POST['createdAt']),
                    $_POST['articleId'],

//                dd($article);
                $this->commentManager->addComment($comment);
                header('Location: dashboard');
                exit();
            }
        }
        require 'Views/Admin/show.php';

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
//        var_dump($errors);
//        die();

        return $errors;

    }
}