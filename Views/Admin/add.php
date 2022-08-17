<?php
ob_start();
?>
<h1 class="m-3 text-center text-primary">Ajouter un article</h1>
    <form method="POST" action="<?= URL ?>articles/a" enctype="multipart/form-data">
        <div class="row m-5">
            <div class="col text-primary fw-bold text-decoration-underline">
                <label for="titre">Titre : </label>
                <input type="text" class="form-control" id="titre" name="titre">
            </div>
            <div class="col text-primary fw-bold text-decoration-underline">
                <label for="chapô">Chapô : </label>
                <input type="text" class="form-control" id="chapô" name="chapô">
            </div>
        </div>
        <div class="row m-5">
            <div class="col text-primary fw-bold text-decoration-underline">
                <label for="titre">Slug : </label>
                <input type="text" class="form-control" id="titre" name="titre">
            </div>
            <div class="col text-primary fw-bold text-decoration-underline">
                <label for="chapô">Chapô : </label>
                <input type="text" class="form-control" id="chapô" name="chapô">
            </div>
        </div>
        <div class="row m-5">
            <div class="col text-primary fw-bold text-decoration-underline">
                <label for="auteur">Auteur: </label>
                <input type="number" class="form-control" id="auteur" name="auteur">
            </div>
            <div class="col text-primary fw-bold text-decoration-underline">
                <label for="image">Image : </label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
        </div>
        <div class="row m-5">
            <div class="col text-primary fw-bold text-decoration-underline">
                <label for="image">Date de création: </label>
                <input type="date" class="form-control" id="image" name="image">
            </div>
            <div class="col text-primary fw-bold text-decoration-underline">
                <label for="image">Date de modification: </label>
                <input type="date" class="form-control" id="image" name="image">
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