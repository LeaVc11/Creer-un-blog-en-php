<?php
ob_start();
?>
    <form method="POST" action="<?= URL ?>articles/a" enctype="multipart/form-data">
        <div class="form-group m-5">
            <label for="titre">Image : </label>
            <input type="text" class="form-control" id="titre" name="titre">
        </div>
        <div class="form-group m-5">
            <label for="titre">Titre : </label>
            <input type="text" class="form-control" id="titre" name="titre">
        </div>
        <div class="form-group m-5">
            <label for="nbPages">Commentaires : </label>
            <input type="number" class="form-control" id="nbPages" name="nbPages">
        </div>
        <div class="form-group m-5">
            <label for="image">Image : </label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button class="btn btn-primary text-white  m-3 p-2 w-100 rounded-1 border border-dark form-control"
                type="submit">Valider
        </button>    </form>
<?php
$content = ob_get_clean();

require "Views/template.php";
?>