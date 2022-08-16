
<?php
$user=unserialize($_SESSION['user']);

if ($user->isAdmin()){
    echo ('<a href="admin/dashboard">Administrateur</a>');
}
    echo('Bonjour '. unserialize($_SESSION['user'])->getUsername());


