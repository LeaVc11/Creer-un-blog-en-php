<?php

use App\Models\Manager\FlashManager;
use App\Routing\Router;

?>

<?php FlashManager::displayFlash(); ?>
<?php FlashManager::displayFlashSuccess(); ?>

<div class="container">
    <div class=" m-4 fw-bold ">
        <h1 class="mt-5 text-center text-primary">Ajouter un article</h1>

        <form method="POST"  enctype="multipart/form-data">
            <div class="row m-5">
                <div class="col text-primary fw-bold ">
                    <label for="title">Titre : </label>
                    <input type="text" class="form-control" id="title" name="title" >
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
                <a href="<?= Router::generate('admin/dashboard') ?>"
                   class="btn btn-primary text-white text-center mb-2 rounded-1 border ">Retour</a>
                <button class="btn btn-warning text-dark text-center mb-2  rounded-1 border "
                        type="submit">Valider
                </button>
            </div>
        </form>
    </div>

