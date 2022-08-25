<?php

require_once "Models/Class/Article.php";
require_once "Models/Class/comment.php";

ob_start(); ?>

<?php
//include 'Views/parts/menu.php';
//?>
<?php
//$user = unserialize($_SESSION['user']);
//
//if ($user->isAdmin()) {
//    echo('<a href="admin/dashboard">Administrateur</a>');
//}
//echo('Bonjour ' . unserialize($_SESSION['user'])->getUsername());
//echo('<a href="admin/logout">Se déconnecter</a>');
////?>
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
    <tr>

        <td><?= $article->getImageLink() ?></td>
        <td><?= $article->getChapo() ?></td>
        <td><?= $article->getTitle() ?></td>
        <td><?= $article->getContent() ?></td>
        <td><?= $article->getSlug() ?></td>
        <td><?= $article->getAuthor() ?></td>
        <td><?= $article->getCreatedAt()->format('d/m/Y ') ?></td>
        <td><?= $article->getUpdatedAt()->format('d/m/Y ') ?></td>

        <td>

            <?php
            //dd($article->getId());
            ?>

        </td>

    <td>
        <?php
        //var_dump($article->getId());
        //die();
        ?>
        <a href="<?= URL ?>admin/e/<?= $article->getId(); ?>" class="btn btn-secondary"
           role="button">Modifier</a>
    </td>
    <td>
        <a href="<?= URL ?>admin/d/<?= $article->getId(); ?>" class="btn btn-danger" role="button">Supprimer</a>
    </td>

    <?php } ?>
    </tr>
</table>



<h2 class="text-secondary m-5 ">Articles</h2>
<p class="lead">Administrez ici les articles du blog.</p>


<table class="table text-center">
    <tr class="table-dark">
    <tr>
        <th scope="col">Titre</th>
        <th scope="col">Status</th>
        <th scope="col">Contenu</th>
        <th scope="col">Date de création</th>>
        <th scope="col">Auteur</th>
        <?php
        if (isset($_SESSION['user'])) {
            echo('<th>Edition</th>');
        }
        ?>
    </tr>

    <tr>
        <?php

        foreach ($comments as $comment) {
        ?>
    <tr>

        <td><?= $comment->getTitle() ?></td>
        <td><?= $comment->getStatus() ?></td>
        <td><?= $comment->getContent() ?></td>
        <td><?= $comment->getCreatedBy() ?></td>
        <td><?= $comment->getCreatedAt()->format('d/m/Y') ?></td>

        <td>

            <?php

            ?>

        </td>

        <td>
            <?php
            //var_dump($article->getId());
            //die();
            ?>
            <a href="<?= URL ?>admin/e/<?= $comment->getId(); ?>" class="btn btn-secondary"
               role="button">Valider</a>
        </td>
        <td>
            <a href="<?= URL ?>admin/d/<?= $comment->getId(); ?>" class="btn btn-danger" role="button">Publier</a>
        </td>

        <?php } ?>
    </tr>
</table>

<?php
$content = ob_get_clean();
require "Views/template.php";
?>


