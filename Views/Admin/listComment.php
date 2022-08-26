<?php

require_once "Models/Class/comment.php";


ob_start(); ?>

<h2 class="text-secondary m-5 ">Commentaires</h2>
<p class="lead">Administrez ici les commentaires du blog.</p>


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


