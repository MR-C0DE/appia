<?php

include_once('./function/inscription.php');

// Check si l'utilisateur a envoyer le formulaire d'inscription.
if (isset($_POST['btn-envoi'])) {

    inscription(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['adresse'],
        $_POST['code-postal'],
        $_POST['ville'],
        $_POST['telephone'],
        $_POST['date'],
        $_POST['mail'],
        $_POST['pass']
    );
} else {
    echo '404';
}
