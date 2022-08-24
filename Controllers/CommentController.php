<?php

namespace App\Controllers;

use App\models\Comment;
use App\models\Manager\CommentManager;
use DateTime;

class CommentController
{
    private CommentManager $commentManager;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->commentManager = new CommentManager;
        $this->commentManager->loadingComments();
    }

    /**
     * @throws \Exception
     */
    public function listComments(): void
    {
        $comments = $this->commentManager->loadingComments();
        require "Views/Admin/listComment.php";
    }

    /**
     * @param int $id
     *
     * @return void
     *
     * @throws \Exception
     */
    public function showComment(int $id): void
    {
        var_dump($id);
        die();
        $comment = $this->commentManager->showComment($id);
        require "Views/Comment/showComment.php";
    }

    /**
     * @throws \Exception
     */
    public function addComment(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // je traite mon formulaire
            $errors = $this->getErrors();

            if (count($errors) == 0) {
                $comment = new Comment(null,
                    $_POST['id'],
                    $_POST['title'],
                    $_POST['status'],
                    $_POST['content'],
                    new DateTime($_POST['created_at']),
                    $_POST['created_by'],
                    $_POST['articleId']);
                $this->commentManager->addComment($comment);
                header('Location: articles');
                exit();
            }
            require 'Views/Articles/addComment.php';


        }
    }

    /**
     * @throws \Exception
     */
    private function getErrors($id = null): array
    {
        $errors = [];
//dd($_POST['title']);

        if (empty($_POST['title'])) {
            $errors[] .= 'Veuillez saisir un titre';
        }
        if (empty($_POST['content'])) {
            $errors[] .= 'Veuillez saisir un commentaire';
        }

        $article = $this->commentManager->getByTitle($_POST['title']);

        if (!is_null($article) && $article->getId() != null) {
            $errors[] = 'Un commentaire avec ce titre existe déjà !';
        }
//        var_dump($errors);
//        die();

        return $errors;
    }
}