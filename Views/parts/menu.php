<a href=" <?= URL ?>articles">Ajouter un article </a>

<a href="logout">Se déconnecter</a>

<?php
$user = unserialize($_SESSION['user']);
if ($user->isAdmin()) {
    echo('<a href="<?= URL ?>admin/dashboard">Administrateur</a>');
}
?>

