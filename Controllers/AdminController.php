<?php

namespace App\Controllers;


use App\Models\Class\Article;
use App\Models\Manager\ArticleManager;
use Exception;

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
    public function dashboard()
    {
        $articles = $this->articleManager->loadingArticles();
        require 'Views/Admin/dashboard.php';
    }
    /**
     * @return void
     */
    public function addArticle(){
        $errors = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $imageFileName = null;

            $errors = $this->getFormErrors();



            if(count($errors) == 0){

                $upload = $this->uploadImage();
                $errors = $upload['errors'];
                $imageFileName = $upload['filename'];


                if(count($errors) == 0){
                    $article = new Article($_POST['title'], $_POST['content'], $_POST['author'],$_POST['slug'],$_POST['created_at'], $_POST['updated_at']);
                    $this->articleManager->add($article);
                    header('Location: dashboard');
                }

            }

        }

        require 'Views/Admin/add.php';

    }
//        $article = $this->articleManager->addArticle($id);
//        require "Views/Admin/add.php";
//    }







}


