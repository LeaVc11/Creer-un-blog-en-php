<?php
//    var_dump($errors);
use App\Routing\Router;

if (!empty($errors)):?>
    <div class=" m-3 fw-bold alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <p><?= $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<div class=" m-4 fw-bold ">

    <h1 class="m-3 text-center text-primary">Modifier un commentaire</h1>
    <div class="container">
        <form method="POST" action="<?= Router::generate('/comments/editComment/' . $comment->getId()) ?>"
              enctype="multipart/form-data">
            <div class="row m-5">
                <div class="col text-primary fw-bold ">
                    <label for="title">Titre : </label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $comment->getTitle() ?>">
                </div>
                <div class="col text-primary fw-bold ">
                    <label for="CreatedBy">Auteur : </label>
                    <input type="text" class="form-control" id="CreatedBy" name="CreatedBy" value="<?= $comment->getCreatedBy() ?>">
                </div>
            </div>
            <div class="row m-5">
                <div class="col text-primary fw-bold">
                    <label for="content">Content: </label>
                    <textarea name="content" class="form-control" id="content" cols="30"
                              rows="10"><?= $comment->getContent() ?> </textarea>
                </div>
            </div>
            <div class="row m-5">
            </div>
            <div class=" text-center">
                <a href="<?= Router::generate('/comments/' . $comment->getArticleId()) ?>"
                   class="btn btn-primary text-white text-center mb-2 rounded-1 border ">Retour</a>
                <button class="btn btn-warning text-dark text-center mb-2  rounded-1 border "
                        type="submit">Valider
                </button>
            </div>
        </form>
    </div>
