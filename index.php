<?php

use App\Routing\Router;

require 'vendor/autoload.php';

//dump($_SERVER);

$router = new Router($_GET['url']);

$router->get('/', 'Home#index');
$router->get('/articles', 'ArticlesController#displayArticles');
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

try {
    $router->run();
} catch (Exception $e) {
}
session_start();


