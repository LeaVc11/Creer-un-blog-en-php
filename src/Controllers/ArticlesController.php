<?php

namespace App\Controllers;

use App\Models\Manager\ArticleManager;
use App\Routing\Router;
use Exception;

class ArticlesController extends AbstractController
{
    public ArticleManager $articleManager;


    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->articleManager = new ArticleManager;
        $this->articleManager->loadingArticles();
    }

    /**
     * @throws Exception
     */
    public function homePage()
    {
//        $articles = $this->articleManager->loadingArticles();
        $this->render('accueil.view');
    }

    /**
     * @return void
     * @throws Exception
     */
    public function displayArticles(): void
    {
        $articles = $this->articleManager->loadingArticles();
        $this->render('Articles/articles.view', compact('articles'));
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
        $this->render('Admin/show', compact('article'));
    }

    /**
     * @throws Exception
     */
    public function editArticle(int $id): void
    {
        $article = $this->articleManager->findById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $errors = $this->getErrors($id);
//dd($errors);
//            dd($comment, $_POST, $errors);
            if (count($errors) == 0) {

                $article->setTitle($_POST['title']);
                $article->setContent($_POST['content']);
                $this->articleManager->editArticle($article);
                header('Location: ' . Router::generate("/admin/editArticle"));
                exit();
            }

            header('Location:' . Router::generate("/articles/" . $_POST['articleId']));
            exit();
        } else {
            $this->render('Admin/editComment', compact('article'));
        }
    }

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
}
