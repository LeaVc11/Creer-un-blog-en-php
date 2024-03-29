<?php

use App\Controllers\ExceptionController;
use App\Routing\Router;

require '../vendor/autoload.php';
session_start();

$router = new Router($_GET['url']);
$router->get('/', 'Home#index');

$router->get('/articles', 'Articles#displayArticles');
$router->get('/articles/:id', 'Articles#showArticle');

$router->get('/comments/:id', 'Comment#displayComments');

$router->get('/comments/addComment','Comment#addComment');
$router->post('/comments/addComment','Comment#addComment');

$router->get('/comments/editComment/:id','Comment#editComment');
$router->post('/comments/editComment/:id','Comment#editComment');

$router->get('/contact/addContact','Contact#addContact');
$router->post('/contact/addContact','Contact#addContact');

$router->get('/login','Security#login');
$router->post('/login','Security#login');

$router->get('/register','Security#register');
$router->post('/register','Security#register');

$router->get('/logout','Security#logout');

$router->get('/dashboard','Admin#dashboard');
$router->get('/admin/addArticles','Admin#addArticle');
$router->post('/admin/addArticles','Admin#addArticle');

$router->get('/admin/editArticle/:id','Admin#editArticle');
$router->post('/admin/editArticle/:id','Admin#editArticle');

$router->get('/admin/deleteArticle/:id','Admin#deleteArticle');
$router->get('/admin/deleteComment/:id','Comment#deleteComment');
$router->get('/admin/deleteContact/:id','Contact#deleteContact');
$router->get('/admin/deleteUser/:id','User#deleteUser');


extract(compact('router'));
try {
    $router->run();
} catch (Exception $e) {
    (new ExceptionController)->pageIntrouvable();
}
