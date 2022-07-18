<?php

//CODE QUI PERMET D'AFFICHER LES ARTICLES DANS LA PAGE "boutique.php"
include_once('./../class/database.class.php');
$base = new Appia_DAO('root', '');
$resultat = $base->selectAllElement('article');

foreach ($resultat as $donnee) {
    echo '
                    
                    <div class="contenu cnt-1">
                    <div class="image">
                        <img class="image-article" src="./../img/' . $donnee['article_id'] . '.png" alt="1">
                    </div>
                    <div class="information">
                        <h2>' . $donnee['nom'] . '</h2>
                        <p>' . $donnee['description'] . '</p>
                        <table>
                            <tr class="tete">
                                <th>
                                    <ul>
                                        <li><img src="./../img/ico/icons8-lire-50.png" alt=""></li>
                                        <li>usagé</li>
                                    </ul>
                                </th>
                                <th>
                                    <ul>
                                        <li><img src="./../img/ico/icons8-pdf-50.png" alt=""></li>
                                        <li>numerique</li>
                                    </ul>
                                </th>
                                <th>
                                    <ul>
                                        <li><img src="./../img/ico/icons8-lire-50(1).png" alt=""></li>
                                        <li>neuf</li>
                                    </ul>
                                </th>
                            </tr>
                            <tr>
                                <td>' . $donnee['prix_usage'] . '$</td>
                                <td>' . $donnee['prix_numerique'] . '$</td>
                                <td>' . $donnee['prix_neuf'] . '$</td>
                            </tr>
                        </table>
                        <div id="achat-' . $donnee['article_id'] . '" class="achat">
                            <button>Ajouter dans le panier</button>
                            <select name="choix" id="choix">
                                <option value="0">Choix de type</option>
                                <option value="1">Usagé</option>
                                <option value="2">Numerique</option>
                                <option value="3">Neuf</option>
                            </select>
                            <p class="reponse"></p>
                        </div>
                    </div>
                </div>';
}
$base->close_DAO();
