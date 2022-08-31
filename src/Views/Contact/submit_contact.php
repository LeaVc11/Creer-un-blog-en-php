<?php

// submit_contact.php
if (!isset($_POST['email']) || !isset($_POST['message']))
{
    echo('Il faut un email et un message pour soumettre le formulaire.');
    return;
}

$email = $_POST['email'];
$message = $_POST['message'];

?>

<h1>Message bien reçu !</h1>

<div class="card">

    <div class="card-body">
        <h5 class="card-title">Rappel de vos informations</h5>
        <p class="card-text"><b>Email</b> : <?php echo $_GET['email']; ?></p>
        <p class="card-text"><b>Message</b> : <?php echo $_GET['textarea']; ?></p>
    </div>
</div>