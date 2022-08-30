

<h2 class="text-secondary m-5 "> Mes commentaires</h2>

<table class="table table-dark text-center ">
    <tr>
        <th scope="col">Titre</th>
        <th scope="col">Contenu</th>
        <th scope="col">Date de création</th>>
        <th scope="col">Auteur</th>
    </tr>
        <?php
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




