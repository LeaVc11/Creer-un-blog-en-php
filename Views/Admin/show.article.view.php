<?php

use App\Models\Class\Article;

ob_start();
/** @var Article $article */
?>
    <div class="row">
<!--        <p class=" fw-bold text-center text-info display-6 m-5"></p>-->
        <div class="col-6 mt-5">
            <img src="<?= URL?>/public/images/<?= $article->getImageLink() ?>" class="w-100 p-3" alt="html&css">
        </div>
        <div class="col-6 mt-5 p-5 text-center fw-bold ">
            <h4><?= $article->getTitle(); ?>
                <p class="text-end text-secondary mt-5"><?= $article->getCreated_at()->format('d/m/Y - H:i:s') ?></p>

        </div>
    </div>

<div class=" text-center">
    <a href="<?= URL?>articles" class="btn btn-primary text-center text-white fw-bold" target="_blank">Retour</a>
</div>

    <section class=" w-100 h-100 rounded mt-5 p-1" style="background : #f7f1e3">

        <h2 class="text-center display-6 m-5 p-2" style="background-color: #333; color: #aaa;"><strong>Commentaires</strong></h2>


        <p class="text-center">Laisser un commentaires sur cet article</p>


        <p class="text-center">Vous devez être connecté(e) à votre compte utilisateur pour pouvoir laisser un
            commentaire.</p>

        <div class="m-5 " id="form">
            <div class="container-form text-center ">
                <div id="form-row" class="row justify-content-center align-items-center">
                    <form class="form-bloc text-center">
                        <div class="form-groupe p-3">
                            <label  style="color: #666666; " for="title" ></label>
                            <input class="w-50 mb-2 pb-2 border-bottom border-1"
                                   style="border: 0; outline: 0; background : 0; "
                                   type="text" required maxlength="16" id="title" placeholder="Titre">
                        </div>
                        <div class="form-groupe  fw-bold m-2 text-center " >
                            <textarea class="w-50 h-50 border-2 p-3 "
                                      style="; outline: 0; background : #ffffff; resize: none; color : #666666;  border-color: #8b97d7; "
                                      id="txt" cols="45" rows="10"
                                      placeholder ="Votre commentaire"></textarea>
                        </div>


                        <div class="form-groupe  fw-bold  text-center">
                            <input class=" button-sub hover-overlay  w-auto p-2  border border-2  btn btn-outline-dark rounded-pill align-center"
                                   style="border: 0; outline: 0;  color : #f1f1f1 font-size : 18px"
                                   type="submit"
                                   value="ENVOYER" >
<!--                            <a href="">Si connecter droit ajouter </a>-->
<!--                            <a href="">Si pas inscrit => inscription </a>-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
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
