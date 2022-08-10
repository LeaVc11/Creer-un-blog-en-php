<?php

use App\models\Article;

ob_start();
/** @var Article $article */
?>
    <div class="row">
        <p class="text-start fw-bold text-info display-6 m-5"><?= $article->getContent(); ?></p>
        <div class="col-6 mt-auto">

            <img src="<?= URL?>/public/images/<?= $article->getImageLink() ?>" class="w-100 p-3" alt="Plage">
        </div>
        <div class="col-6 mt-5">
            <p><?= $article->getTitle(); ?>
                <p class="text-end text-secondary"><?= $article->getCreated_at()->format('d/m/Y - H:i:s') ?></p>

        </div>
    </div>
<div class=" text-center">
    <a href="<?= URL?>articles" class="btn btn-primary text-center text-white fw-bold" target="_blank">Retour</a>
</div>
<!--contact-->
<section class="d-flex justify-content-center align-content-center w-100 h-100 m-3" id="contact">
    <div class="card shadow  p-4 rounded d-flex justify-content-center  ">

        <h1 class="text-center mb-3">Me contacter</h1>
        <form class="d-flex justify-content-center  w-100 h-100 ">
            <fieldset>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" id="nom" placeholder="Votre adresse email">
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Votre Nom">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Votre Prénom">
                    </div>
                </div>
                <div class="input-group-prepend mb-3"></div>
                <textarea class="form-control" aria-label="Message" placeholder="Votre message"></textarea>

                <input class=" button-sub hover-overlay text-dark border border-2 btn btn-outline-warning  fw-bold mt-2  "
                       type="submit"
                       value="ENVOYER">
            </fieldset>
        </form>
    </div>
</section>


<?php

$content = ob_get_clean();
require "Views/template.php";

?>
