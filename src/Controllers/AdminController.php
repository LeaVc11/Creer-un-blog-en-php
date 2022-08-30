<?php

namespace App\Controllers;


use App\Models\Class\Article;
use App\Models\Manager\ArticleManager;
use DateTime;
use JetBrains\PhpStorm\ArrayShape;

class AdminController
{

    private ArticleManager $articleManager;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->articleManager = new ArticleManager;

//        dd($this->articleManager);
    }

    /**
     * @throws \Exception
     */
    public function dashboard(): void
    {
        $articles = $this->articleManager->loadingArticles();


        $this->render('admin/dashboard');
//        require '../Views/Admin/dashboard.php';
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function addArticles(): void
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $imageFileName = null;

            $errors = $this->getFormErrors();

            $upload = $this->uploadImage();
            $errors = array_merge($errors, $upload['errors']);

//            $errors = $upload['errors'];
            $imageFileName = $upload['filename'];
//dd($errors);

            if (count($errors) == 0) {

                $article = new Article(null,
                    $imageFileName,
                    $_POST['chapo'],
                    $_POST['title'],
                    $_POST['content'],
                    $_POST['author'],
                    $_POST['slug'],
                    new DateTime($_POST['createdAt']),
                    new DateTime($_POST['updatedAt']));
//                dd($article);
                $this->articleManager->addArticles($article);
                header('Location: dashboard');
                exit();
            }
        }

        require '../Views/Admin/add.php';

    }

    /**
     * @throws \Exception
     */
    public function deleteArticle($id): void
    {

        $article = $this->articleManager->findById($id);
//        if (is_null($article)) {
////            var_dump('Tu n\'as pas le droit de faire ça utilise un lien !');
////            die();
//        } else {
        $this->articleManager->delete($article);
        header('Location: ../dashboard');
//        }
    }

    /**
     * @throws \Exception
     */
    public function editArticle($id): void
    {
        $errors = [];
//        var_dump($id);
//        die();

        $article = $this->articleManager->findById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $errors = $this->getFormErrors($id);
//dd($errors);
            if (count($errors) == 0) {
//                dd($_FILES['uploads']['size'] != 0);
//                var_dump($_FILES['uploads']['size'] != 0);
//                die();
                if ($_FILES['image_link']['size'] != 0) {

                    $upload = $this->uploadImage();
                    $errors = $upload['errors'];
                    $imageFileName = $upload['filename'];
                } else {
                    $imageFileName = $article->getImageLink();
                }
                if (count($errors) == 0) {

                    $article = new Article($id,

                        $imageFileName,
                        $_POST['chapo'],
                        $_POST['title'],
                        $_POST['content'],
                        $_POST['author'],
                        $_POST['slug'],
                        new DateTime($_POST['created_at']),
                        new DateTime($_POST['updated_at']));

                    $this->articleManager->editArticle($article);

                    header('Location: ../dashboard');
                    exit();
                }
            }
        }
        require '../Views/admin/editArticle.php';
    }

    /**
     * @throws \Exception
     */
    private function getFormErrors($id = null): array
    {

        $errors = [];
//dd($_POST['title']);

        if (empty($_POST['title'])) {
            $errors[] .= 'Veuillez saisir un titre';
        }
        if (empty($_POST['chapo'])) {
            $errors[] .= 'Veuillez saisir un chapo';
        }

        if (empty($_POST['content'])) {
            $errors[] .= 'Veuillez saisir du contenu';
        }

        if (empty($_POST['author'])) {
            $errors[] .= 'Veuillez saisir un auteur';
        }

        if (empty($_POST['slug'])) {
            $errors[] .= 'Veuillez saisir un slug';
        }

        $article = $this->articleManager->getByTitle($_POST['title']);

        if (!is_null($article) && $article->getId() != $id) {
            $errors[] = 'Un article avec ce titre existe déjà !';
        }
//        var_dump($errors);
//        die();

        return $errors;
    }

    #[ArrayShape(['filename' => "null|string", 'errors' => "array"])] private function uploadImage(): array
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
//                var_dump($imageFileName);
//                die();
                move_uploaded_file($image['tmp_name'], realpath('Public/uploads/') . "AdminController.php/" . $imageFileName);

            }
        }

        return ['filename' => $imageFileName, 'errors' => $errors];
    }



}


