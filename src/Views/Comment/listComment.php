
<h2 class="text-secondary m-5 "> Mes commentaires</h2>

<table class="table table-light text-center ">
    <tr class="table-secondary">
        <th scope="col">Titre</th>
        <th scope="col">Contenu</th>
        <th scope="col">Date de création</th>>
        <th scope="col">Auteur</th>
    </tr>
        <?php

        use App\Routing\Router;

        foreach ($comments as $comment) {
        ?>
    <tr>
        <td><?= $comment->getTitle() ?></td>
        <td><?= $comment->getContent() ?></td>
        <td><?= $comment->getCreatedAt()->format('d/m/Y') ?></td>
        <td><?= $comment->getCreatedBy() ?></td>

    </tr>
        <?php } ?>
</table>
<div class=" text-center">
    <a href="<?= Router::generate('/articles/') ?>" class="btn btn-primary text-center text-white fw-bold mb-2" target="_blank">Retour</a>
    <a href="<?= Router::generate("/comments/editComment") ?>" class="btn btn-warning text-center text-white fw-bold mb-2" target="_blank">Modifier</a>
</div>




