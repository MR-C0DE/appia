<?php
session_start();

if (!isset($_SESSION['LOGIN'])) {
    header('location: authentification.php');
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./../img/appia1.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="./../css/reset.css">
    <link rel="stylesheet" href="./../css/style.css">
    <link rel="stylesheet" href="./../css/panier.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https : //fonts.googleapis.com/css2? family= Corinthia & display=swap" rel="stylesheet">
    <link href="https : //fonts.googleapis.com/css2? family= Corinthia &famille= Neonderthaw & display=swap" rel="stylesheet">
    <title>Appia</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="titre">
                <img class="logo" src="./../img/appia1.png" alt="logo">
                <p>Passe un temps dans la lecture</p>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="./../">Accueil</a>
                    </li>
                    <li>
                        <a href="./boutique.php">La boutique</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a class="position" href="#">Panier</a>
                    </li>
                    <li>
                        <a href="./../php/other/deconnect.php">Deconnexion</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="stl-content">
                <div class="stl-bande"> </div>
            </div>
            <div class="content-object">
                <div class="info-head">
                    <h2>Panier</h2>
                    <p>Prix Total : <span></span>$</p>
                </div>
                <div class="panier-article-content">
                    <div class="article-content">
                        <table class="tab-article">
                            <thead>
                                <tr>
                                    <th class="first">Nom produit</th>
                                    <th>Type</th>
                                    <th>Quantité</th>
                                    <th>Prix</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //   Inclusion de la partie affichage article.
                                include './../php/other/panier_produit.php';

                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="midle">Sous total:</td>
                                    <td class="price total"><span></span>$</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="midle">Frais d'envoi:</td>
                                    <td class="price envoi"><span></span>$</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="midle ttl"> Total:</td>
                                    <td class="price ttl"><span></span>$</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="art-btn">
                        <p class="dt">Frais de livraison offert à partir de 100$</p>
                        <p class="nb">[ le type Numérique n'influance pas le frais de livraison (Livrer par email) ] </p>

                        <ul class="btn-content alan">
                            <li><button class="payer">ACHETER</button></li>
                            <li> <a href="./boutique.php#ancre"><button class="return-achat">OU CONTINUEZ VOS ACHATS</button></a> </li>
                        </ul>

                    </div>
                </div>

                <div class="achat">
                    <div class="formulaire-content alan">
                        <h2>Coordonnee</h2>
                        <?php
                        // Inclusion du formulaire achat.
                        include './../php/other/formulaire_achat.php';


                        ?>
                    </div>
                    <div class="paiement-reglement alan">
                        <h2>Mon reglement</h2>
                        <ul class="ul1">
                            <li>Je regle par</li>
                            <li>
                                <ul class="ul2">
                                    <li class="li2">
                                        <ul>
                                            <li><input type="radio" checked value="Carte de credit" name="paye" id="credit"></li>
                                            <li><label for="credit">Carte de credit</label></li>
                                        </ul>
                                    </li>
                                    <li class="li2">
                                        <ul>
                                            <li><input type="radio" value="Paypal" name="paye" id="cheque"></li>
                                            <li><label for="cheque">Paypal </label></li>
                                        </ul>
                                    </li>
                                    <li class="li2">
                                        <ul>
                                            <li><input type="radio" value="Virement" name="paye" id="virement"></li>
                                            <li><label for="virement">Virement</label></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </div>

                    <div class="btn-send alan">
                        <input class="soumission-button" type="button" id="btn-sv" value="Soumettre le formulaire" name="btn-envoi">
                    </div>
                    <div class="confirmation-achat">
                        <h2>Paiement par <span></span></h2>
                        <div class="detail-client">
                            <h3>Détail du client :</h3>

                        </div>
                        <div class="detail-commande">
                            <h3>Détail de votre commande :</h3>

                        </div>
                        <div class="detail-prix">
                            <h4></h4>
                        </div>


                    </div>
                </div>

            </div>

        </main>
        <div class="mini-footer">

            <ul class="icon">
                <li>
                    <a href="#"><img src="./../img/ico/icons8-git.svg" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="./../img/ico/icons8-gmail5.svg" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="./../img/ico/icons8-linkedin-2.svg" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="./../img/ico/icons8-twitter.svg" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="./../img/ico/icons8-instagram.svg" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="./../img/ico/icons8-github-2.svg" alt=""></a>
                </li>
            </ul>

            <p class="mn-ul">
                <a href="#">Condition generale de ventes</a> | <a href="#">Contact</a> |
                <a href="#">Panier</a>
            </p>


        </div>

    </div>

    <footer>
        <div class="made">

            <p>&copy;Appia Développé par Andre Luambua Mulaja</p>

        </div>

    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./../js/cookies.js"></script>
    <script src="./../js/panier.js"></script>

</body>

</html>