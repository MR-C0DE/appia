<?php
include_once('./../php/class/database.class.php');
if (isset($_COOKIE['data'])) {

    $cookie = json_decode($_COOKIE['data']);
    $type = array('Usagé', 'Numérique', 'Neuf');
    $typePrice = array('prix_usage', 'prix_numerique', 'prix_neuf');

    $data = new Appia_DAO('root', '');
    foreach ($cookie as $element) {

        $donnee = $data->seachAllElement('article', 'article_id', $element[0]);

        foreach ($donnee as $resultat) {

            echo '
                            <tr id="ligne_' . $element[0] . '_' . $element[1] . '">
                                <td  class="first">
                                    <ul>
                                        <li><img src="./../img/' . $resultat['article_id'] . '.png" alt=""></li>
                                        <li>' . $resultat['nom'] . '</li>
                                    </ul>
                                </td>
                                <td class="type ' . $type[((int)$element[1]) - 1] . '">' . $type[((int)$element[1]) - 1] . '</td>
                                <td><input min="1" max="100"  type="number" name="quantite" value="1" id="qte"></td>
                                <td class="price_print">' . $resultat[$typePrice[((int)$element[1]) - 1]] . '$</td>
                                <td><button>x</button></td>
                            </tr>';
        }
    }
} else {
    echo 'pas de cookie';
}
