<?php
require_once "Models/Class/Article.php";
ob_start(); ?>


<html>
<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="Public/css/style.css" media="screen" type="text/css" />
</head>
<body>
<div id="container">
    <!-- zone de connexion -->

    <h1>Bienvenue
        <br>
        <a href="/logout">Se déconnecter</a>
</div>
</body>
</html>

<?php
$content = ob_get_clean();
require "Views/template.php";
?>