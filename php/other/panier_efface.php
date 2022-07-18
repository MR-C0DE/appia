<?php

//CODE QUI PERMET D'EFFACE UN PANIER


if (isset($_GET['req1']) && isset($_GET['req2'])) {
    if (isset($_COOKIE['data'])) {
        $element = json_decode($_COOKIE['data'], true);
        print_r($element);
        if (checkVal($element, array($_GET['req1'], $_GET['req2']))) {
            array_splice($element, position($element, array($_GET['req1'], $_GET['req2'])), 1);
            print_r($element);
            setcookie('data', json_encode($element), time() + 1800, '/', '', true, true);
        }

        echo 'position - ' . position($element, array($_GET['req1'], $_GET['req2']));
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

// Recupere la position d'un element pour permettre sa suppression
function position($array1, $array2): int
{

    $index = 0;
    foreach ($array1 as $valeur) {

        if ($valeur[0] == $array2[0] and $valeur[1] == $array2[1]) {
            break;
        }
        $index++;
    }
    return $index;
}
