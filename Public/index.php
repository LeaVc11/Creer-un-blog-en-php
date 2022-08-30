<?php

use App\Routing\Router;

require '../vendor/autoload.php';
session_start();
//dd($_SERVER);
$router = new Router($_GET['url']);
$router->get('/', 'Home#index');
$router->get('/articles/', 'Articles#displayArticles');
$router->get('/articles/:id', 'Articles#showArticle');
$router->get('/comments/', 'Comment#listComments');
$router->get('/comments/:id', 'Comment#displayComments');
$router->post('/comments/add','Comment#addComment');
$router->get('/contact','Contact#formContact');
$router->get('/login','Security#login');
$router->get('/register','Security#register');
$router->get('/logout','Security#logout');
$router->get('/admin/dashboard','Admin#dashboard');
$router->post('/admin/addArticle','Admin#addArticle');
$router->get('/admin/:id','Admin#editArticle');
$router->post('/admin/:id','Admin#deleteArticle');
try {
    $router->run();
} catch (Exception $e) {
}



