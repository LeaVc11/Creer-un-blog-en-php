<?php


use App\Controllers\ArticlesController;
use App\Controllers\Security\SecurityController;

require 'vendor/autoload.php';
//
//dd($_GET);

$router = new App\Routing\Router($_GET['page']);

$router->get('/', function () {
    echo "Template";
});
$router->get('/posts', function () {
    echo 'Tous les articles';
});
$router->get('/article/:id-:slug', function ($id, $slug) use ($router){
    echo $router->url('posts.show',['id' => 1, 'slug']);
}, 'posts.show')->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');

$router->get('/posts/:id', "Posts#show");

$router->get('/posts/:id', function ($id) {
    echo 'Poster pour l\' article' . $id;
});

define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));


try {
    if (empty($_GET['page'])) {
        require "Views/accueil.view.php";
    } else {

        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
//        dd($url);
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

function security(string $parameter): void
{
    $controller = new SecurityController();

    if ($parameter === 'login') {
//        var_dump($controller);
        $controller->login();
    }

}
