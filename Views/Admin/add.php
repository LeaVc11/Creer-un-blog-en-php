<?php
ob_start();
?>
<h1 class="m-3 text-center text-primary">Ajouter un article</h1>
    <form method="POST" action="<?= URL ?>admin/a" enctype="multipart/form-data">
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
        <div class="row m-5">
            <div class="col  text-primary fw-bold ">
                <label for="created_at">Date de création: </label>
                <input type="date" class="form-control" id="created_at" name="created_at">
            </div>
            <div class="col text-primary fw-bold ">
                <label for="updated_at">Date de modification: </label>
                <input type="date" class="form-control" id="updated_at" name="updated_at">
            </div>
        </div>
        <button class="btn btn-primary text-white  m-3 p-2 w-100 rounded-1 border border-dark form-control"
                type="submit">Valider
        </button>

    </form>



<?php
$content = ob_get_clean();

require "Views/template.php";
?>