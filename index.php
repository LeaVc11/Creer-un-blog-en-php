<?php

use App\Routing\Router;

require __DIR__ . '/vendor/autoload.php';
session_start();
//var_dump($_GET['url']);
//die();
//$router = new Router(dirname(__DIR__) . '/views');
$router = new Router($_GET['url']);
//
//dd($router);
$router->get('/', 'Home#index');
$router->get('/articles/', 'Articles#displayArticles');
$router->get('/posts/:id', 'Articles#showArticle');
$router->get('/comments/', 'Comments#displayComments');
$router->get('/comments/:id', 'Comments#showArticle');
$router->get('/comments/add','Comment#addArticle');
$router->get('/contact','Contact#formContact');
$router->get('/login','Security#login');
$router->get('/register','Security#register');
$router->get('/logout','Security#logout');
$router->get('/admin/dashboard','Admin#dashboard');
$router->get('/admin/addArticle','Admin#addArticle');
$router->get('/admin/:id','Admin#editArticle');
$router->get('/admin/:id','Admin#deleteArticle');

try {
    $router->run();
} catch (Exception $e) {
}



