<?php


use App\Controllers\AdminController;
use App\Controllers\ArticlesController;
use App\Controllers\SecurityController;
use App\Routing\Router;

require 'vendor/autoload.php';

//var_dump(md5('johndoe'));die(); //prend le resultat du hashage
//
//var_dump($_SESSION['user']);

$router = new Router($_GET['url']);

$router->get('/', 'Home#index');
$router->get('/articles', 'Articles#displayArticles');
$router->get('/articles/:id', 'Articles#showArticle');
$router->get('/security/login','Security#login');
$router->get('/security/register','Security#register');
$router->get('/security/logout','Security#logout');
$router->get('/admin/','Admin#displayComments');
$router->get('/admin/','Admin#displayComments');
//$router->get('/admin/','Admin#addArticles');
//$router->get('/admin/:id','Admin#editArticle');
//$router->get('/admin/:id','Admin#deleteArticle');

try {
    $router->run();
} catch (Exception $e) {
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
    if ($parameter === "homepage") {
        $articles->homePage();
    } else if ($parameter === "s") {
        $articles->showArticle($id);
//    } else if ($parameter === "a") {
//        $articles->addArticle();

//    } else if ($parameter === "e") {
//        $articles->editArticle();
//    } else if ($parameter === "d") {
//        $articles->deleteArticle($id);
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
 * @throws Exception
 */
function admin($parameter): void
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


function errors($parameter): void
{
    $controller = new ExceptionController();
    if ($parameter === 'errors') {
        $controller->pageIntrouvable();
    } else {
        throw new Exception("La page n'existe pas");
    }
}

