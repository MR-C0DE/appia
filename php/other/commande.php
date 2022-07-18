<?php
// CODE PERMETANT DE GERER LES COMMANDES 
include_once('./../class/database.class.php');
if (isset($_GET['send'])) {
    session_start();
    $data = new Appia_DAO('root', '');
    $data->insertCommande($_SESSION['ID']);
    $data->close_DAO();
}
if (isset($_GET['getting'])) {
    session_start();
    $data = new Appia_DAO('root', '');
    $resultat = $data->lastCommande($_SESSION['ID']);
    $data->close_DAO();
    echo $resultat[0]['MAX(commande_id)'];
}
