<?php

namespace App\Controllers;


use App\Models\Class\Article;
use App\Models\Class\Comment;
use App\Models\Class\User;
use App\Models\Manager\ArticleManager;
use App\Models\Manager\CommentManager;
use App\Models\Manager\ContactManager;
use App\Models\Manager\FlashManager;
use App\Models\Manager\UserManager;
use App\Routing\Router;
use DateTime;


class AdminController extends AbstractController
{

    private ArticleManager $articleManager;
    private CommentManager $commentManager;
    private ContactManager $contactManager;
    private UserManager $userManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager;
        $this->commentManager = new CommentManager;
        $this->contactManager = new ContactManager;
        $this->userManager = new UserManager;
    }
    public function dashboard(): void
    {
        $user = unserialize($_SESSION['user']);

        if (!$user){
            $user = null;
        }
        $this->isAdmin($user);
        $articles = $this->articleManager->loadingArticles();
        $listComments = $this->commentManager->findByStatus(Comment::PENDING);
        foreach ($listComments as $comment){
            $author=$this->userManager->findById($comment->getCreatedBy());
            $comment->setCreated_by($author->getUsername());
        }
        $contacts = $this->contactManager->loadingContacts();
        $users = $this->userManager->loadingUsers();

        $this->render('Admin/dashboard', compact('articles', 'listComments', 'contacts', 'users', 'user'));
    }
    private function isAdmin(?User $user =null ):void
    {
        if (is_null($user)&& isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
        }

        if (is_null($user) || $user->getRole() != 'admin') {
            header('Location: ' . Router::generate("/"));
            exit();
        }
    }
    public function addArticle()
    {
        $this->isAdmin();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $errors = $this->getFormErrors();
            $upload = $this->uploadImage();
            $errors = array_merge($errors, $upload['errors']);
            $imageFileName = $upload['filename'];

            if (count($errors) == 0) {
                $author = unserialize($_SESSION['user']);
                $article = new Article(null,
                    $imageFileName,
                    $_POST['chapo'],
                    $_POST['title'],
                    $_POST['content'],
                    $author->getUsername(),
                    $_POST['slug'],
                    new DateTime(),
                    new DateTime()
                );
                FlashManager::addSuccess('Votre article a été bien enregistré');
                $this->articleManager->addArticle($article);
                header('Location: ' . Router::generate("/dashboard"));
                exit();
            }
        }
        $this->render("Admin/add");
    }
    private function getFormErrors(?int $id = null): array
    {
        $errors = [];
        if (empty($_POST['title'])) {
            $errors[] = 'Veuillez saisir un titre';
            $article = $this->articleManager->getByTitle($_POST['title']);

            if (!is_null($article) && $article->getId() != $id) {
                $errors[] = 'Un article avec ce titre existe déjà !';
            }
        }
        if (empty($_POST['chapo'])) {
            $errors[] = 'Veuillez saisir un chapo';
        }

        if (empty($_POST['content'])) {
            $errors[] = 'Veuillez saisir du contenu';
        }

        if (empty($_POST['slug'])) {
            $errors[] = 'Veuillez saisir un slug';
        }

        $_SESSION['flash'] = $errors;

        return $errors;

    }
    private function uploadImage(): array
    {
        $extensionAllowed = ['image/jpeg', 'image/png'];
        $errors = [];
        $imageFileName = null;
        if ($_FILES['image_link']['size'] != 0) {
            $image = $_FILES['image_link'];
            if ($image['size'] > 10000000) {
                $errors[] = 'L\'image  est trop grosse';
            }
            if (!in_array($image['type'], $extensionAllowed)) {
                $errors[] = 'Impossible d\'uploader ce type de fichier';
            }
            if ($image['error'] != 0) {
                $errors[] = 'Une erreur inconnue s\'est produite lors de l\'upload';
            }
            if (count($errors) == 0) {
                $imageFileName = uniqid() . '.' . explode('/', $image['type'])[1];

                move_uploaded_file($image['tmp_name'], realpath(__DIR__ . '/../../Public/uploads/') . "/" . $imageFileName);
            }
        }
        return ['filename' => $imageFileName, 'errors' => $errors];
    }
    public function deleteArticle(int $id): void
    {
        $this->isAdmin();
        $article = $this->articleManager->findById($id);

        $this->articleManager->delete($article);
        FlashManager::addSuccess('Votre article a été supprimé');

        header('Location: ' . Router::generate("/articles"));
        exit();
    }
    public function editArticle(int $id): void
    {
        $this->isAdmin();
        $article = $this->articleManager->findById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = $this->getFormErrors($id);
            if (count($errors) == 0) {
                if ($_FILES['image_link']['size'] != 0) {
                    $upload = $this->uploadImage();
                    $errors = $upload['errors'];
                    $imageFileName = $upload['filename'];
                } else {
                    $imageFileName = $article->getImageLink();
                }
                if (count($errors) == 0) {
                    $author = unserialize($_SESSION['user']);
                    $article = new Article($id,
                        $imageFileName,
                        $_POST['chapo'],
                        $_POST['title'],
                        $_POST['content'],
                        $author->getUsername(),
                        $_POST['slug'],
                        new DateTime(),
                        new DateTime());

                    $this->articleManager->editArticle($article);

                    FlashManager::addSuccess('Votre article a été modifié');
                    header('Location:' . Router::generate("/articles"));
                }
                header('Location:' . Router::generate("/articles/" . $_POST['articleId']));
                exit();
            }
        }
        $this->render('Admin/editArticle', compact('article'));
    }
}





