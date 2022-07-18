<?php

//PAGE QUI PERMET L'ENREGISTREMENT DES PRODUITS DANS DES COOKIES.

// Les produits sont enregistrés sous format JSON

if (isset($_GET['id']) && isset($_GET['type'])) {

    //tableau qui envoi les elements dans le cookie
    $element = array();


    if (isset($_COOKIE['data'])) {
        $element = json_decode($_COOKIE['data'], true);
        if (checkVal($element, array($_GET['id'], $_GET['type']))) {
            echo "Produit déjà ajouté au panier!";
        } else {
            array_push($element, array($_GET['id'], $_GET['type']));
            setcookie('data', json_encode($element), time() + 1800, '/', '', true, true);
        }
        echo '-' . count($element);
    } else {
        array_push($element, array($_GET['id'], $_GET['type']));
        setcookie('data', json_encode($element), time() + 1800, '/', '', true, true);
        echo '-1';
    }
}

// fonction permettant de verifier si un produit est deja enregistrés
// array1 est un tableau multidimentionnel
function checkVal($array1, $array2): bool
{
    $val = false;
    foreach ($array1 as $valeur) {

        if ($valeur[0] == $array2[0] and $valeur[1] == $array2[1]) {
            $val = true;
            break;
        }
    }
    return $val;
}
