<?php

use App\Routing\Router;

require '../vendor/autoload.php';
session_start();
//dd($_SERVER);
$router = new Router($_GET['url']);
$router->get('/', 'Home#index');
//articles
$router->get('/articles/', 'Articles#displayArticles');
$router->get('/articles/:id', 'Articles#showArticle');
//comments
$router->get('/comments/', 'Comment#listComments');
$router->get('/comments/:id', 'Comment#displayComments');
$router->post('/comments/addComment','Comment#addComment');
$router->post('/comments/editComment/:id','Comment#editComment');
//contact
$router->get('/contact/','Contact#formContact');
//security
$router->get('/login/','Security#login');
$router->get('/register/','Security#register');
$router->get('/logout/','Security#logout');
//admin
$router->get('/dashboard','Admin#dashboard');
$router->post('/admin/addArticles/','Admin#addArticle');
$router->post('/admin/editArticle/:id','Admin#editArticle');
$router->get('/admin/deleteArticle/:id','Admin#deleteArticle');
$router->get('/admin/deleteComment/:id','Admin#deleteComment');
try {
    $router->run();
} catch (Exception $e) {
}