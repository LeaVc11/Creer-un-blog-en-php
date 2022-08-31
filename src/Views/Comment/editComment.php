<?php
//    var_dump($errors);
use App\Routing\Router;

if(!empty($errors)):?>
    <div class=" m-3 fw-bold alert alert-danger">
        <?php foreach($errors as $error):?>
            <p><?=$error;?></p>
        <?php endforeach;?>
    </div>
<?php endif;?>
    <div class=" m-4 fw-bold ">

    <h1 class="m-3 text-center text-primary">Modifier un commentaire</h1>
    <form method="POST" action="<?=  Router::generate('/comments/editArticle/'.$_POST['articleId'])?>" enctype="multipart/form-data">
        <div class="row m-5">
            <div class="col text-primary fw-bold ">
                <label for="title">Titre : </label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

        </div>
        <div class="row m-5">

        </div>
        <div class="row m-5">
            <div class="col text-primary fw-bold">
                <label for="content">Content: </label>
                <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="row m-5">

        </div>
        <div class=" text-center">
            <a href="<?= Router::generate('/comments/listComment/'.$_POST['articleId'])?>" class="btn btn-primary text-white text-center mb-2 w-100 rounded-1 border form-control" target="_blank">Retour</a>
            <button class="btn btn-primary text-white text-center w-100 rounded-1 border form-control"
                    type="submit">Valider
            </button>
        </div>
    </form>
