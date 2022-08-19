<?php

namespace App\Controllers;


use App\Models\Class\Article;
use App\Models\Manager\ArticleManager;
use DateTime;

class AdminController
{

    private $articleManager;

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
        require 'Views/Admin/dashboard.php';
    }

    /**
     * @return void
     */
    public function addArticles(): void
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $imageFileName = null;

            $errors = $this->getFormErrors();

            $upload = $this->uploadImage();
            $errors = array_merge($errors,$upload['errors']);

//            $errors = $upload['errors'];
            $imageFileName = $upload['filename'];
//dd($errors);

            if (count($errors) == 0) {

                $article = new Article(null,
                    $imageFileName,
                    $_POST['title'],
                    $_POST['content'],
                    $_POST['author'],
                    $_POST['slug'],
                    new DateTime($_POST['created_at']),
                    new DateTime($_POST['updated_at']));
//                dd($article);
                $this->articleManager->addArticles($article);
                header('Location: dashboard');
                exit();
            }
        }
        require 'Views/Admin/add.php';

    }

    private function getFormErrors($id = null)
    {
        $errors = [];
        if (empty($_POST['title'])) {
            $errors[] = 'Veuillez saisir un titre';
        }

        if (empty($_POST['chapo'])) {
            $errors[] = 'Veuillez saisir un chapô';
        }
        if (empty($_POST['created_at'])) {
            $errors[] = 'Veuillez saisir une date de création';
        }

        if (empty($_POST['updated_at'])) {
            $errors[] = 'Veuillez saisir une date de mise à jour';
        }

        if (empty($_POST['author'])) {
            $errors[] = 'Veuillez saisir l\'auteur';
        }

        if (!is_null($id)) {
            $errors[] = 'Un article existe déjà !';
        }

        return $errors;
    }
//        $article = $this->articleManager->addArticle($id);
//        require "Views/Admin/add.php";
//    }
    private function uploadImage()
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
                move_uploaded_file($image['tmp_name'], realpath('Public/uploads/') ."/" . $imageFileName);

            }
        }

        return ['filename' => $imageFileName, 'errors' => $errors];
    }
}


