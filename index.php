<?php

use App\controllers\ArticlesController;
use App\controllers\Security\SecurityController;

include 'vendor/autoload.php';
define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));
try {
    if (empty($_GET['page'])) {
        require "Views/accueil.view.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        match ($url[0]) {
            'accueil' => require "Views/accueil.view.php",
            'articles' => getDisplayArticle(),
            'article' => actionArticle($url[1], $url[2]),
            'security' => security($url[1]),
            default => throw new Exception("La page n'existe pas"),
        };
    }
} catch
(Exception $e) {
    echo $e->getMessage();
}
/**
 * @return void
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
    if ($parameter === "s") {
        $articles->showArticle($id);
    } else if ($parameter === "a") {
        $articles->addArticle();
    } else if ($parameter === "e") {
        $articles->editArticle();
    } else if ($parameter === "d") {
        $articles->deleteArticle($id);
    } else {
        throw new Exception("La page n'existe pas");
    }
}
/**
 * @param string $parameter
 *
 * @return void
 */
function security(string $parameter): void
{
    $controller = new SecurityController();
    if ($parameter === 'login') {
        $controller->login();
    }

}