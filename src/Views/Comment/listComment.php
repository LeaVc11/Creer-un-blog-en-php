<?php

use App\Routing\Router;
if (isset($_SESSION['user'])){
    $user =unserialize($_SESSION['user']);
}

?>

<h2 class="text-secondary m-5 "> Mes commentaires</h2>
<div class="container">
    <table class="table table-light text-center table-bordered border-dark p-5">
        <tr class="table-secondary table-bordered border-dark">
            <th scope="col">Titre</th>
            <th scope="col">Contenu</th>
            <th scope="col">Date de création</th>
            <th scope="col">Auteur</th>
            <th></th>
        </tr>
        <?php
        foreach ($comments as $comment) {
            ?>
            <tr>
                <td><?= $comment->getTitle()?></td>
                <td><?= $comment->getContent() ?></td>
                <td><?= $comment->getCreatedAt()->format('d/m/Y') ?></td>
                <td><?= $comment->getCreatedBy()?></td>
                <td>
                    <?php
                    if (isset($user) && $comment->getCreatedBy() == $user->getUsername() ) {
                        ?>
                        <a href="<?= Router::generate('/comments/editComment/' . $comment->getId()) ?>"
                           class="btn btn-primary text-center text-white fw-bold mb">Modifier</a>
                        <?php
                    }
                    ?>
                </td>
            </tr>

        <?php } ?>
    </table>
    <div class=" text-center">
        <a href="<?= Router::generate('/articles') ?>"
           class="btn btn-primary text-center text-white fw-bold mb-2">Retour</a>
    </div>
</div>

