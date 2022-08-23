<?php

use App\Models\Class\Article;

ob_start();
/** @var Article $article */
?>
    <div class="row">
<!--        <p class=" fw-bold text-center text-info display-6 m-5"></p>-->
        <div class="col-6 mt-5 text-center">
<!--            --><?php
//dd($article->getImageLink());
//            ?>
            <img src="<?= URL?>Public/uploads/<?= $article->getImageLink() ?>" class="w-50 p-3" alt="">
        </div>
        <div class="col-6 mt-5 p-5 text-center fw-bold ">
            <h4><?= $article->getTitle(); ?>
                <div class="container mt-5">
                    <div class="row mt-2">
                        <div class="col-md">
                            Auteur :
                        </div>
                        <div class="col-md text-success">
                            <?= $article->getAuthor() ?>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md">
                            Ecrit le :
                        </div>
                        <div class="col-md">
                            <?= $article->getCreatedAt()->format('d/m/Y ') ?>
                        </div>

                    </div>
                    <div class="row mt-2">
                        <div class="col-md">
                            Modifié le :
                        </div>
                        <div class="col-md">
                            <?= $article->getUpdatedAt()->format('d/m/Y ') ?>
                        </div>
                    </div>


                </div>


        </div>
    </div>

<div class=" text-center">
    <a href="<?= URL ?>articles" class="btn btn-primary text-center text-white fw-bold mb-2" target="_blank">Retour</a>
</div>
<div class=" text-center">
    <a href="<?= URL ?>articles/a" class="btn btn-primary text-center text-white fw-bold mb-2" target="_blank">Poster un commentaire</a>
</div>

<!--commentaire-->
<!--    <section class=" w-100 h-100 rounded mt-5 p-1" >-->
<!---->
<!--        <h2 class="text-center display-6 m-5 p-2" style=" color: #333;"><strong>Commentaires</strong></h2>-->
<!---->
<!---->
<!--        <p class="text-center">Laisser un commentaires sur cet article</p>-->
<!---->
<!---->
<!--        <p class="text-center">Vous devez <a class="text-decoration-none text-primary" href="--><?//= URL ?><!--security/login">être connecté(e)</a> à votre compte utilisateur pour pouvoir laisser un-->
<!--            commentaire.</p>-->
<!---->
<!--        <div class="m-5 " id="form">-->
<!--            <div class="container-form text-center ">-->
<!--                <div id="form-row" class="row justify-content-center align-items-center">-->
<!---->
<!--                    <form class="form-bloc text-center" method="POST">-->
<!--                        <div class="form-groupe p-3">-->
<!--                            <label  style="color: #666666; " for="title" ></label>-->
<!--                            <input class="w-50 mb-2 pb-2 border-bottom border-1"-->
<!--                                   name="title"-->
<!--                                   style="border: 0; outline: 0; background : 0; "-->
<!--                                   type="text" required maxlength="16" id="title" placeholder="Titre">-->
<!--                        </div>-->
<!--                        <div class="form-groupe  fw-bold m-2 text-center " >-->
<!--                            <textarea class="w-50 h-50 border-2 p-3 "-->
<!--                                      name="comment"-->
<!--                                      style="; outline: 0; background : #f7f1e3; resize: none; color : #666666;  border-color: #8b97d7; "-->
<!--                                      id="txt" cols="45" rows="10"-->
<!--                                      placeholder ="Votre commentaire"></textarea>-->
<!--                        </div>-->
<!--                        <div class="form-groupe  fw-bold  text-center">-->
<!--                            <input class=" button-sub   w-auto p-2  border border-2  btn btn-outline-secondary rounded-pill align-center"-->
<!--                                   name="submit_comment"-->
<!--                                   type="submit"-->
<!--                                   value="Poster mon commentaire" >-->
<!--                        </div>-->
<!--                    </form>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
<!--contact-->
<!--<section class="d-flex justify-content-center align-content-center w-100 h-100 m-3" id="contact">-->
<!--    <div class="card shadow  p-4 rounded d-flex justify-content-center  ">-->
<!---->
<!--        <h1 class="text-center mb-3">Me contacter</h1>-->
<!--        <form class="d-flex justify-content-center  w-100 h-100 ">-->
<!--            <fieldset>-->
<!--                <div class="form-group mb-3">-->
<!--                    <input type="text" class="form-control" id="nom" placeholder="Votre adresse email">-->
<!--                </div>-->
<!---->
<!--                <div class="row mb-3">-->
<!--                    <div class="col">-->
<!--                        <input type="text" class="form-control" placeholder="Votre Nom">-->
<!--                    </div>-->
<!--                    <div class="col">-->
<!--                        <input type="text" class="form-control" placeholder="Votre Prénom">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="input-group-prepend mb-3"></div>-->
<!--                <textarea class="form-control" aria-label="Message" placeholder="Votre message"></textarea>-->
<!---->
<!--                <input class=" button-sub hover-overlay text-dark border border-2 btn btn-outline-warning  fw-bold mt-2  "-->
<!--                       type="submit"-->
<!--                       value="ENVOYER">-->
<!--            </fieldset>-->
<!--        </form>-->
<!--    </div>-->
<!--</section>-->


<?php

$content = ob_get_clean();
require "Views/template.php";

?>
