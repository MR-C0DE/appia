<?php

//  PAGE QUI PERMET DE VERIFIER SI L'EMAIL DE L'UTILISATEUR EST DEJA UTILISÉ
include_once('./../class/database.class.php');

$query = $_GET['query'];
$database = new Appia_DAO('root', '');

if ($database->existElement('membre', 'email', $query)) {
    echo 'true';
} else {
    echo 'false';
}
$database->close_DAO();
