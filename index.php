<?php


use App\Controllers\AdminController;
use App\Controllers\ArticlesController;
use App\Controllers\CommentController;
use App\Controllers\Security\SecurityController;

require 'vendor/autoload.php';

//var_dump(md5('johndoe'));die(); //prend le resultat du hashage
//
//var_dump($_SESSION['user']);


define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

session_start();
$page = null;
$id = null;


try {
    if (empty($_GET['page'])) {
        require "Views/accueil.view.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        if (isset($url[1])) {
            $page = $url[1];
        }
        if (isset($url[2])) {
            $id = $url[2];
        }

//        match ($url[0]) {
//
//            'accueil' => require "Views/accueil.view.php",
//            'articles' => getDisplayArticle(),
//            'article' => actionArticle($url[1], $url[2]),
//            'security' => security($url[1]),
//            'admin' => admin($url[1], $url[2]),
//
//            default => throw new Exception("La page n'existe pas"),
//        };
        match ($url[0]) {

            'accueil' => require "Views/accueil.view.php",
            'contact' => require "Views/Contact/formContact.php",
            'articles' => getDisplayArticle(),
            'article' => actionArticle($page, $id),
            'security' => security($page),
            'admin' => admin($page, $id),
            'comments' => getDisplayComment(),
            'comment' => actionComment($page, $id),

            default => throw new Exception("La page n'existe pas"),
        };
    }
} catch
(Exception $e) {
    echo $e->getMessage();
}
/**
 * @return void
 * @throws Exception
 */
function getDisplayArticle(): void
{
    $articles = new ArticlesController();
    $articles->displayArticles();
}

/**
 * @param string $parameter
 * @param int $id
 *
 * @return void
 *
 * @throws Exception
 */
function actionArticle(string $parameter, int $id): void
{
    $articles = new ArticlesController();
    if ($parameter === "homepage") {
        $articles->homePage();
    } else if ($parameter === "s") {
        $articles->showArticle($id);

    } else {
        throw new Exception("La page n'existe pas");
    }
}

function security(string $parameter): void
{
    $controller = new SecurityController();

    if ($parameter === 'login') {
        $controller->login();
    }
    if ($parameter === 'register') {
        $controller->register();
    }
    // J'appel la fonction logout de mon SecurityController
    if ($parameter == 'logout') {
        $controller->logout();
    }
}

/**
 * @param $parameter
 * @param $id
 * @throws Exception
 */
function admin(string $parameter, ?int $id): void
{
    $articles = new AdminController();
    if ($parameter === 'dashboard') {
        $articles->dashboard();
//    } else if ($parameter === "s") {
//        $articles->showArticle($id);
    } else if ($parameter === "a") {
        $articles->addArticles();
    } else if ($parameter === "e") {
        $articles->editArticle($id);
    } else if ($parameter === "d") {
        $articles->deleteArticle($id);
    } else {
        throw new Exception("La page n'existe pas");
    }

}

/**
 * @throws Exception
 */
function getDisplayComment(): void
{
    $comments = new CommentController();
    $comments->displayComments();
}

/**
 * @throws Exception
 */
function actionComment($parameter, $id): void
{
    $comments = new CommentController();
    if ($parameter === 'list') {
        $comments->listComments();
    } elseif ($parameter === "s") {
        $comments->showComment($id);
    } elseif ($parameter === "a") {
        $comments->addComment();
    } elseif ($parameter === "e") {
        $comments->editComment($id);

    }

}

/**
 * @throws Exception
 */
function errors($parameter): void
{
    $controller = new ExceptionController();
    if ($parameter === 'errors') {
        $controller->pageIntrouvable();
    } else {
        throw new Exception("La page n'existe pas");
    }
}





