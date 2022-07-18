<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./../img/appia1.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="./../css/reset.css">
    <link rel="stylesheet" href="./../css/style.css">
    <link rel="stylesheet" href="./../css/enregistrement.css">
    <title>Enregistrement</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="titre">
                <img class="logo" src="./../img/appia1.png" alt="logo">
                <p>L’homme ne vivra pas de pain seulement.</p>
            </div>

            <nav>

                <ul>
                    <li>
                        <a href="./../">Accueil</a>
                    </li>

                    <li>
                        <a href="#">Contact</a>
                    </li>

                    <li>
                        <a href="./authentification.php">Connexion</a>
                    </li>



                </ul>

            </nav>

        </header>
        <main>


            <div class="formulaire-content">

                <h2>Coordonnées</h2>

                <div class="formulaire">
                    <form action="./../php/main.php" method="post">
                        <table>
                            <tr>
                                <th class="cl1">Nom *</th>
                                <th class="cl2"><input type="text" name="nom"></th>
                            </tr>
                            <tr>
                                <td>Prénom *</td>
                                <td><input type="text" name="prenom"></td>
                            </tr>
                            <tr>
                                <td>Adresse *</td>
                                <td><input type="text" name="adresse"></td>
                            </tr>
                            <tr>
                                <td>Code postal *</td>
                                <td><input type="text" name="code-postal"></td>
                            </tr>
                            <tr>
                                <td>Ville *</td>
                                <td><input type="text" name="ville"></td>
                            </tr>
                            <tr>
                                <td>Telephone *</td>
                                <td><input type="tel" name="telephone"></td>
                            </tr>
                            <tr>
                                <td>Date de naissance *</td>
                                <td><input type="date" name="date"></td>
                            </tr>
                            <tr>
                                <td>Adresse mail *</td>
                                <td><input type="email" name="mail"></td>
                            </tr>
                            <tr>
                                <td>Mot de passe *</td>
                                <td><input type="password" name="pass"></td>
                            </tr>
                            <tr>
                                <td>Confirmation</td>
                                <td><input type="password" name="confirm"></td>
                            </tr>
                        </table>

                        <div class="paiement">
                            <h2>Mon reglement</h2>
                            <ul class="ul1">
                                <li>Je regle par</li>
                                <li>
                                    <ul class="ul2">
                                        <li class="li2">
                                            <ul>
                                                <li><input type="radio" value="Paypal/ Carte de credit" name="paye" id="credit"></li>
                                                <li><label for="credit">Paypal/ Carte de credit</label></li>
                                            </ul>


                                        </li>
                                        <li class="li2">
                                            <ul>
                                                <li><input type="radio" value="Chèque" name="paye" id="cheque"></li>
                                                <li><label for="cheque">Chèque</label></li>
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
                        <div class="btn-send">
                            <input type="button" id="btn-sv" value="Verifier le formulaire" name="btn-envoi">

                        </div>
                        <div class="panel-error">


                        </div>

                    </form>

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
    <script src="./../js/formulaire.js"></script>
    <script src="./../js/ajax.js"></script>
    <script src="./../js/main.js"></script>

</body>

</html>