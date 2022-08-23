<?php

require_once "Models/Class/Comment.php";


ob_start(); ?>

<!--commentaire-->
<section class=" w-100 h-100 rounded mt-5 p-1" >

    <h2 class="text-center display-6 m-5 p-2" style=" color: #aaa;"><strong>Commentaires</strong></h2>


    <p class="text-center">Laisser un commentaires sur cet article</p>


    <p class="text-center">Vous devez <a class="text-decoration-none text-primary" href="<?= URL ?>security/login">être connecté(e)</a> à votre compte utilisateur pour pouvoir laisser un
        commentaire.</p>

    <div class="m-5 " id="form">
        <div class="container-form text-center ">
            <div id="form-row" class="row justify-content-center align-items-center">

                <form class="form-bloc text-center" method="POST">
                    <div class="form-groupe p-3">
                        <label  style="color: #666666; " for="title" ></label>
                        <input class="w-50 mb-2 pb-2 border-bottom border-1"
                               name="title"
                               style="border: 0; outline: 0; background : 0; "
                               type="text" required maxlength="16" id="title" placeholder="Titre">
                    </div>
                    <div class="form-groupe  fw-bold m-2 text-center " >
                            <textarea class="w-50 h-50 border-2 p-3 "
                                      name="comment"
                                      style="; outline: 0; background : #f7f1e3; resize: none; color : #666666;  border-color: #8b97d7; "
                                      id="txt" cols="45" rows="10"
                                      placeholder ="Votre commentaire"></textarea>
                    </div>
                    <div class="form-groupe  fw-bold  text-center">
                        <input class=" button-sub   w-auto p-2  border border-2  btn btn-outline-secondary rounded-pill align-center"
                               name="submit_comment"
                               type="submit"
                               value="Poster mon commentaire" >
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>



<?php
$content = ob_get_clean();
require "Views/Articles/articles.view.php";
?>


