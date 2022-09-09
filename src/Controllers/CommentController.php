<?php

namespace App\Controllers;

use App\Models\Class\Comment;
use App\Models\Manager\CommentManager;
use App\Models\Manager\FlashManager;
use App\Routing\Router;
use Exception;


class CommentController extends AbstractController
{
    private CommentManager $commentManager;

    private array $comments = [];

    public function __construct()
    {

        $this->commentManager = new CommentManager;

    }
    public function dashboard(): void
    {
        $this->render('Admin/dashboard');
    }
    public function displayComments(int $id): void
    {
        $comments = $this->commentManager->findByArticle($id);
        $this->render('Comment/listComment', compact('comments'));
    }
    public function showComment(int $id): void
    {
        $comment = $this->commentManager->showComment($id);
        $this->render('Comment/showComment');
    }

    /**
     * @throws Exception
     */
    public function addComment(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $errors = $this->getErrors();
            if (count($errors) == 0) {
                $user = unserialize($_SESSION['user']);
                $comment = new Comment(null,
                    $_POST['title'],
                    Comment::PENDING,
                    $_POST['content'],
                    "NOW",
                    $user->getId(),
                    $_POST['articleId'],);
                $this->commentManager->addComment($comment);
                FlashManager::addSuccess('Votre commentaire a été bien enregistré');
                header('Location: ' . Router::generate("/Comments/". $_POST['articleId']));
                exit();
            }
            header('Location:' . Router::generate("/articles" . $_POST['articleId']));
            exit();
        }
    }
    public function editComment($id): void
    {

        $comment = $this->commentManager->findById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $errors = $this->getErrors($id);

            if (count($errors) == 0) {
                $comment->setTitle($_POST['title']);
                $comment->setContent($_POST['content']);
                $comment->setCreated_by($_POST['created_by']);
                if (isset($_POST['status'])){
                    $comment->setStatus($_POST['status']);
                }
                $this->commentManager->editComment($comment);
                FlashManager::addSuccess('Votre commentaire a été modifié');
                header('Location: ' . Router::generate("/articles"));
                exit();
            }
            header('Location:' . Router::generate("/articles/" . $_POST['articleId']));
            exit();
        } else {

            $this->render('Comment/editComment', compact('comment'));
        }
    }

    public function deleteComment($id): void
    {
        $comment = $this->commentManager->findById($id);

        $this->commentManager->deleteComment($comment);
        header('Location: ' . Router::generate("/dashboard"));
        exit();
    }

    private function getErrors($id = null): array
    {
        $errors = [];

        if (empty($_POST['title'])) {
            $errors[] = 'Veuillez saisir un titre';
        }
        if (empty($_POST['content'])) {
            $errors[] = 'Veuillez saisir un commentaire';
        }
        $comment = $this->commentManager->getByTitle($_POST['title']);

        if (!is_null($comment) && $comment->getId() != null && $id == null) {
            $errors[] = 'Un commentaire avec ce titre existe déjà !';
        }
        $_SESSION['flash']=$errors;

        return $errors;
    }

}