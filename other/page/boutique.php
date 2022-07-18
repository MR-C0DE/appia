<?php
include_once('./../function/utilisateur.class.php');
$user = new Utilisateur('Jean-Marie', 'Pasteur', '8196587854', new DateNaissance(15, 1, 2012));
echo $user->ageUtilisateur();
if ($_COOKIE) {
}
