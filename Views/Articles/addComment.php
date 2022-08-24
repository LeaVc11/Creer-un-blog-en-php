<?php
//    var_dump($errors);
if(!empty($errors)):?>
    <div class=" m-3 fw-bold alert alert-danger">
        <?php foreach($errors as $error):?>
            <p><?=$error;?></p>
        <?php endforeach;?>
    </div>
<?php endif;?>
<div class="fw-bold " >

    <h1 class="m-3 text-center text-primary">Ajouter un commentaire</h1>
    <form method="POST" action="<?= URL ?>article/s" enctype="multipart/form-data">
        <div class="row m-5">
            <div class="col text-primary fw-bold">
                <label for="slug">Titre : </label>
                <input type="text" class="form-control" id="slug" name="slug">
            </div>
            <div class="col text-primary fw-bold ">

            </div>

        </div>
        <div class="row m-5">
            <div class="col text-primary fw-bold">
                <label for="content">Content: </label>
                <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>

            </div>

        </div>

        <div class=" text-center m-5">
            <a href="<?= URL?>admin/listComment" class="btn btn-primary text-white text-center mb-2 w-100 rounded-1 border form-control" target="_blank">Retour</a>
            <button class="btn btn-primary text-white text-center w-100 rounded-1 border form-control"
                    type="submit">Valider
            </button>
        </div>
    </form>

