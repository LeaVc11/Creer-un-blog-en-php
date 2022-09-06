<?php

use App\Routing\Router;

require '../vendor/autoload.php';
session_start();

$router = new Router($_GET['url']);
$router->get('/', 'Home#index');
//articles
$router->get('/articles', 'Articles#displayArticles');
$router->get('/articles/:id', 'Articles#showArticle');
//comments
//$router->get('/comments', 'Comment#listComments');
$router->get('/comments/:id', 'Comment#displayComments');

$router->get('/comments/addComment','Comment#addComment');
$router->post('/comments/addComment','Comment#addComment');

$router->get('/comments/editComment/:id','Comment#editComment');
$router->post('/comments/editComment/:id','Comment#editComment');
//contact
$router->get('/contact/addContact','Contact#addContact');
$router->post('/contact/addContact','Contact#addContact');
//security
$router->get('/login','Security#login');
$router->post('/login','Security#login');

$router->get('/register','Security#register');
$router->post('/register','Security#register');

$router->get('/logout','Security#logout');
//admin
$router->get('/dashboard','Admin#dashboard');
$router->get('/admin/addArticles','Admin#addArticle');
$router->post('/admin/addArticles','Admin#addArticle');

$router->get('/admin/editArticle/:id','Admin#editArticle');
$router->post('/admin/editArticle/:id','Admin#editArticle');

$router->get('/admin/deleteArticle/:id','Admin#deleteArticle');
$router->get('/admin/deleteComment/:id','Comment#deleteComment');

try {
    $router->run();
    extract(compact('router'));
} catch (Exception $e) {
}
