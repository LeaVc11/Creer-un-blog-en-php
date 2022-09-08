<?php
//    var_dump($errors);
use App\models\Manager\FlashManager;
use App\Routing\Router;
?>

<div class="container">
<div class="fw-bold " >


    <h1 class="m-3 text-center text-primary">Ajouter un commentaire</h1>
    <div class="m-3 text-center">
    <legend class="">Laisser un commentaire sur cet article</legend>
    <small class="text-muted text-center ">Vous devez <a class="text-danger  text-uppercase fw-bold"
        href="<?= Router::generate("/login") ?>">être connecté(e)</a> à votre compte utilisateur pour pouvoir laisser un commentaire.</small>
    </div>
    <form method="POST" action="<?= Router::generate('/comments/addComment') ?>" enctype="multipart/form-data">
        <input type="hidden" name="articleId" value="<?= $article->getId() ?>">
        <div class="row m-5">
            <div class="col text-primary fw-bold">
                <label for="title">Titre : </label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

        </div>
        <div class="row m-5">
            <div class="col text-primary fw-bold">
                <label for="content">Content: </label>
                <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>
            </div>
        </div>

        <div class=" text-center m-5">
            <a href="<?= Router::generate('/articles') ?>"
               class="btn btn-primary text-white text-center mb-2 rounded-1 border ">Retour</a>
            <button  class="btn btn-warning text-dark text-center mb-2  rounded-1 border "
                    type="submit">Valider</button>
        </div>
    </form>
</div>
