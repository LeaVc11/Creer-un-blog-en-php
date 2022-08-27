<?php

use App\Routing\Router;

require __DIR__ . '/vendor/autoload.php';

//var_dump($_GET['url']);
//die();
$router = new Router("/");
//$router->get('/', function(){ echo "Bienvenue sur ma homepage !"; });
$router->get('/posts/:id', function($id){ echo "Voila l'article $id"; });
//dump($_SERVER);
//
//$router = new Router($_GET['url']);
//
$router->get('', 'Home#index');
$router->get('/articles', 'Articles#displayArticles');
$router->get('/articles/:id', 'Articles#showArticle');
$router->get('/comments/', 'Comments#displayComments');
$router->get('/comments/:id', 'Comments#showArticle');
$router->get('/comments/add','Comment#addArticle');
$router->get('/login','Security#login');
$router->get('/register','Security#register');
$router->get('/logout','Security#logout');
$router->get('/admin/dashboard','Admin#dashboard');
$router->get('/admin/addArticle','Admin#addArticle');
$router->get('/admin/:id','Admin#editArticle');
$router->get('/admin/:id','Admin#deleteArticle');
$router->run();

//try {
//    $router->run();
////} catch (Exception $e) {
//}
session_start();


