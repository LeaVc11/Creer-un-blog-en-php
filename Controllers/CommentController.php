<?php

namespace App\Controllers;

use App\Models\Class\Comment;
use App\Models\Manager\CommentManager;


class CommentController
{
    private CommentManager $commentManager;

    private  array $comments = [];

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->commentManager = new CommentManager;
        $this->comments =$this->commentManager->loadingComments();
    }

    /**
     * @throws \Exception
     */
    public function listComments(): void
    {
        require 'Views/Admin/listComment.php';
    }
    /**
     * @throws \Exception
     */
    public function displayComments(): void
    {
        $comments = $this->comments;
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
                $user = unserialize($_SESSION['user']);
                $comment = new Comment(null,
                    $_POST['title'],
                    Comment::PENDING,
                    $_POST['content'],
                 "NOW",
                  $user->getId(),
                    $_POST['articleId']);
                $this->commentManager->addComment($comment);
                header('Location: ../articles');
                exit();
            }

            header('Location: ../article/s/'.$_POST['articleId']);
            exit();

        }
    }

    /**
     * @throws \Exception
     */
    public function editComment($id): void
    {
        $errors = [];
//        var_dump($id);
//        die();

        $comment = $this->commentManager->findById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $errors = $this->getErrors($id);
//dd($errors);

            if (count($errors) == 0) {
                $user = unserialize($_SESSION['user']);
                $comment = new Comment(null,
                    $_POST['title'],
                    Comment::PENDING,
                    $_POST['content'],
                    "NOW",
                    $user->getId(),
                    $_POST['articleId']);
                $this->commentManager->editComment($comment);
                header('Location: ../articles');
                exit();
            }

            header('Location: ../article/s/'.$_POST['articleId']);
            exit();
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

        $comment = $this->commentManager->getByTitle($_POST['title']);

        if (!is_null($comment) && $comment->getId() != null) {
            $errors[] = 'Un commentaire avec ce titre existe déjà !';
        }
//        var_dump($errors);
//        die();

        return $errors;
    }
}