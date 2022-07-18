<?php

session_start();
if (isset($_SESSION['LOGIN'])) {
    header('location: boutique.php');
}
include_once('./../php/class/connect.class.php');
$reponse = '';

if (isset($_POST['Send'])) {
    $connect = new Authentification($_POST['utilisateur'], $_POST['mot-de-passe']);
    $reponse = $connect->traitement();
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/appia1.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="./../css/reset.css">
    <link rel="stylesheet" href="./../css/style.css">
    <link rel="stylesheet" href="./../css/authentification.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https : //fonts.googleapis.com/css2? family= Corinthia & display=swap" rel="stylesheet">
    <link href="https : //fonts.googleapis.com/css2? family= Corinthia &famille= Neonderthaw & display=swap" rel="stylesheet">
    <title>Authentification</title>
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
                        <a href="#">Contact</a>
                    </li>

                    <li>
                        <a class="position" href="./authentification.php">Connexion</a>
                    </li>



                </ul>

            </nav>

        </header>
        <main>

            <div class="formulaire-content">
                <div class="form-stl">

                </div>

            </div>

            <div class="form-content">
                <p> <?php echo $reponse; ?></p>

                <h2>Se connecter</h2>

                <form action="#" method="post">

                    <div class="champ user">

                        <div class="icon user">
                            <img src="./../img/ico/icons8-utilisateur-50.png" alt="">
                        </div>
                        <div class="write-user">
                            <input type="text" name="utilisateur" placeholder="Utilisateur">
                        </div>

                    </div>

                    <div class="champ pass">



                        <div class="write-pass">
                            <input type="password" name="mot-de-passe" placeholder="Mot de passe">
                        </div>
                        <div class="icon pass">
                            <img src="./../img/ico/icons8-ouvrir.svg" alt="">
                        </div>



                    </div>

                    <div class="bouton-send">
                        <input type="submit" name="Send" value="Connexion">
                    </div>

                </form>

                <div class="info-inscription">
                    <p>Pas de compte ? <a href="./enregistrement.php">Créez en un.</a></p>
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

    <script src="./js/cookies.js"></script>

</body>

</html>