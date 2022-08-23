<?php
ob_start();
?>
<?php
//    var_dump($errors);
if(!empty($errors)):?>
    <div class=" m-3 fw-bold alert alert-danger">
        <?php foreach($errors as $error):?>
            <p><?=$error;?></p>
        <?php endforeach;?>
    </div>
<?php endif;?>
    <div class=" m-4 fw-bold " style="background : #f7f1e3">

    <h1 class="m-3 text-center text-primary">Modifier un article</h1>
    <form method="POST" action="<?= URL ?>admin/e/<?= $article->getId() ?>" enctype="multipart/form-data">
        <div class="row m-5">
            <div class="col text-primary fw-bold ">
                <label for="title">Titre : </label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="col text-primary fw-bold ">
                <label for="chapo">Chapô : </label>
                <input type="text" class="form-control" id="chapo" name="chapo">
            </div>
        </div>
        <div class="row m-5">
            <div class="col text-primary fw-bold">
                <label for="slug">Slug : </label>
                <input type="text" class="form-control" id="slug" name="slug">
            </div>
            <div class="col text-primary fw-bold ">
                <label for="author">Auteur: </label>
                <input type="text" class="form-control" id="author" name="author">
            </div>

        </div>
        <div class="row m-5">
            <div class="col text-primary fw-bold">
                <label for="content">Content: </label>
                <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>

            </div>

        </div>
        <div class="row m-5">

            <div class="col text-primary fw-bold">
                <label for="image_link">Image :</label>
                <input type="file" class="form-control-file" id="image_link" name="image_link">
            </div>
        </div>
        <div class=" text-center">
            <a href="<?= URL?>admin/dashboard" class="btn btn-primary text-white text-center mb-2 w-100 rounded-1 border form-control" target="_blank">Retour</a>
            <button class="btn btn-primary text-white text-center w-100 rounded-1 border form-control"
                    type="submit">Valider
            </button>
        </div>
    </form>



<?php
$content = ob_get_clean();

require "Views/template.php";
?>