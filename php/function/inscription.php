<?php
//important : CE FICHIER EST INCLU DANS LA PAGE enregistrement.php

include_once('./../php/class/utilisateur.class.php');
include_once('./../php/class/adresse.class.php');
include_once('./../php/class/dateNaissance.class.php');
include_once('./../php/class/database.class.php');
include_once('./../php/class/chiffrement.class.php');

function inscription(
    string $nom,
    string $prenom,
    string $adresse,
    string $code_postal,
    string $ville,
    string $numero_telephone,
    string $date_de_naissance,
    string $email,
    string $mot_de_passe
): void {

    $adress = new Adresse(
        $adresse,
        $code_postal,
        $ville
    );

    $user = new Utilisateur(
        $prenom,
        $nom,
        $adress,
        $numero_telephone,
        initialiseDate($date_de_naissance),
        $email,
        Chiffrement::crypter($mot_de_passe, sha1($email . '1845202'))


    );

    $appia_Data = new Appia_DAO('root', '');
    if ($appia_Data->insertDataInMembre($user)) {

        $appia_Data->close_DAO();

        /*   Dans l'execution, cette la methode 'header()' effectue son operation 
             depuis le fichier main.php */
        header('location:./../page/authentification.php');
        exit();
    }
}


function initialiseDate(string $date): DateNaissance
{
    $dataListe = explode('-', $date);
    $jour = (int) $dataListe[2];
    $mois = (int) $dataListe[1];
    $annee = (int) $dataListe[0];
    return new DateNaissance($jour, $mois, $annee);
}
