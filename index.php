<?php


use App\Controllers\AdminController;
use App\Controllers\ArticlesController;
use App\Controllers\Security\SecurityController;

require 'vendor/autoload.php';

//var_dump(md5('johndoe'));die(); //prend le resultat du hashage
//
//var_dump($_SESSION['user']);

$router = new App\Routing\Router($_GET['page']);

$router->get('/', function () {
    require "Views/accueil.view.php";
});
$router->get('/articles', function () {
    getDisplayArticle();
});
$router->get('/articles/:id-slug', function ($id) {
})->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');

$router->get('/posts/:id', function ($id) use ($url) {
    actionArticle($url[1], $url[2]);
});
$router->get('/security', function () use ($url) {
    security($url[1]);
});
$router->get('/admin', function () {
    getDisplayArticle();
});
$router->get('/admin/:id-slug', function ($id) {
})->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');

$router->get('/admin/:id', function ($id) use ($router, $url) {
    actionArticle($url[1], $url[2]);

$router->get('default ', function () {
    throw new Exception("La page n'existe pas");
    });

define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));


try {
    $router->run();
} catch (Exception $e) {
}

define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));


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
    }
//    $articles = new AdminController();
//    if ($parameter === "dashboard") {
//        $articles->dashboard();
//    }
    else if ($parameter === "s") {
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
    if ($parameter == 'logout'){
        $controller->logout();
    }
}

function admin ($parameter):void{
    $controller = new AdminController();
    if ($parameter === 'dashboard') {
        $controller->dashboard();
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

//
//if($_GET['controller'] == 'error' && $_GET['action'] == 'not-found'){
//    $controller = new ExceptionController();
//    $controller->pageIntrouvable();
//}
//


