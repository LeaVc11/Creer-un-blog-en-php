<?php

namespace App\Controllers;

use App\Models\Class\Comment;
use App\Models\Manager\CommentManager;
use App\Routing\Router;
use Exception;


class CommentController extends AbstractController
{
    private CommentManager $commentManager;

    private array $comments = [];


    /**
     * @throws Exception
     */
    public function __construct()
    {

        $this->commentManager = new CommentManager;

    }

    /**
     * @throws \Exception
     */
    public function dashboard(): void
    {
        $this->render('Admin/dashboard');
    }

    /**
     * @throws \Exception
     */
    public function displayComments(int $id): void
    {
        $comments = $this->commentManager->findByArticle($id);
        $this->render('Comment/listComment', compact('comments'));

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
        $this->render('Comment/showComment');
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
                header('Location: ' . Router::generate("/comments/". $_POST['articleId']));
                exit();
            }
            header('Location:' . Router::generate("/articles" . $_POST['articleId']));
            exit();
        }
    }

    /**
     * @throws Exception
     */
    public function editComment($id): void
    {
        $errors = [];

        $comment = $this->commentManager->findById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $errors = $this->getErrors($id);
            if (count($errors) == 0) {
                $comment->setTitle($_POST['title']);
                $comment->setContent($_POST['content']);
                $this->commentManager->editComment($comment);
                header('Location: ' . Router::generate("/articles"));
                exit();
            }
            header('Location:' . Router::generate("/articles/" . $_POST['articleId']));
            exit();
        } else {
            $this->render('Comment/editComment', compact('comment'));
        }
    }

    /**
     * @throws \Exception
     */
    public function deleteComment($id): void
    {

        $comment = $this->commentManager->findById($id);

        $this->commentManager->delete($comment);
        header('Location: ' . Router::generate("/admin/dashboard"));
        exit();
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

        if (!is_null($comment) && $comment->getId() != null && $id == null) {
            $errors[] = 'Un commentaire avec ce titre existe déjà !';
        }
//        var_dump($errors);
//        die();

        return $errors;
    }

    /**
     * @throws \Exception
     */


}