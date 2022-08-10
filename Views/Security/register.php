<?php ob_start(); ?>
    <!DOCTYPE html>
    <html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="css" href="Public/css/style.css">

</head>
<body>

<section class="d-flex justify-content-center align-content-center w-100 h-100   ">
    <div class="m-5 rounded opacity-25 bg-dark ">
        <div class="login px-5 py-2">
            <h1 class="text-secondary text-center m-2">S'inscrire</h1>

            <form class="form-bloc text-center ">
                <div class="form-groupe m-3 px-5 ">
                    <input class=" rounded w-100  m-3 p-2 border border-light border-3 form-control form-control-lg" type="email" name="email"
                           placeholder="Votre adresse email" required/>
                </div>
                <div class="form-groupe m-3 px-5 ">
                    <input class=" rounded w-100  m-3 p-2 form-control form-control-lg"  type="password" name="password"
                           placeholder="Mot de passe" required/>
                </div>
                <div class="form-groupe m-3 px-5 ">
                    <button class="button bg-danger text-white  m-3 p-2 w-100 rounded-1 border border-dark form-control form-control-lg" type="submit">Se connecter</button>
                </div>
            </form>
            <p class="text-secondary text-center m-3 px-3">Déjà sur mon blog ? <a href="<?= URL ?>security/login">Connectez-vous</a>
            </p>
        </div>
    </div>

</section>

</body>
<?php
$content = ob_get_clean();
require "Views/template.php";
?>