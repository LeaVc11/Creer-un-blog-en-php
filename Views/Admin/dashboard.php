<?php

require_once "Models/Class/Article.php";


ob_start(); ?>

<?php
//include 'Views/parts/menu.php';
//?>
<h2 class="text-secondary m-5 ">Articles</h2>
<p class="lead">Administrez ici les articles du blog.</p>


<table class="table text-center">
    <tr class="table-dark">
    <tr>
        <th scope="col">Titre</th>
        <th scope="col">Image</th>
        <th scope="col">Chapô</th>
        <th scope="col">Slug</th>
        <th scope="col">Content</th>
        <th scope="col">Date de création</th>
        <th scope="col">Date de modification</th>
        <th scope="col">Auteur</th>
        <?php
        if (isset($_SESSION['user'])) {
            echo('<th>Edition</th>');
        }
        ?>
    </tr>
    <div class="d-flex justify-content-end">
        <a href="<?= URL ?>admin/a" class="btn btn-warning  m-1">Ajouter</a>
    </div>
    <tr>
        <?php
        foreach ($articles as $article) {
        ?>
        <td><?= $article->getTitle() ?></td>
        <td><?= $article->getImageLink() ?></td>
        <td><?= $article->getSlug() ?></td>
        <td><?= $article->getSlug() ?></td>
        <td><?= $article->getContent() ?></td>
        <td><?= $article->getCreatedAt()->format('d/m/Y - H:i:s') ?></td>
        <td><?= $article->getUpdatedAt()->format('d/m/Y - H:i:s') ?></td>
        <td><?= $article->getContent() ?></td>
        <td><?= $article->getAuthor() ?></td>
        <td>
            <?php
            }
            ?>
            <a href="<?= URL ?>article/s/<?= $article->getId(); ?>" class="btn btn-primary text-center m-1"
               target="_blank" role="button">Voir</a>
        </td>
        <td>
            <a href="<?= URL ?>article/e/<?= $article->getId(); ?>" class="btn btn-secondary"
               role="button">Editer</a>
        </td>
        <td>
            <a href="" class="btn btn-danger" role="button">Supprimer</a>
        </td>


    </tr>

</table>


<!--contact-->

<section class="d-flex justify-content-center align-content-center w-100 h-100 m-3 p-3 " id="contact">
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


