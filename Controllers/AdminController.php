<?php

namespace App\Controllers;


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
     * @param int $id
     *
     * @return void
     *
     * @throws Exception
     */
    public function showArticle(int $id): void
    {
        $article = $this->articleManager->showArticle($id);
        require "Views/Admin/show.article.view.php";
    }

    /**
     * @return void
     */
    public function addArticles(): void
    {
        $article = $this->articleManager->addArticle($id);
        require "Views/Admin/add.php";
    }

    /**
     * @throws Exception
     */
    public function addArticleValidation(): void
    {
        $file = $_FILES['image'];
        $repertoire = "Public/images/";
        $nomImageAjoute = $this->addImage($file,$repertoire);
        $this->articleManager->addArticle( $_POST['title'],$_POST['content'], $_POST['author'],$_POST['slug'],$_POST['created_at'], $nomImageAjoute);
        header('Location: '. URL . "articles");
    }

    /**
     * @param int $id
     *
     * @return void
     *
     * @throws Exception
     */
    public function deleteArticle(int $id): void
    {
        $article = $this->articleManager->deleteArticle($id);

    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function editArticle(): void
    {
        require "Views/Admin/edit.article.view.php";
    }

    private function addImage($file, $dir): string
    {
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");

        if(!file_exists($dir)) mkdir($dir,0777);

        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];

        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }
}


