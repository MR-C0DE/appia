<?php
include_once('./../class/database.class.php');
if (isset($_GET['q'])) {

    $data = new Appia_DAO('root', '');
    $data->insertArticleVendu($_GET['q']);
    $data->close_DAO();
} else if (isset($_GET['fc'])) {

    $data = new Appia_DAO('root', '');
    $data->insertClient($_GET['fc']);
    $data->close_DAO();
} else if (isset($_GET['dc'])) {

    $data = new Appia_DAO('root', '');
    $data->insertDestination($_GET['dc']);
    $data->close_DAO();
} else if (isset($_GET['getting'])) {


    $data = new Appia_DAO('root', '');
    $resultat = $data->lastClient($_GET['getting']);
    $data->close_DAO();
    echo $resultat[0]['MAX(client_id)'];
} else if (isset($_GET['close'])) {
    setcookie('data', 'NULL', time() + 2, '/', '', true, true);
}
