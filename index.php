<?php


use App\Controllers\AdminController;
use App\Controllers\ArticlesController;
use App\Controllers\Security\SecurityController;
use App\Routing\Router;

require 'vendor/autoload.php';

//var_dump(md5('johndoe'));die(); //prend le resultat du hashage
//
//var_dump($_SESSION['user']);

$router = new Router($_GET['url']);

$router->get('/', 'Home#index');
$router->get('/articles', 'Articles#displayArticles');
$router->get('/articles/:id', 'Articles#showArticle');
$router->get('/security/','Admin#login');
$router->get('/security/','Admin#register');
$router->get('/security/','Admin#logout');
$router->get('/admin/','Admin#addArticles');
$router->get('/admin/:id','Admin#editArticle');
$router->get('/admin/:id','Admin#deleteArticle');

try {
    $router->run();
} catch (Exception $e) {
}


//try {
//    if (empty($_GET['page'])) {
//        require "Views/accueil.view.php";
//    } else {
//        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
//        match ($url[0]) {
//
//            'accueil' => require "Views/accueil.view.php",
//            'articles' => getDisplayArticle(),
//            'article' => actionArticle($url[1], $url[2]),
//            'security' => security($url[1]),
//            'admin' => admin($url[1]),
////            'home' => home($url[1]),
//
//            default => throw new Exception("La page n'existe pas"),
//        };
//    }
//} catch
//(Exception $e) {
//    echo $e->getMessage();
//}
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

//function home($parameter):void{
//    $homecontroller = new HomeController();
//    if ($parameter === 'home')
//    $homecontroller->displayDashboard();
//
//}

function errors($parameter): void
{
    $controller = new ExceptionController();
    if ($parameter === 'errors') {
        $controller->pageIntrouvable();
    } else {
        throw new Exception("La page n'existe pas");
    }
}





