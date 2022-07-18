<?php
// CODE PERMETTANT D'AFFICHER LES CHAMPS DAMS PAGES PANIER.PHP

if (isset($_SESSION['LOGIN'])) {
    $base = new Appia_DAO('root', '');
    $donnee = $base->seachAllElement('membre', 'membre_id', $_SESSION['ID']);
    $base->close_DAO();



    echo '
    <table class="tab-form">
    <tr>
        <th class="cl1">Prenom </th>
        <th class="cl2"><input type="text" value="' . $donnee[0]['prenom'] . '" name="prenom"></th>
    </tr>
    <tr>
        <td>Nom </td>
        <td><input type="text"  value="' . $donnee[0]['nom'] . '"  name="nom"></td>
    </tr>
    <tr>
        <td>Adresse </td>
        <td><input type="text"  value="' . $donnee[0]['adresse'] . '"  name="adresse"></td>
    </tr>
    <tr>
        <td>Code postal </td>
        <td><input type="text"  value="' . $donnee[0]['code_postal'] . '"  name="code-postal"></td>
    </tr>
    <tr>
        <td>Ville </td>
        <td><input type="text"  value="' . $donnee[0]['ville'] . '"  name="ville"></td>
    </tr>
    <tr>
        <td>Telephone </td>
        <td><input type="tel"  value="' . $donnee[0]['telephone'] . '"  name="telephone"></td>
    </tr>
    <tr>
        <td>Date de naissance </td>
        <td><input type="date"  value="' . $donnee[0]['date_naissance'] . '"  name="date"></td>
    </tr>
    <tr>
        <td>Adresse mail </td>
        <td><input type="email" value="' . $donnee[0]['email'] . '"  name="mail"></td>
    </tr>

</table>

    
    ';
}
